<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/lap-kapal') ?>">Laporan</a></li>
                    <li class="breadcrumb-item active">Data Jenis Ikan</li>
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
                <h4 class="card-title">Laporan Data Jenis Ikan</h4>
                <p class="card-title-desc">Gunakan Form ini untuk laporan data jenis ikan.</p>
            </div>
            <div class="card-body p-4">

                <div class="row">
                    <div class="col-lg-12 ms-lg-auto">
                        <div class="mt-4 mt-lg-0">

                            <form action="<?= base_url('laporan/lap_jenis_ikan') ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="row mb-2">
                                    <label for="nama-kapal" class="col-sm-3 col-form-label align-right">Pilih Tanggal</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="vtglawal" name="tglawal"  >
                                    </div>
                                    <label for="nama-kapal" class="col-sm-2 col-form-label align-middle">Sampai Dengan</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tglakhir" name="tglakhir" >
                                    </div>
                                </div>
                        </div>
                    </div>
<hr>
                    <div class="row justify-content-center">
                        <div class="col-sm-3">
                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-save font-size-16 align-middle me-2"></i> Download
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