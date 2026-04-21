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
    protected $allowedFields    = ['no_surat','id_kapal', 'id_kedatangan', 'syahbandar', 'nama_nakhoda', 'tanda_pengenal', 'tanggal_bongkar', 'jam', 'no_urut', 'tanggal','stblk','lokasi', 'status_approval','ttd'];

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

    function getKapal()
    {
        $query = $this->db->table('data_kapal')
            ->get();
        return $query;
    }

    function getPilihKapal()
    {
        return $this->db->query('call getPilihKapal()');
    }

    function getSyahbandar()
    {
        return $this->db->query('call getSyahbandar()');
    }

    public function generateNoSurat()
    {
        // Ambil tahun dan bulan sekarang
        $tahun = date('Y');
        $bulanRomawi = $this->convertToRoman(date('n')); // Konversi bulan ke Romawi
        
        // Cek nomor urut terakhir berdasarkan tahun berjalan dan id_bongkar
        $lastEntry = $this->where('YEAR(created_at)', $tahun)
                          ->orderBy('id_bongkar', 'DESC') // Urutkan berdasarkan id_bongkar terakhir
                          ->first();
    
        if ($lastEntry) {
            // Ambil 3 karakter pertama dari no_surat dan ubah ke integer
            $lastNumber = (int) substr($lastEntry['no_surat'], 0, 3);
            $noSurat = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            // Jika tidak ada data untuk tahun ini, mulai dari 001
            $noSurat = '001';
        }
        
        // Format nomor sesuai permintaan
        $nomor = "{$noSurat}-0007-SPLP-{$bulanRomawi}-{$tahun}";
        return $nomor;
    }
    

    private function convertToRoman($month)
    {
        $romanMonths = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 
            6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 
            11 => 'XI', 12 => 'XII'
        ];
        return $romanMonths[$month];
    }

}
