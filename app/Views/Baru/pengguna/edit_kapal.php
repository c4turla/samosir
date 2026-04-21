<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/pengguna') ?>">Data</a></li>
                    <li class="breadcrumb-item active">Edit Kapal Kelolaan</li>
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
                <h4 class="card-title">Edit Kapal Kelolaan</h4>
                <p class="card-title-desc">Gunakan Form ini untuk mengedit data Kapal Kelolaan.</p>
            </div>
            <div class="card-body p-4">

                <div class="row">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                            <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Periksa Kembali Form Entri Anda</strong></hr /> <?php echo session()->getFlashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-12 ms-lg-auto">
                        <div class="mt-4 mt-lg-0">

                            <form action="<?= base_url('pengguna/savekelolaan') ?>" method="post" enctype="multipart/form-data" class="">
                                <?= csrf_field(); ?>
                                <div class="row mb-4">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama Pengurus</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $pengguna['name'] ?>">
                                        <input type="hidden" class="form-control" id="id_pengguna" name="id_pengguna" value="<?= $pengguna['id_pengguna'] ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="id_kapal" class="col-sm-3 col-form-label">Nama Kapal</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="id_kapal" id="id_kapal" data-trigger>
                                            <option value="">- Pilih Kapal -</option>
                                            <?php foreach ($kapal as $row) : ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->nama_kapal; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="ktp" class="col-sm-3 col-form-label">KTP</label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" id="ktp" name="ktp" value="<?= old('ktp'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="surat_kuasa" class="col-sm-3 col-form-label">Surat Kuasa</label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" id="surat_kuasa" name="surat_kuasa" value="<?= old('surat_kuasa'); ?>">
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