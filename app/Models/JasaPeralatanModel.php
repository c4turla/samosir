<?php

namespace App\Models;

use CodeIgniter\Model;

class JasaPeralatanModel extends Model
{
    // Nama tabel database yang akan digunakan oleh model ini
    protected $table = 'jasa_peralatan';

    // Nama kolom primary key pada tabel
    protected $primaryKey = 'id_jasa';

    // Apakah primary key menggunakan auto increment
    protected $useAutoIncrement = true;

    // Tipe data yang akan dikembalikan saat mengambil data (array atau object)
    protected $returnType = 'array';

    // Apakah akan menggunakan soft deletes (menandai record sebagai terhapus daripada menghapusnya secara permanen)
    protected $useSoftDeletes = false; // Karena tidak ada kolom 'deleted_at' di tabel Anda

    // Kolom-kolom yang diizinkan untuk diisi (mass assignment)
    protected $allowedFields = [
        'no_order',
        'nama_penyewa',
        'tanggal',
        'keranjang_plastik',
        'ket_keranjang_plastik',
        'meja_sortir',
        'ket_meja_sortir',
        'gerobak',
        'ket_gerobak',
        'timbangan',
        'ket_timbangan',
        'ice_cruiser',
        'ket_ice_cruiser',
        'petugas',
        'jam_mulai',
        'jam_selesai',
        'by_keranjang_plastik',
        'by_meja_sortir',
        'by_gerobak',
        'by_timbangan',
        'by_ice_cruiser',
        'total',
        'bendahara',
        'status_order',
    ];

    // Apakah akan menggunakan timestamps (created_at, updated_at, deleted_at)
    protected $useTimestamps = true;

    // Format tanggal yang digunakan untuk timestamps
    protected $dateFormat = 'datetime';

    // Nama kolom untuk waktu pembuatan record
    protected $createdField = 'created_at';

    // Nama kolom untuk waktu pembaruan record
    protected $updatedField = 'updated_at';

    // Nama kolom untuk waktu penghapusan record (jika useSoftDeletes true)
    protected $deletedField = 'deleted_at'; // Meskipun useSoftDeletes false, ini tetap perlu didefinisikan jika useTimestamps true

    // Aturan validasi untuk kolom-kolom tertentu (opsional, bisa ditambahkan sesuai kebutuhan)
    protected $validationRules = [
        'no_order' => 'permit_empty|is_unique[jasa_peralatan.No_order]', // 'permit_empty' agar bisa otomatis diisi
        'nama_penyewa' => 'required',
        'tanggal' => 'required|valid_date',
        // Tambahkan aturan validasi lainnya sesuai kebutuhan
    ];

    // Pesan kesalahan validasi kustom (opsional)
    protected $validationMessages = [
        'no_order' => [
            'is_unique' => 'Nomor order sudah ada.',
        ],
        'nama_penyewa' => [
            'required' => 'Nama penyewa wajib diisi.',
        ],
        'tanggal' => [
            'required' => 'Tanggal wajib diisi.',
            'valid_date' => 'Format tanggal tidak valid.',
        ],
    ];

    // Apakah akan melewati validasi saat insert/update
    protected $skipValidation = false;

    // Apakah akan memicu event setelah validasi
    protected $cleanValidationRules = true;

    // Hooks untuk memicu fungsi sebelum atau sesudah operasi database
    protected $beforeInsert = ['generateNoOrder'];

    /**
     * Fungsi untuk menghasilkan nomor order otomatis.
     * Format: 0001, 0002, dst. (4 digit)
     *
     * @param array $data Data yang akan diinsert
     * @return array Data yang sudah dimodifikasi
     */
    public function generateNoOrder(array $data)
    {
        // Jika No_order sudah ada di data, jangan di-generate ulang
        if (isset($data['data']['no_order']) && !empty($data['data']['no_order'])) {
            return $data;
        }

        // Ambil nomor order terakhir dari database
        $lastOrder = $this->select('no_order')
                          ->orderBy('id_jasa', 'DESC') // Urutkan berdasarkan ID terbaru
                          ->first();

        $newNumber = 1; // Nomor awal jika belum ada data

        if ($lastOrder) {
            // Ekstrak bagian numerik dari nomor order terakhir
            // Asumsi format No_order adalah '0001', '0002', dst.
            $lastNum = (int) $lastOrder['no_order'];
            $newNumber = $lastNum + 1;
        }

        // Format nomor baru menjadi 4 digit dengan leading zeros (misal: 0001, 0002)
        $data['data']['no_order'] = sprintf('%04d', $newNumber);

        return $data;
    }
}
