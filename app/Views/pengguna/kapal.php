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
                    <li class="breadcrumb-item active">Kapal Kelolaan</li>
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
                <h4 class="card-title">Kapal Kelolaan</h4>
                <p class="card-title-desc">Gunakan Form ini untuk mengubah data kapal kelolaan.</p>
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
                                                        <div class="card-header align-items-center d-flex">
                                                            <h4 class="card-title mb-0 flex-grow-1">Data Kapal</h4>
                                                            <div class="flex-shrink-0">
                                                                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                                                    <div>
                                                                        <a href="<?= base_url("pengguna/addkapal"); ?>/<?= $pengguna['id_pengguna'] ?>" class="btn btn-success btn-sm"><i class="bx bx-plus me-1"></i> Tambah Kapal</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- end card header -->

                                                        <div class="card-body px-0">
                                                            <div class="px-3" data-simplebar="init" style="max-height: 352px;">
                                                                <div class="simplebar-wrapper" style="margin: 0px -16px;">
                                                                    <div class="simplebar-height-auto-observer-wrapper">
                                                                        <div class="simplebar-height-auto-observer"></div>
                                                                    </div>
                                                                    <div class="simplebar-mask">
                                                                        <div class="simplebar-offset" style="right: -16.8px; bottom: 0px;">
                                                                            <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden scroll;">
                                                                                <div class="simplebar-content" style="padding: 0px 16px;">
                                                                                    <ul class="list-unstyled activity-wid mb-0">
                                                                                        <?php
                                                                                        $key = 1;
                                                                                        foreach ($kapal as $key => $kapal) {
                                                                                        ?>
                                                                                            <li class="activity-list ">
                                                                                                <div class="activity-icon avatar-md">
                                                                                                    <span class="avatar-title bg-warning-subtle text-warning rounded-circle">
                                                                                                        <i class="bx bxl-telegram font-size-24"></i>
                                                                                                    </span>
                                                                                                </div>
                                                                                                <div class="timeline-list-item">
                                                                                                    <div class="d-flex">
                                                                                                        <div class="flex-grow-1 overflow-hidden me-4">
                                                                                                            <h5 class="font-size-14 mb-1"><?= $kapal["nama_kapal"] ?></h5>
                                                                                                            <p class="text-truncate text-muted font-size-13"><?= $kapal['pemilik'] ?></p>
                                                                                                        </div>
                                                                                                        <div class="flex-shrink-0 text-end me-3">
                                                                                                            <h6 class="mb-1"> <?php if ($kapal['status_pengurus'] == 1) { ?>
                                                                                                                    <div class="badge rounded-pill badge-soft-success font-size-12">Aktif</div>
                                                                                                                <?php } else { ?>
                                                                                                                    <div class="badge rounded-pill badge-soft-danger font-size-12">Tidak Aktif</div>
                                                                                                                <?php } ?>
                                                                                                                </h5>
                                                                                                            </h6>
                                                                                                            <div class="font-size-13">GT <?= $kapal['gt'] ?></div>
                                                                                                        </div>

                                                                                                        <div class="flex-shrink-0 text-end">
                                                                                                            <div class="dropdown">
                                                                                                                <a class="text-muted dropdown-toggle font-size-24" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                                    <i class="mdi mdi-dots-vertical"></i>
                                                                                                                </a>

                                                                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                                                                    <?php if ($kapal['status_pengurus'] == 0) { ?>
                                                                                                                        <a class="dropdown-item" href="<?= base_url("pengguna/aktivasikapal"); ?>/<?= $kapal['id'] ?>">Aktifkan</a>
                                                                                                                        <a class="dropdown-item" href="<?= base_url("pengguna/detailkapal"); ?>/<?= $kapal['id'] ?>">Detail</a>
                                                                                                                    <?php } else { ?>
                                                                                                                        <a class="dropdown-item" href="<?= base_url("pengguna/editkapal"); ?>/<?= $kapal['id'] ?>">Edit</a>
                                                                                                                        <a class="dropdown-item tombol-hapus" href="<?= base_url("pengguna/delkapal"); ?>/<?= $kapal['id'] ?>">Hapus</a>
                                                                                                                    <?php } ?>

                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </li>

                                                                                        <?php } ?>

                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="simplebar-placeholder" style="width: auto; height: auto;"></div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <!-- end card body -->
                                                    </div>
                                                    <!-- end card -->

                                                </div>
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