<?php

namespace App\Models;

use CodeIgniter\Model;

class OlahgerakModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'data_olah_gerak';
    protected $primaryKey       = 'id_olah_gerak';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_kedatangan','id_kapal','tanggal', 'jam', 'dermaga', 'update_by', 'status', 'input_by'];

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
        return $this->db->query("SELECT a.*, b.nama_kapal, b.alat_tangkap, b.gt FROM data_bongkar a 
        LEFT JOIN data_kapal b ON a.id_kapal=b.id WHERE id_bongkar='$id_bongkar'");
    }

    function getOlahgerak()
    {
        $query = $this->db->table('data_olah_gerak')
            ->join('data_kapal', 'data_olah_gerak.id_kapal = data_kapal.id')
            ->join('data_tangkahan', 'data_olah_gerak.dermaga = data_tangkahan.id_tangkahan')
            ->orderBy('id_olah_gerak', 'DESC')
            ->get();
        return $query;
    }

    function getPilihKapal()
    {
        return $this->db->query('SELECT a.id_kedatangan,a.id_kapal,a.tanggal, a.jam, b.nama_kapal, c.nama
        FROM data_kedatangan AS a
        LEFT JOIN data_kapal AS b ON a.id_kapal=b.id
        LEFT JOIN data_tangkahan AS c ON a.dermaga=c.id_tangkahan
        WHERE a.tanggal=CURDATE()
          AND a.id_kedatangan NOT IN
              ( SELECT id_kedatangan
                FROM data_olah_gerak 
                WHERE DATE(created_at)=CURDATE()
              ) ');

    }


}
