<?php

namespace App\Models;

use CodeIgniter\Model;

class KeberangkatanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'data_keberangkatan';
    protected $primaryKey       = 'id_keberangkatan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_kapal', 'nama_nakhoda', 'tujuan', 'tanggal', 'jam', 'dermaga', 'nomor', 'status', 'tanggal_masuk', 'tanggal_berangkat', 'etmal', 'total_jam', 'floating', 'bongkar_ikan', 'syahbandar', 'administrasi',
        'abk', 'es', 'air', 'solar', 'oli', 'bensin', 'lainnya', 'keterangan', 'status_approval', 'approve_by', 'ttd', 'input_by'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getKeberangkatan()
    {
        $query =  $this->db->table('data_keberangkatan')
            ->join('data_kapal', 'data_keberangkatan.id_kapal = data_kapal.id')
            ->join('data_tangkahan', 'data_keberangkatan.dermaga = data_tangkahan.id_tangkahan')
            ->orderBy('id_keberangkatan', 'DESC')
            ->get();
        return $query;
    }

    public function getLastNumber()
    {
        return $this->orderBy('nomor', 'DESC')->first();
    }

    // Fungsi untuk melakukan pencarian berdasarkan kata kunci
    public function getKeberangkatanBySearch($search)
    {
        $query = $this->query("CALL GetKeberangkatanBySearch(?)", [$search]);
        return $query->getResult();
    }

    public function getKeberangkatanHarian()
    {
        $query =  $this->db->table('data_keberangkatan')
            ->join('data_kapal', 'data_keberangkatan.id_kapal = data_kapal.id')
            ->join('data_tangkahan', 'data_keberangkatan.dermaga = data_tangkahan.id_tangkahan')
            ->where('tanggal_berangkat >= NOW()')
            ->orderBy('id_keberangkatan', 'DESC')
            ->get();
        return $query;
    }

    function getKapal()
    {
        $query = $this->db->table('data_kapal')
            ->get();
        return $query;
    }

    function getSyahbandar()
    {
        $query = $this->db->table('users')
            ->whereIn('role', [3])
            ->orderBy('id', 'DESC')
            ->get();
        return $query;
    }

    function getDermaga()
    {
        $query = $this->db->table('data_tangkahan')->get();
        return $query;
    }

    function getSPMobkeberangkatan($pengurus)
    {
        return $this->db->query("call spMobGetKeberangkatan('$pengurus')")->getResult();
    }

    function total_keberangkatan()
    {
        return $this->db->query('call getTotalKeberangkatan()');
    }

    function statistik_keberangkatan()
    {
        $sql = $this->db->query("call statistik_keberangkatan()");
        return $sql;
    }

    function view_all_keberangkatan($tglawal, $tglakhir)
    {
        $sql = $this->db->query("call view_all_keberangkatan('$tglawal','$tglakhir');")->getResult();
        return $sql;
    }

    function pilih_keberangkatan($id_keberangkatan){
        return $this->db->query("SELECT a.*, b.nama_kapal, b.pemilik, b.tanda_selar, b.panjang, b.loa, b.alat_tangkap, b.gt, c.name, c.role, c.nip FROM data_keberangkatan a 
        LEFT JOIN data_kapal b ON a.id_kapal=b.id
        LEFT JOIN users c ON a.syahbandar=c.id WHERE id_keberangkatan='$id_keberangkatan'");
    }
}
