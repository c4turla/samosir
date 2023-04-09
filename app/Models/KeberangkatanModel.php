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
        $query = $this->table('data_keberangkatan')->get();
        return $query->getNumRows();
      }
    
    function statistik_keberangkatan()
      {     
       $sql= $this->db->query("select
       ifnull((SELECT count(id_keberangkatan) FROM (data_keberangkatan)WHERE((Month(tanggal)=1)AND (YEAR(tanggal)=YEAR(now())))),0) AS `Januari`,
       ifnull((SELECT count(id_keberangkatan) FROM (data_keberangkatan)WHERE((Month(tanggal)=2)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS `Februari`,
       ifnull((SELECT count(id_keberangkatan) FROM (data_keberangkatan)WHERE((Month(tanggal)=3)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS `Maret`,
       ifnull((SELECT count(id_keberangkatan) FROM (data_keberangkatan)WHERE((Month(tanggal)=4)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS `April`,
       ifnull((SELECT count(id_keberangkatan) FROM (data_keberangkatan)WHERE((Month(tanggal)=5)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS `Mei`,
       ifnull((SELECT count(id_keberangkatan) FROM (data_keberangkatan)WHERE((Month(tanggal)=6)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS `Juni`,
       ifnull((SELECT count(id_keberangkatan) FROM (data_keberangkatan)WHERE((Month(tanggal)=7)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS `Juli`,
       ifnull((SELECT count(id_keberangkatan) FROM (data_keberangkatan)WHERE((Month(tanggal)=8)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS `Agustus`,
       ifnull((SELECT count(id_keberangkatan) FROM (data_keberangkatan)WHERE((Month(tanggal)=9)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS `September`,
       ifnull((SELECT count(id_keberangkatan) FROM (data_keberangkatan)WHERE((Month(tanggal)=10)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS `Oktober`,
       ifnull((SELECT count(id_keberangkatan) FROM (data_keberangkatan)WHERE((Month(tanggal)=11)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS `November`,
       ifnull((SELECT count(id_keberangkatan) FROM (data_keberangkatan)WHERE((Month(tanggal)=12)AND (YEAR(tanggal)=YEAR(NOW())))),0) AS `Desember`
      from data_kedatangan GROUP BY YEAR(tanggal) limit 1");
       return $sql;
      }

    function view_all_keberangkatan($tglawal,$tglakhir){
        $sql = $this->db->query("SELECT a.id_keberangkatan, data_kapal.nama_kapal, data_kapal.gt, data_kapal.panjang, a.tujuan, 
        a.abk, a.tanggal, a.jam, data_tangkahan.nama AS nama_dermaga, a.status,
        a.es, a.air, a.solar, a.oli, a.bensin, a.lainnya, a.keterangan
        FROM data_keberangkatan a
        LEFT JOIN data_kapal ON a.id_kapal = data_kapal.id 
        LEFT JOIN data_tangkahan ON a.dermaga = data_tangkahan.id_tangkahan 
        WHERE status_approval=1 AND a.tanggal BETWEEN '$tglawal' and '$tglakhir'")->getResult();
        return $sql;
    } 
}
