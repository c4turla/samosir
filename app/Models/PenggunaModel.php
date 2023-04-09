<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'data_pengguna';
    protected $primaryKey           = 'id_pengguna';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'name',
        'email',
        'password',
        'phone_no',
        'status',
        'photo'
    ];

    // Dates
    protected $useTimestamps        = false;
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


    function pilih_kapal($id){
        return $this->db->query("SELECT a.name, a.email, b.nama_kapal, b.pemilik, b.status_pengurus FROM
        data_pengguna a LEFT JOIN data_kapal b ON a.id_pengguna=b.id_pengurus
        WHERE id_pengurus='$id'");
    }
}
