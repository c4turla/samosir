<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/alat') ?>">Data</a></li>
                    <li class="breadcrumb-item active">Edit Jenis Peralatan</li>
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
                <h4 class="card-title">Edit Jenis Peralatan</h4>
                <p class="card-title-desc">Gunakan Form ini untuk mengubah data jenis peralatan.</p>
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

                            <form action="<?php echo base_url('alat/update/' . $alat['id_alat']) ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="row mb-4">
                                    <label for="nama-ikan" class="col-sm-3 col-form-label">Nama Alat</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nama-alat" name="nama_alat" value="<?= $alat['nama_alat'] ?>" style="text-transform:uppercase">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="nama-ikan" class="col-sm-3 col-form-label">Harga Sewa</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="nama-alat" name="harga_sewa" value="<?= $alat['harga_sewa'] ?>" >
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="nama-ikan" class="col-sm-3 col-form-label">Satuan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nama-alat" name="satuan" value="<?= $alat['satuan'] ?>">
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