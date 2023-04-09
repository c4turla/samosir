<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Jadwal</a></li>
                    <li class="breadcrumb-item active">Keberangkatan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <div class="mb-4">
                            <h5 class="card-title">List Data Keberangkatan</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                            <div>
                                <a href="<?= base_url('keberangkatan-add') ?>" class="btn btn-success"><i class="bx bx-plus me-1"></i> Tambah Keberangkatan</a>
                            </div>

                        </div>
                    </div>
                    <div class="flash-data" data-flashdata="<?php echo session()->getFlashdata('message'); ?>"></div>
                </div>
                <!-- end row -->

                <div class="table-responsive">
                    <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead>
                            <tr class="bg-transparent">
                                <th style="width: 30px;">
                                    <div class="form-check font-size-16">
                                        <input type="checkbox" name="check" class="form-check-input" id="checkAll">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th style="width: 120px;">Nama Kapal</th>
                                <th>Tujuan</th>
                                <th>Tanggal/Jam</th>
                                <th>Dermaga</th>
                                <th>ABK</th>
                                <th>Status</th>
                                <th>Approval</th>
                                <th style="width: 90px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $key = 1;
                            foreach ($keberangkatan as $key => $keberangkatan) :  ?>
                                <tr>
                                    <td>
                                        <?= ++$key ?>
                                    </td>

                                    <td><a href="javascript: void(0);" class="text-dark fw-medium"><?= $keberangkatan->nama_kapal ?></a> </td>
                                    <td>
                                        <?= $keberangkatan->tujuan ?>
                                    </td>
                                    <td><?= $keberangkatan->tanggal ?> <?= $keberangkatan->jam ?></td>

                                    <td>
                                        <?= $keberangkatan->nama ?>
                                    </td>
                                    <td>
                                        <?= $keberangkatan->abk ?>
                                    </td>
                                    <td>
                                        <?= $keberangkatan->status ?>
                                    </td>
                                    <td>
                                        <?php if ($keberangkatan->status_approval == '1') {
                                            echo '<div class="badge badge-soft-success font-size-12">Approve</div>';
                                        } else {
                                            echo '<div class="badge badge-soft-warning font-size-12">Pending</div>';
                                        } ?>

                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <?php if ($keberangkatan->status_approval == '0') {
                                                    echo '<li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#approve-' . $keberangkatan->id_keberangkatan . '">Approve</a></li>';
                                                } ?>
                                                <li><a class="dropdown-item" href="<?= base_url("keberangkatan/edit"); ?>/<?= $keberangkatan->id_keberangkatan ?>">Edit</a></li>
                                                <li><a class="dropdown-item tombol-hapus" href="<?= base_url("keberangkatan/delete"); ?>/<?= $keberangkatan->id_keberangkatan ?>">Hapus</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <!--  Approve modal -->
                                <div class="modal fade" id="approve-<?= $keberangkatan->id_keberangkatan ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel">Approve Data Keberangkatan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?= base_url('keberangkatan/approve/' . $keberangkatan->id_keberangkatan . '') ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <div class="modal-body">
                                                    <div class="col-sm-auto">
                                                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                                <i class="bx bx-check-double font-size-16 align-middle me-2"></i> Approve
                                                            </button>
                                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">
                                                                <i class="bx bx-x font-size-16 align-middle me-2"></i> Batal
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <div class="mb-3">
                                                                    <label for="nama_kapal" class="form-label">Nama Kapal</label>
                                                                    <input class="form-control" type="text" id="nama_kapal" name="nama_kapal" value="<?= $keberangkatan->nama_kapal ?>" disabled>
                                                                    <input type="hidden" id="approve_by" name="approve_by" value="<?= session()->get('name'); ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="tujuan" class="form-label">Tujuan</label>
                                                                    <input class="form-control" type="text" id="tujuan" name="tujuan" value="<?= $keberangkatan->tujuan ?>" disabled>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="long" class="form-label">Longitude</label>
                                                                    <div class="col-sm-8">
                                                                        <input class="form-control" type="text" id="long" name="long" value="<?= $keberangkatan->long ?>" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="lat" class="form-label">Latitude</label>
                                                                    <div class="col-sm-8">
                                                                        <input class="form-control" type="text" id="lat" name="lat" value="<?= $keberangkatan->lat ?>" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6">
                                                            <div class="mt-3 mt-lg-0">
                                                                <div class="mb-3">
                                                                    <label for="abk" class="form-label">ABK</label>
                                                                    <div class="col-sm-5">
                                                                        <input class="form-control" type="text" id="abk" name="abk" value="<?= $keberangkatan->abk ?>" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="tanggal" class="form-label">Tanggal</label>
                                                                    <div class="col-sm-5">
                                                                        <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $keberangkatan->tanggal ?>" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="jam" class="form-label">Jam</label>
                                                                    <div class="col-sm-5">
                                                                        <input class="form-control" type="time" id="jam" name="jam" value="<?= $keberangkatan->jam ?>" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="dermaga" class="form-label">Dermaga</label>
                                                                    <input class="form-control" type="text" id="dermaga" name="dermaga" value="<?= $keberangkatan->dermaga ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Info Muatan / Data Logistik</h4>
                                                        </div>
                                                        </hr>
                                                        <div class="col-lg-6">
                                                            <div class="mt-3 mt-lg-0">
                                                                <div class="mb-3">
                                                                    <label for="es" class="form-label">Es</label>
                                                                    <input class="form-control" type="number" id="es" name="es" value="<?= $keberangkatan->es ?>" disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="air" class="form-label">Air</label>
                                                                    <input class="form-control" type="number" id="air" name="air" value="<?= $keberangkatan->air ?>" disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="solar" class="form-label">Solar</label>
                                                                    <input class="form-control" type="number" id="solar" name="solar" value="<?= $keberangkatan->solar ?>" disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="oli" class="form-label">Olie</label>
                                                                    <input class="form-control" type="number" id="oli" name="oli" value="<?= $keberangkatan->oli ?>" disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="bensin" class="form-label">Bensin</label>
                                                                    <input class="form-control" type="number" id="bensin" name="bensin" value="<?= $keberangkatan->bensin ?>" disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="lainnya" class="form-label">Lain-lain</label>
                                                                    <input class="form-control" type="number" id="lainnya" name="lainnya" value="<?= $keberangkatan->lainnya ?>" disabled>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $keberangkatan->keterangan ?>" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

            <?php endforeach; ?>
            </tbody>
            </table>
            </div>
            <!-- end table responsive -->
        </div>
        <!-- end card body -->
    </div>
    <!-- end card -->
</div>
<!-- end col -->
</div>

<!-- end row -->
<?= $this->endSection() ?>