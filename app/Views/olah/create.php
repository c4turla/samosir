<?= $this->extend('partial/layout') ?>

<?= $this->section('content') ?>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('/olahgerak') ?>">Jadwal</a></li>
                    <li class="breadcrumb-item active">Olah Gerak</li>
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
                <h4 class="card-title">Tambah Olah Gerak</h4>
                <p class="card-title-desc">Gunakan Form ini untuk menambah data olah gerak.</p>
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

                            <form action="<?= base_url('olahgerak/store') ?>" method="post">
                                <?= csrf_field(); ?>
                                <div class="row mb-4">
                                    <label for="nama-ikan" class="col-sm-3 col-form-label">Data Kapal</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="nama_kapal" name="nama_kapal" value="<?= old('nama_kapal'); ?>">
                                        <input type="hidden" id="id_kapal" name="id_kapal">
                                        <input type="hidden" id="id_kedatangan" name="id_kedatangan">
                                        <input type="hidden" id="approve_by" name="approve_by" value="<?= session()->get('name'); ?>">
                                        <input type="hidden" id="input_by" name="input_by" value="<?= session()->get('name'); ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal">Pilih Kapal</button>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-2">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="jam" class="col-sm-3 col-form-label">Jam</label>
                                    <div class="col-sm-2">
                                        <input type="time" class="form-control" id="jam" name="jam" readonly>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="id_tangakahan" name="id_tangakahan">
                                <div class="row mb-4">
                                    <label for="jam" class="col-sm-3 col-form-label">Dermaga Asal</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="asal" name="asal" readonly>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="dermaga" class="col-sm-3 col-form-label">Dermaga Tujuan</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="dermaga" id="dermaga" data-trigger>
                                            <option value="">- Pilih Dermaga -</option>
                                            <?php foreach ($dermaga as $row) : ?>
                                                <option value="<?php echo $row->id_tangkahan; ?>"><?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="status" class="col-sm-3 col-form-label">Status Kapal</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="status" id="status" data-trigger>
                                            <option value="">- Pilih Status -</option>
                                            <option value="TAMBAT">TAMBAT</option>
                                            <option value="LABUH">LABUH</option>
                                            <option value="BONGKAR">BONGKAR</option>
                                            <option value="PERBAIKAN">PERBAIKAN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="syahbandar" class="col-sm-3 col-form-label">Nama Syahbandar</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="syahbandar" id="syahbandar" data-trigger>
                                            <option value="">- Pilih Syahbandar -</option>
                                            <?php foreach ($syahbandar as $row) : ?>
                                                <option value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
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
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" data-bs-scroll="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Data Kedatangan Kapal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Silahkan Pilih Kapal</h5>
                <div class="table-responsive">
                    <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                        <thead>
                            <tr class="bg-transparent">
                                <th>Nama Kapal</th>
                                <th>Tanggal/Jam</th>
                                <th>Dermaga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($kapal as $row) :
                            ?>
                                <tr>
                                    <td><?= $row['nama_kapal'] ?></a> </td>
                                    <td>
                                        <?= $row['tanggal'] ?> <?= $row['jam'] ?>
                                    </td>
                                    <td>
                                        <?= $row['nama'] ?>
                                    </td>
                                    <td class="kapal">
                                        <button class="btn btn-outline-secondary btn-sm" data-id="<?= $row['id_kapal'] ?>" data-nama="<?= $row['nama_kapal'] ?>" data-kedatangan="<?= $row['id_kedatangan'] ?>" data-tanggal="<?= $row['tanggal'] ?>" data-jam="<?= $row['jam'] ?>" data-iddermaga="<?= $row['id_tangkahan'] ?>" data-dermaga="<?= $row['nama'] ?>" data-bs-dismiss="modal">
                                            <i class="fas fa-check" title="Pilih"> Pilih </i>
                                        </button>

                                    </td>
                                <?php endforeach;    ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>



<script>
    $(document).ready(function() {
        $(".kapal button").on("click", function() {
            let dataId = $(this).data("id");
            let dataNama = $(this).data("nama");
            let dataKedatangan = $(this).data("kedatangan");
            let dataTanggal = $(this).data("tanggal");
            let dataJam = $(this).data("jam");
            let dataIDdermaga = $(this).data("iddermaga");
            let dataDermaga = $(this).data("dermaga");
            var n = $('#nama_kapal').val(dataNama);
            var i = $('#id_kapal').val(dataId);
            var k = $('#id_kedatangan').val(dataKedatangan);
            var t = $('#tanggal').val(dataTanggal);
            var j = $('#jam').val(dataJam);
            var k = $('#id_tangakahan').val(dataIDdermaga);
            var l = $('#asal').val(dataDermaga);
        });
    });
</script>

<?= $this->endSection() ?>