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
                    <li class="breadcrumb-item active">QR Code Kapal</li>
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
                <h4 class="card-title">QR Code Data Kapal</h4>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-lg-4 ms-lg-auto">
                        <img src=<?= $dataUri; ?> alt="Ppnsilboga.com">
                    </div>
                    <div class="col-lg-8 ms-lg-auto">
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
                                <label for="tanda-selar" class="col-sm-3 col-form-label">Tanda Selar</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="tanda-selar" name="tanda_selar" value="<?= $kapal['tanda_selar'] ?>">
                                </div>
                            </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-12">

                            <div class="d-flex flex-wrap gap-2">
                                <a href="<?= $dataUri; ?>" download="qr_kapal.png">
                                <button type="button" class="btn btn-primary waves-effect waves-light">
                                    <i class="bx bx-save font-size-16 align-middle me-2"></i> Download
                                </button>
                                </a>

                                <a href="<?= base_url('kapal') ?>"  class="btn btn-danger waves-effect waves-light">
                                    <i class="bx bx-error font-size-16 align-middle me-2"></i> Kembali
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

<?= $this->endSection() ?>