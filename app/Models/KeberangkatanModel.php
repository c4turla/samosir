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
    protected $allowedFields    = ['id_kapal','tujuan','tanggal','jam','dermaga','status',
    'abk','es','air','solar','oli','bensin','lainnya','keterangan','status_approval','approve_by','input_by'];

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

    public function getKeberangkatanHarian()
    {             
        $query =  $this->db->table('data_keberangkatan')
         ->join('data_kapal', 'data_keberangkatan.id_kapal = data_kapal.id')
         ->join('data_tangkahan', 'data_keberangkatan.dermaga = data_tangkahan.id_tangkahan')         
         ->where('tanggal=curdate()')
         ->orderBy('id_keberangkatan', 'DESC')
         ->get();  
        return $query;
    }

    function getKapal(){
        $query = $this->db->table('data_kapal')
        ->where('tanggal_akhir_sipi >= CURDATE()')
        ->get();
        return $query;  
    }

    function getDermaga()
    {
        $query = $this->db->table('data_tangkahan')->get();
        return $query;
    }

    function total_keberangkatan(){
        return $this->db->query('call getTotalKeberangkatan()');
      }
    
    function statistik_keberangkatan()
      {     
       $sql= $this->db->query("call statistik_keberangkatan()");
       return $sql;
      }

    function view_all_keberangkatan($tglawal,$tglakhir){
        $sql = $this->db->query("call view_all_keberangkatan('$tglawal','$tglakhir');")->getResult();
        return $sql;
    } 
}
