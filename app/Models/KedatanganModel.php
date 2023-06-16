<?php

namespace App\Models;

use CodeIgniter\Model;

class KedatanganModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'data_kedatangan';
    protected $primaryKey       = 'id_kedatangan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_kapal', 'asal', 'tanggal', 'jam', 'dermaga', 'jenis_ikan1', 'jenis_ikan2',
        'jenis_ikan3', 'jenis_ikan4', 'jenis_ikan5', 'jenis_ikan6', 'berat_ikan1', 'berat_ikan2', 'berat_ikan3', 'berat_ikan4', 'berat_ikan5', 'berat_ikan6',
        'suhu_ikan', 'suhu_palka', 'harga_rata', 'mutu', 'produk', 'sampah', 'status_approval', 'approve_by', 'status', 'no_antrian', 'input_by'
    ];

    // Dates
    protected $useTimestamps = true;
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

    public function getKedatangan()
    {
        $query =  $this->db->table('data_kedatangan')
            ->join('data_kapal', 'data_kedatangan.id_kapal = data_kapal.id')
            ->join('data_ikan', 'data_kedatangan.jenis_ikan1 = data_ikan.id_ikan')
            ->join('data_tangkahan', 'data_kedatangan.dermaga = data_tangkahan.id_tangkahan')
            ->orderBy('id_kedatangan', 'DESC')
            ->get();
        return $query;
    }

    public function getKedatanganHarian()
    {
        $query =  $this->db->table('data_kedatangan')
            ->join('data_kapal', 'data_kedatangan.id_kapal = data_kapal.id')
            ->join('data_ikan', 'data_kedatangan.jenis_ikan1 = data_ikan.id_ikan')
            ->join('data_tangkahan', 'data_kedatangan.dermaga = data_tangkahan.id_tangkahan')
            ->where('tanggal=curdate()')
            ->get();
        return $query;
    }

    function getKapal()
    {
        $query = $this->db->table('data_kapal')
            ->where('tanggal_akhir_sipi >= CURDATE()')
            ->get();
        return $query;
    }

    function getIkan()
    {
        $query = $this->db->table('data_ikan')->get();
        return $query;
    }

    function getDermaga()
    {
        $query = $this->db->table('data_tangkahan')->get();
        return $query;
    }

    function total_kedatangan()
    {
        return $this->db->query('call getTotalKedatangan()');
    }

    function total_ikan()
    {
        $query = $this->db->query('select * from vw_dashboard_jenis_ikan where bulan=month(curdate()) order by total desc limit 5')->getResult();
        return $query;
    }

    function total_ikan_bulanan()
    {
        $query = $this->db->query('SELECT total FROM vw_dashboard_jenis_ikan WHERE bulan=MONTH(CURDATE()) ORDER BY total DESC LIMIT 5');
        return $query;
    }

    function nama_ikan_bulanan()
    {
        $query = $this->db->query('SELECT nama_ikan FROM vw_dashboard_jenis_ikan WHERE bulan=MONTH(CURDATE()) ORDER BY total DESC LIMIT 5');
        return $query;
    }
    

    function berat_ikan()
    {
        $query = $this->db->query('select berat_total from vw_berat_ikan_total where bulan=month(curdate())')->getResult();
        return $query;
    }

    function selisih_berat()
    {
        $query = $this->db->query('select * from selisih_berat_ikan')->getResult();
        return $query;
    }

    public function saveKedatangan($data_kedatangan)
    {
        $this->db->table('data_kedatangan')->insert($data_kedatangan);
    }

    function statistik_kedatangan()
    {     
     $sql= $this->db->query("call statistik_kedatangan()");
     return $sql;
    } 

    function view_all_kedatangan($tglawal,$tglakhir){
        $sql = $this->db->query("SELECT data_kedatangan.id_kedatangan, data_kapal.nama_kapal, data_kapal.gt, data_kapal.panjang,   data_kedatangan.asal, 
        data_kedatangan.tanggal, data_kedatangan.jam, data_tangkahan.nama AS nama_tangkahan, vw_jenis_ikan_1.nama_ikan AS nama_ikan1, vw_jenis_ikan_1.berat_ikan1,
        vw_jenis_ikan_2.nama_ikan AS nama_ikan2, vw_jenis_ikan_2.berat_ikan2,
        vw_jenis_ikan_3.nama_ikan AS nama_ikan3, vw_jenis_ikan_3.berat_ikan3,
        vw_jenis_ikan_4.nama_ikan AS nama_ikan4, vw_jenis_ikan_4.berat_ikan4,
        vw_jenis_ikan_5.nama_ikan AS nama_ikan5, vw_jenis_ikan_5.berat_ikan5,
        vw_jenis_ikan_6.nama_ikan AS nama_ikan6, vw_jenis_ikan_6.berat_ikan6,
        data_kedatangan.suhu_ikan, data_kedatangan.suhu_palka, data_kedatangan.harga_rata,
        data_kedatangan.mutu, data_kedatangan.produk, data_kedatangan.status, data_kedatangan.sampah
        FROM data_kedatangan 
        LEFT JOIN data_kapal ON data_kedatangan.id_kapal = data_kapal.id 
        LEFT JOIN data_tangkahan ON data_kedatangan.dermaga = data_tangkahan.id_tangkahan 
        LEFT JOIN vw_jenis_ikan_1 ON data_kedatangan.id_kedatangan=vw_jenis_ikan_1.id_kedatangan
        LEFT JOIN vw_jenis_ikan_2 ON data_kedatangan.id_kedatangan=vw_jenis_ikan_2.id_kedatangan
        LEFT JOIN vw_jenis_ikan_3 ON data_kedatangan.id_kedatangan=vw_jenis_ikan_3.id_kedatangan
        LEFT JOIN vw_jenis_ikan_4 ON data_kedatangan.id_kedatangan=vw_jenis_ikan_4.id_kedatangan
        LEFT JOIN vw_jenis_ikan_5 ON data_kedatangan.id_kedatangan=vw_jenis_ikan_5.id_kedatangan
        LEFT JOIN vw_jenis_ikan_6 ON data_kedatangan.id_kedatangan=vw_jenis_ikan_6.id_kedatangan
        WHERE status_approval=1 AND data_kedatangan.tanggal BETWEEN '$tglawal' and '$tglakhir'")->getResult();
        return $sql;
    }

    function view_jenis_ikan($tglawal,$tglakhir){
        $sql = $this->db->query("SELECT * FROM vw_lap_jenis_ikan WHERE tanggal BETWEEN '$tglawal' and '$tglakhir'")->getResult();
        return $sql;
    }

    function view_per_gt($tglawal,$tglakhir){
        $sql = $this->db->query("SELECT * FROM vw_lap_jenis_ikan WHERE tanggal BETWEEN '$tglawal' and '$tglakhir'")->getResult();
        return $sql;
    }

}
