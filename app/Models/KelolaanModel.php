<?php

namespace App\Models;

use CodeIgniter\Model;

class KelolaanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kapal_kelolaan';
    protected $primaryKey       = 'id_kelolaan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_kelolaan','id_pengguna','id_kapal','alamat','ktp','surat_kuasa'];

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
    
    function getSPKelolaan($pengurus){
        return $this->db->query("call getKapalKelolaan('$pengurus')")->getResult();
    }
}
