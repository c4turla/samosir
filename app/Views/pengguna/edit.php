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
                    <li class="breadcrumb-item active">Edit Pengguna</li>
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
                <h4 class="card-title">Edit Pengguna</h4>
                <p class="card-title-desc">Gunakan Form ini untuk mengubah data pengguna.</p>
                <div class="flex-shrink-0">
                    <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home2" role="tab" aria-selected="true">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Info</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile2" role="tab" aria-selected="false">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Ganti Password</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body p-4">

                <div class="card-body">

                    <!-- Tab panes -->
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="home2" role="tabpanel">
                            <div class="row">
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Periksa Kembali Form Entri Anda</strong></hr /> <?php echo session()->getFlashdata('error'); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-12 ms-lg-auto">
                                    <div class="mt-4 mt-lg-0">
                                        <form action="<?php echo base_url('pengguna/update/' . $pengguna['id_pengguna']) ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <div class="row mb-4">
                                                <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="name" name="name" value="<?= $pengguna['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="email" name="email" value="<?= $pengguna['email'] ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="phone_no" class="col-sm-3 col-form-label">No HP</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="form-control" id="phone_no" name="phone_no" value="<?= $pengguna['phone_no'] ?>">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="status" class="col-sm-3 col-form-label">Status User</label>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked>
                                                        <label class="form-check-label" for="status1">Aktif</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="status2" value="0">
                                                        <label class="form-check-label" for="status2">Non Aktif</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="kapal" class="col-sm-3 col-form-label">Kapal Kelolaan</label>
                                                <div class="col-sm-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title mb-3">Data Kapal</h5>
                                                            <div class="list-group list-group-flush">
                                                                <?php
                                                                $key = 1;
                                                                foreach ($kapal as $key => $kapal) {
                                                                ?>
                                                                    <a href="<?= base_url("pengguna/aktivasi/")?>" class="list-group-item list-group-item-action">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm flex-shrink-0 me-3">
                                                                                <img src="" alt="" class="img-thumbnail rounded-circle">
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <div>
                                                                                    <h5 class="font-size-14 mb-1"><?= $kapal['nama_kapal'] ?>
                                                                                        <?php if ($kapal['status_pengurus'] == 1) { ?>
                                                                                            <div class="badge rounded-pill badge-soft-success font-size-12">Aktif</div> <button type="button" class="btn btn-warning btn-sm waves-effect waves-light mr-0">Non Aktifkan</button>
                                                                                        <?php } else { ?>
                                                                                            <div class="badge rounded-pill badge-soft-danger font-size-12">Tidak Aktif</div> <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Aktifkan</button>
                                                                                        <?php } ?>
                                                                                    </h5>
                                                                                    <p class="font-size-13 text-muted mb-0"><?= $kapal['pemilik'] ?></p>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                <?php } ?>

                                                            </div>
                                                        </div>
                                                        <!-- end card body -->
                                                    </div>
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
                        <div class="tab-pane" id="profile2" role="tabpanel">
                            <div class="row">
                                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                    <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                                        <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Periksa Kembali Form Entri Anda</strong></hr /> <?php echo session()->getFlashdata('error'); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <div class="col-lg-12 ms-lg-auto">
                                    <div class="mt-4 mt-lg-0">
                                        <form action="<?php echo base_url('pengguna/resetpassword/' . $pengguna['id_pengguna']) ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <div class="row mb-4">
                                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-4">
                                                    <input type="password" class="form-control" id="password" name="password">
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="confpassword" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                                <div class="col-sm-4">
                                                    <input type="password" class="form-control" id="confpassword" name="confpassword">
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
                </div><!-- end card-body -->



            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
<?= $this->endSection() ?>