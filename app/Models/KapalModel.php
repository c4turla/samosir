<?php

namespace App\Models;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class KapalModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'data_kapal';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['nama_kapal','pemilik','no_izin','gt','alat_tangkap','tanda_selar','tipe_kapal','tanggal_sipi',
    'tanggal_akhir_sipi','panjang','no_siup','foto_kapal'];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];
    

    function total_kapal() {
        $query = $this->table('data_kapal')
        ->where('tanggal_akhir_sipi >= CURDATE()')
        ->get();
        return $query->getNumRows();
      }
    function kapal_expired() {
        $query = $this->table('data_kapal')
        ->where('tanggal_akhir_sipi < CURDATE()')
        ->get();
        return $query->getNumRows();
      }

      function data_kapal()
      {
          $query = $this->db->query('SELECT * FROM vw_dashboard_kapal WHERE bulan=MONTH(CURDATE()) LIMIT 5')->getResult();
          return $query;
      }
}
