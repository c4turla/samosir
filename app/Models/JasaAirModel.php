<?php

namespace App\Models;

use CodeIgniter\Model;

class JasaAirModel extends Model
{
    // Nama tabel database yang akan digunakan oleh model ini
    protected $table = 'jasa_air';

    // Nama kolom primary key pada tabel
    protected $primaryKey = 'id_air';

    // Apakah primary key menggunakan auto increment
    protected $useAutoIncrement = true;

    // Tipe data yang akan dikembalikan saat mengambil data (array atau object)
    protected $returnType = 'array';

    // Apakah akan menggunakan soft deletes (menandai record sebagai terhapus daripada menghapusnya secara permanen)
    protected $useSoftDeletes = false; // Karena tidak ada kolom 'deleted_at' di tabel Anda

    // Kolom-kolom yang diizinkan untuk diisi (mass assignment)
    protected $allowedFields = [
        'no_order',
        'nama_kapal',
        'tanggal_permintaan',
        'tanggal_pelayanan',
        'volume',
        'harga',
        'jumlah_pembayaran',
        'keterangan',
        'pemohon',
        'pelaksana_lapangan',
        'bendahara',
        'status_order'
    ];

    // Apakah akan menggunakan timestamps (created_at, updated_at, deleted_at)
    protected $useTimestamps = true;

    // Format tanggal yang digunakan untuk timestamps
    protected $dateFormat = 'datetime';

    // Nama kolom untuk waktu pembuatan record
    protected $createdField = 'created_at';

    // Nama kolom untuk waktu pembaruan record
    protected $updatedField = 'updated_at';

    public function generateNoOrder(array $data)
    {
        // Jika No_order sudah ada di data, jangan di-generate ulang
        if (isset($data['data']['no_order']) && !empty($data['data']['no_order'])) {
            return $data;
        }

        // Ambil nomor order terakhir dari database
        $lastOrder = $this->select('no_order')
                          ->orderBy('id_air', 'DESC') // Urutkan berdasarkan ID terbaru
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
