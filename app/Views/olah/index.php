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
                    <li class="breadcrumb-item active">Olah Gerak</li>
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
                            <h5 class="card-title">List Data Olah Gerak</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                            <div>
                                <a href="<?= base_url('olah-add') ?>" class="btn btn-success"><i class="bx bx-plus me-1"></i> Tambah Olah Gerak</a>
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
                                <th>Nama Kapal</th>
                                <th>Tanggal/Jam</th>
                                <th>Dermaga</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $key = 0;
                            foreach ($olahgerak as $row) : 
                            ?>
                                <tr>
                                    <td>
                                        <?= ++$key ?>
                                    </td>

                                    <td><a href="javascript: void(0);" class="text-dark fw-medium"><?= $row->nama_kapal; ?></a> </td>
                                    <td>
                                        <?= $row->tanggal; ?> <?= $row->jam; ?>
                                    </td>
                                    <td>
                                        <?= $row->nama; ?>
                                    </td>
                                    <td>
                                        <?= $row->status; ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="<?= base_url("olah/edit"); ?>/<?= $row->id_olah_gerak; ?>">Edit</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                <?php   endforeach;    ?>
                                </tr>

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