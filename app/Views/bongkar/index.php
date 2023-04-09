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
                    <li class="breadcrumb-item active">Pembongkaran Ikan</li>
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
                            <h5 class="card-title">List Data Pembongkaran Ikan</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                            <div>
                                <a href="<?= base_url('bongkar-add') ?>" class="btn btn-success"><i class="bx bx-plus me-1"></i> Tambah Pembongkaran Ikan</a>
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
                                <th>Nomor Surat</th>
                                <th>Nama Nakhoda</th>
                                <th>Nama Kapal</th>
                                <th>GT</th>
                                <th>Tanda Pengenal</th>
                                <th>Jam/No Urut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $key = 0;
                            foreach ($bongkar as $row) : 
                            ?>
                                <tr>
                                    <td>
                                        <?= ++$key ?>
                                    </td>
                                    <td>
                                    <a href="javascript: void(0);" class="text-dark fw-medium"><?= $row->no_surat; ?></a>
                                    </td>
                                    <td><?= $row->nama_nakhoda; ?> </td>

                                    <td>
                                        <?= $row->nama_kapal; ?>
                                    </td>
                                    <td>
                                        <?= $row->gt; ?>
                                    </td>
                                    <td>
                                        <?= $row->tanda_pengenal; ?>
                                    </td>
                                    <td>
                                        <?= $row->jam; ?> / <?= $row->no_urut; ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="<?= base_url("bongkar/print"); ?>/<?= $row->id_bongkar; ?>" target="_blank">Print</a></li>
                                                <li><a class="dropdown-item tombol-hapus" href="<?= base_url("bongkar/delete"); ?>/<?= $row->id_bongkar; ?>">Hapus</a></li>
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