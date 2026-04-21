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
                    <li class="breadcrumb-item active">Edit Order Jasa Peralatan</li>
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
                <h4 class="card-title">Edit Order Jasa Peralatan</h4>
                <p class="card-title-desc">Gunakan Form ini untuk mengedit data Jasa Pemakaian Peralatan.</p>
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
                            <form action="<?= base_url('jasaperalatan/update/' . $jasaPeralatan['id_jasa']) ?>"
                                method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Nomor Order</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="no_order" name="no_order"
                                            value="<?= $jasaPeralatan['no_order'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="nama-kapal" class="col-sm-3 col-form-label">Nama Penyewa</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="nama_penyewa" id="nama_penyewa" data-trigger>
                                            <option value="">- Pilih Penyewa -</option>
                                            <?php foreach ($kapal as $val) { ?>
                                            <?php if ($val->nama_kapal === $jasaPeralatan['nama_penyewa']) : ?>
                                            <?php echo "<option value='" . $val->nama_kapal . "' selected>" . $val->nama_kapal . "</option>"; ?>
                                            <?php else : ?>
                                            <?php echo "<option value='" . $val->nama_kapal . "'>" . $val->nama_kapal . "</option>"; ?>
                                            <?php endif; ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no-surat" class="col-sm-3 col-form-label">Tanggal Order</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                                            value="<?= $jasaPeralatan['tanggal'] ?>">
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
                                            name="keranjang_plastik" value="<?= $jasaPeralatan['keranjang_plastik']; ?>">
                                    </div>
                                    <label for="ket_keranjang_plastik"
                                        class="col-sm-1 col-form-label ps-4">Keterangan</label>
                                    <!-- Tambah padding kiri -->
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="ket_keranjang_plastik"
                                            name="ket_keranjang_plastik" value="<?= $jasaPeralatan['ket_keranjang_plastik']; ?>">
                                    </div>
                                </div>

                                <div class="row g-0 mb-4 align-items-center">
                                    <label for="meja_sortir" class="col-sm-2 col-form-label">Meja Sortir</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="meja_sortir" name="meja_sortir"
                                            value="<?= $jasaPeralatan['meja_sortir']; ?>">
                                    </div>
                                    <label for="keterangan2" class="col-sm-1 col-form-label ps-4">Keterangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="ket_meja_sortir"
                                            name="ket_meja_sortir" value="<?= $jasaPeralatan['ket_meja_sortir']; ?>">
                                    </div>
                                </div>

                                <div class="row g-0 mb-4 align-items-center">
                                    <label for="gerobak" class="col-sm-2 col-form-label">Gerobak</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="gerobak" name="gerobak"
                                            value="<?= $jasaPeralatan['gerobak']; ?>">
                                    </div>
                                    <label for="ket_gerobak" class="col-sm-1 col-form-label ps-4">Keterangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="ket_gerobak" name="ket_gerobak"
                                            value="<?= $jasaPeralatan['ket_gerobak']; ?>">
                                    </div>
                                </div>
                                <div class="row g-0 mb-4 align-items-center">
                                    <label for="timbangan" class="col-sm-2 col-form-label">Timbangan</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="timbangan" name="timbangan"
                                            value="<?= $jasaPeralatan['timbangan']; ?>">
                                    </div>
                                    <label for="ket_timbangan" class="col-sm-1 col-form-label ps-4">Keterangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="ket_timbangan" name="ket_timbangan"
                                            value="<?= $jasaPeralatan['ket_timbangan']; ?>">
                                    </div>
                                </div>
                                <div class="row g-0 mb-4 align-items-center">
                                    <label for="ice_cruiser" class="col-sm-2 col-form-label">Ice Cruiser</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="ice_cruiser" name="ice_cruiser"
                                            value="<?= $jasaPeralatan['ice_cruiser']; ?>">
                                    </div>
                                    <label for="ket_ice_cruiser" class="col-sm-1 col-form-label ps-4">Keterangan</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="ket_ice_cruiser"
                                            name="ket_ice_cruiser" value="<?= $jasaPeralatan['ket_ice_cruiser']; ?>">
                                    </div>
                                </div>
                                </hr>
                                <div class="row mb-4">
                                    <label for="petugas" class="col-sm-2 col-form-label">Petugas</label>
                                    <div class="col-sm-6">
                                        <input type="input" class="form-control" id="petugas" name="petugas"
                                            value="<?= $jasaPeralatan['petugas']; ?>">
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
                                <a href="<?= base_url('peralatan') ?>" class="btn btn-danger"><i class="bx bx-arrow-back me-1"></i> Kembali</a>

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