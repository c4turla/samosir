<?php

namespace App\Models;

use CodeIgniter\Model;

class BongkarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'data_bongkar';
    protected $primaryKey       = 'id_bongkar';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['no_surat','id_kapal', 'id_kedatangan', 'syahbandar', 'nama_nakhoda', 'tanda_pengenal', 'jam', 'no_urut'];

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

    function pilih_bongkar($id_bongkar){
        return $this->db->query("SELECT a.*, b.nama_kapal, b.alat_tangkap, b.gt, b.tanda_selar FROM data_bongkar a 
        LEFT JOIN data_kapal b ON a.id_kapal=b.id WHERE id_bongkar='$id_bongkar'");
    }

    function getBongkar()
    {
        $query = $this->db->table('data_bongkar')
            ->join('data_kapal', 'data_bongkar.id_kapal = data_kapal.id')
            ->orderBy('id_bongkar', 'DESC')
            ->get();
        return $query;
    }

    function getPilihKapal()
    {
        return $this->db->query('SELECT a.id_kedatangan,a.id_kapal,a.tanggal,a.jam,b.nama_kapal, b.alat_tangkap, b.gt,  b.tanda_selar
        FROM data_kedatangan AS a
        LEFT JOIN data_kapal AS b ON a.id_kapal=b.id
        WHERE a.tanggal  BETWEEN (CURDATE() - INTERVAL 3 DAY) AND CURDATE()
          AND a.id_kedatangan NOT IN
              ( SELECT id_kedatangan
                FROM data_bongkar 
              ) ');

    }


}
