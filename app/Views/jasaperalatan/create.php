<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/peralatan') ?>">Jasa</a></li>
                    <li class="breadcrumb-item active">Tambah Jasa Peralatan</li>
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
                <h4 class="card-title">Tambah Jasa Peralatan</h4>
                <p class="card-title-desc">Gunakan Form ini untuk menambah data Jasa Pemakaian Peralatan.</p>
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

                            <form action="<?= base_url('peralatan/storeorder') ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Nomor Order</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="no_order" name="no_order"
                                            value="<?= esc($no_order ?? '') ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="nama-kapal" class="col-sm-3 col-form-label">Nama Penyewa</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="nama_penyewa" id="nama_penyewa" data-trigger>
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
                                    <label for="no-surat" class="col-sm-3 col-form-label">Tanggal Order</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                                            value="<?= old('tanggal'); ?>">
                                    </div>
                                </div>
                                <div class="card-header">
                                    <h4 class="card-title">Pemakaian Peralatan</h4>
                                </div>
                                </hr>
                                <div class="row g-0 mb-4 mt-4 align-items-center">
                                    <label for="keranjang_plastik" class="col-sm-2 col-form-label">Keranjang
                                        Plastik</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="keranjang_plastik"
                                            name="keranjang_plastik" value="<?= old('keranjang_plastik'); ?>">
                                    </div>
                                    <label for="ket_keranjang_plastik"
                                        class="col-sm-1 col-form-label ps-4">Keterangan</label>
                                    <!-- Tambah padding kiri -->
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="ket_keranjang_plastik"
                                            name="ket_keranjang_plastik" value="<?= old('ket_keranjang_plastik'); ?>">
                                    </div>
                                </div>

                                <div class="row g-0 mb-4 align-items-center">
                                    <label for="meja_sortir" class="col-sm-2 col-form-label">Meja Sortir</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="meja_sortir" name="meja_sortir"
                                            value="<?= old('keranjang2'); ?>">
                                    </div>
                                    <label for="keterangan2" class="col-sm-1 col-form-label ps-4">Keterangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="ket_meja_sortir"
                                            name="ket_meja_sortir" value="<?= old('ket_meja_sortir'); ?>">
                                    </div>
                                </div>

                                <div class="row g-0 mb-4 align-items-center">
                                    <label for="gerobak" class="col-sm-2 col-form-label">Gerobak</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="gerobak" name="gerobak"
                                            value="<?= old('gerobak'); ?>">
                                    </div>
                                    <label for="ket_gerobak" class="col-sm-1 col-form-label ps-4">Keterangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="ket_gerobak" name="ket_gerobak"
                                            value="<?= old('ket_gerobak'); ?>">
                                    </div>
                                </div>
                                <div class="row g-0 mb-4 align-items-center">
                                    <label for="timbangan" class="col-sm-2 col-form-label">Timbangan</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="timbangan" name="timbangan"
                                            value="<?= old('timbangan'); ?>" readonly>
                                    </div>
                                    <label for="ket_timbangan" class="col-sm-1 col-form-label ps-4">Keterangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="ket_timbangan" name="ket_timbangan"
                                            value="<?= old('ket_timbangan'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="row g-0 mb-4 align-items-center">
                                    <label for="ice_cruiser" class="col-sm-2 col-form-label">Ice Cruiser</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="ice_cruiser" name="ice_cruiser"
                                            value="<?= old('ice_cruiser'); ?>" readonly>
                                    </div>
                                    <label for="ket_ice_cruiser" class="col-sm-1 col-form-label ps-4">Keterangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="ket_ice_cruiser"
                                            name="ket_ice_cruiser" value="<?= old('ket_ice_cruiser'); ?>" readonly>
                                    </div>
                                </div>
                                </hr>
                                <div class="row mb-4">
                                    <label for="petugas" class="col-sm-2 col-form-label">Petugas</label>
                                    <div class="col-sm-6">
                                        <input type="input" class="form-control" id="petugas" name="petugas"
                                            value="<?= old('petugas'); ?>">
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

<?= $this->endSection() ?>