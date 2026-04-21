<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/tangkahan') ?>">Data</a></li>
                    <li class="breadcrumb-item active">Tambah Dermaga</li>
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
                <h4 class="card-title">Tambah Dermaga</h4>
                <p class="card-title-desc">Gunakan Form ini untuk menambah data Dermaga/Tangkahan.</p>
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

                            <form action="<?= base_url('tangkahan/store') ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="row mb-4">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama Dermaga</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>" placeholder="Nama Tangkahan/Dermaga">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= old('alamat'); ?>" placeholder="Alamat">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="jarak" class="col-sm-3 col-form-label">Jarak</label>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="jarak" name="jarak" value="<?= old('jarak'); ?>" placeholder="Jarak">
                                            <div class="input-group-text">Meter</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="alamat" class="col-sm-3 col-form-label">Koordinat</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="lat" name="lat" value="<?= old('lat'); ?>" placeholder="Latitude">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="long" name="long" value="<?= old('long'); ?>" placeholder="Longitude">
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