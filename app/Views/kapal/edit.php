<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/kapal') ?>">Data</a></li>
                    <li class="breadcrumb-item active">Edit Kapal</li>
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
                <h4 class="card-title">Edit Data Kapal</h4>
                <p class="card-title-desc">Gunakan Form ini untuk menambah data kapal.</p>
            </div>
            <div class="card-body p-4">

                <div class="row">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Periksa Kembali Form Entri Anda</strong></hr /> <?php echo session()->getFlashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-6 ms-lg-auto">
                        <div class="mt-4 mt-lg-0">

                            <form action="<?= base_url('kapal/update/' . $kapal['id']) ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="row mb-4">
                                    <label for="nama-kapal" class="col-sm-3 col-form-label">Nama Kapal</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nama-kapal" name="nama_kapal" value="<?= $kapal['nama_kapal'] ?>" style="text-transform:uppercase">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="pemilik" class="col-sm-3 col-form-label">Pemilik</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?= $kapal['pemilik'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="no_izin" class="col-sm-3 col-form-label">No Izin</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="no_izin" name="no_izin" value="<?= $kapal['no_izin'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="gt" class="col-sm-3 col-form-label">GT</label>
                                    <div class="col-sm-4">
                                        <input type="number" min="0" oninput="this.value = 
                                                            !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" class="form-control" id="gt" name="gt" value="<?= $kapal['gt'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="alat_tangkap" class="col-sm-3 col-form-label">Alat Tangkap</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="alat_tangkap" name="alat_tangkap" value="<?= $kapal['alat_tangkap'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="photo" class="col-sm-3 col-form-label">Foto Kapal</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" id="photo" name="foto_kapal">
                                        <input type="hidden" name="oldfile" value="<?= $kapal['foto_kapal'] ?>" />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="preview" class="col-sm-3 col-form-label">Preview Kapal</label>
                                    <div class="col-sm-8 ml-8">
                                        <?php if ($kapal['foto_kapal'] == 0) { ?>
                                            <img id="blah" class="rounded me-2" alt="350x350" width="380" src="<?= base_url() . "/assets/images/blank_photo.png" ?>" data-holder-rendered="true">
                                        <?php } else { ?>
                                            <img id="blah" class="rounded me-2" alt="350x350" width="380" src="<?= base_url() . "/images/kapal/" . $kapal['foto_kapal']; ?>" data-holder-rendered="true">
                                        <?php } ?>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ms-lg-auto">
                        <div class="mt-4 mt-lg-0">

                            <div class="row mb-4">
                                <label for="tipe-kapal" class="col-sm-3 col-form-label">Tipe Kapal</label>
                                <div class="col-sm-8">
                                    <select class="form-select" name="tipe_kapal">
                                        <option>-Pilih Tipe Kapal-</option>
                                        <option value="Penangkap" <?= ($kapal['tipe_kapal'] == "Penangkap" ? "selected" : ""); ?>>Penangkap</option>
                                        <option value="Pengangkut/Pengumpul" <?= ($kapal['tipe_kapal'] == "Pengangkut/Pengumpul" ? "selected" : ""); ?>>Pengangkut/Pengumpul</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="tanda-selar" class="col-sm-3 col-form-label">Tanda Selar</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="tanda-selar" name="tanda_selar" value="<?= $kapal['tanda_selar'] ?>">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="tanggal-sipi" class="col-sm-3 col-form-label">Tanggal SIPI</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="tanggal-sipi" name="tanggal_sipi" value="<?= $kapal['tanggal_sipi'] ?>">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="tanggal-akhir-sipi" class="col-sm-3 col-form-label">Tanggal Akhir SIPI</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="tanggal-akhir-sipi" name="tanggal_akhir_sipi" value="<?= $kapal['tanggal_akhir_sipi'] ?>">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="panjang" class="col-sm-3 col-form-label">Panjang Kapal</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="panjang" name="panjang" value="<?= $kapal['panjang'] ?>">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="no-siup" class="col-sm-3 col-form-label">No SIUP</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="no-siup" name="no_siup" value="<?= $kapal['no_siup'] ?>">
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