<?php

namespace App\Models;

use CodeIgniter\Model;

class TangkahanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'data_tangkahan';
    protected $primaryKey       = 'id_tangkahan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama','alamat','jarak','lat','long'];

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

    function getPosisi()
    {
        return $this->db->query('SELECT a.id_kapal, a.dermaga, a.tanggal, a.status, b.*, c.id, c.nama_kapal
        FROM data_kedatangan a 
        LEFT JOIN data_tangkahan b ON a.dermaga=b.id_tangkahan
        LEFT JOIN data_kapal c ON a.id_kapal=c.id
        WHERE a.tanggal=CURDATE()');

    }

    function getPosisi2()
    {
        return $this->db->query('SELECT a.id_kapal, a.dermaga, a.tanggal, a.status, b.*, c.id, c.nama_kapal
        FROM data_keberangkatan a 
        LEFT JOIN data_tangkahan b ON a.dermaga=b.id_tangkahan
        LEFT JOIN data_kapal c ON a.id_kapal=c.id
        WHERE a.tanggal=CURDATE()');

    }
}
