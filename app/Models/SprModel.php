<?php

namespace App\Models;

use CodeIgniter\Model;

class SprModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'spr_keberangkatan';
    protected $primaryKey       = 'id_spr';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_kapal', 'nama_nakhoda', 'merk_kekuatan_mesin', 
        'muatan_bbm', 'muatan_air', 'muatan_es',
        'checkpoint_tgl_masuk', 'checkpoint_no_stbl_kedatangan', 'checkpoint_tgl_keluar', 'checkpoint_no_stbl_keluar',
        'checkfisik_tgl_masuk', 'checkfisik_no_stbl_kedatangan', 'checkfisik_tgl_keluar', 'checkfisik_no_stbl_keluar',
        'kegiatan', 'rencana_berangkat_jam', 'rencana_berangkat_tgl', 'status_spr', 'nama_pemohon', 'input_by', 'approve_by'
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

    public function getSpr()
    {
        return $this->db->table($this->table)
            ->select('spr_keberangkatan.*, data_kapal.nama_kapal, data_kapal.pemilik, data_kapal.tanda_selar')
            ->join('data_kapal', 'spr_keberangkatan.id_kapal = data_kapal.id')
            ->orderBy('id_spr', 'DESC')
            ->get();
    }

    public function getKapal()
    {
        return $this->db->table('data_kapal')->get()->getResultArray();
    }
}
