<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/air') ?>">Jasa</a></li>
                    <li class="breadcrumb-item active">Tambah Jasa Air</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Order Jasa Air Tawar</h4>
                <p class="card-title-desc">Gunakan Form ini untuk menambah data Jasa Air Tawar.</p>
            </div>
            <div class="card-body p-4">

                <div class="row">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Periksa Kembali Form Entri
                            Anda</strong></hr /> <?php echo session()->getFlashdata('error'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    <div class="col-lg-12 ms-lg-auto">
                        <div class="mt-4 mt-lg-0">

                            <form action="<?= base_url('air/storeorder') ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Nomor Order</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="no_order" name="no_order"
                                            value="<?= esc($no_order ?? '') ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="nama-kapal" class="col-sm-3 col-form-label">Nama Kapal</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="nama_kapal" id="nama_kapal" data-trigger>
                                            <option value="">- Pilih Kapal -</option>
                                            <?php foreach ($kapal as $row) : ?>
                                            <option value="<?php echo $row->nama_kapal; ?>">
                                                <?php echo $row->nama_kapal; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Tanggal Permintaan</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal_permintaan"
                                            name="tanggal_permintaan" value="<?= old('tanggal_permintaan'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="volume" class="col-sm-3 col-form-label">Volume (M3)</label>
                                    <div class="col-sm-2">
                                        <div class="input-group">

                                            <input type="number" class="form-control" id="volume" name="volume"
                                                value="<?= old('volume'); ?>">
                                            <div class="input-group-text">M3</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="harga" class="col-sm-3 col-form-label">Harga /M3</label>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-text">Rp</div>
                                            <input type="input" class="form-control" id="harga" name="harga"
                                                value="<?= old('harga'); ?>">
                                        </div>

                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="jumlah_pembayaran" class="col-sm-3 col-form-label">Jumlah
                                        Pembayaran</label>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <div class="input-group-text">Rp</div>
                                            <input type="text" class="form-control" id="jumlah_pembayaran"
                                                name="jumlah_pembayaran" value="<?= old('jumlah_pembayaran'); ?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <input type="input" class="form-control" id="keterangan" name="keterangan"
                                            value="<?= old('keterangan'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="pelaksana_lapangan" class="col-sm-3 col-form-label">Pelaksana
                                        Lapangan</label>
                                    <div class="col-sm-6">
                                        <input type="input" class="form-control" id="pelaksana_lapangan"
                                            name="pelaksana_lapangan" value="<?= old('pelaksana_lapangan'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="pemohon" class="col-sm-3 col-form-label">Pemohon
                                        </label>
                                    <div class="col-sm-6">
                                        <input type="input" class="form-control" id="pemohon" name="pemohon"
                                            value="<?= old('pemohon'); ?>">
                                    </div>
                                </div>

                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-12">

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-save font-size-16 align-middle me-2"></i> Simpan
                                </button>

                                <button type="reset" class="btn btn-danger waves-effect waves-light">
                                    <i class="bx bx-error font-size-16 align-middle me-2"></i> Reset
                                </button>

                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const volumeInput = document.getElementById('volume');
    const hargaInput = document.getElementById('harga');
    const jumlahPembayaranInput = document.getElementById('jumlah_pembayaran');

    function hitungJumlahPembayaran() {
        const volume = parseFloat(volumeInput.value) || 0;
        const harga = parseFloat(hargaInput.value) || 0;
        const jumlah = volume * harga;
        jumlahPembayaranInput.value = jumlah.toFixed(2); // hasil format desimal dua angka
    }

    // Event listener saat nilai berubah
    volumeInput.addEventListener('input', hitungJumlahPembayaran);
    hargaInput.addEventListener('input', hitungJumlahPembayaran);
});
</script>

<?= $this->endSection() ?>