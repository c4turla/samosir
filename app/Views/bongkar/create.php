<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>SAMOSIR - Sistem Infromasi dan Monitoring Aktivitas Kapal Perikanan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistem Infromasi dan Monitoring Aktivitas Kapal Perikanan" name="description" />
    <meta content="Kendariweb" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">

    <!-- flatpickr css -->
    <link href="<?= base_url('assets/libs/flatpickr/flatpickr.min.css') ?>" rel="stylesheet" type="text/css">

    <!-- DataTables -->
    <link href="<?= base_url('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= base_url('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="<?= base_url('stylesheet" href="assets/css/preloader.min.css') ?>" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />

    <!-- choices css -->
    <link href="<?= base_url('assets/libs/choices.js/public/assets/styles/choices.min.css') ?>" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>


</head>

<body>

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('partial/menu') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="<?= base_url('/bongkar') ?>">Jadwal</a></li>
                                        <li class="breadcrumb-item active">Pembongkaran Ikan</li>
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
                                    <h4 class="card-title">Tambah Pembongkaran Ikan</h4>
                                    <p class="card-title-desc">Gunakan Form ini untuk menambah data pembongkaran ikan.</p>
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

                                                <form action="<?= base_url('bongkar/store') ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <div class="row mb-4">
                                                        <label for="nama-ikan" class="col-sm-3 col-form-label">Data Kapal</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="nama_kapal" name="nama_kapal" value="<?= old('nama_kapal'); ?>">
                                                            <input type="hidden" id="id_kapal" name="id_kapal"  >
                                                            <input type="hidden"  id="id_kedatangan" name="id_kedatangan" >
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal">Pilih Kapal</button>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="no-surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= old('no_surat'); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="syahbandar" class="col-sm-3 col-form-label">Nama Syahbandar</label>
                                                        <div class="col-sm-4">
                                                            <select class="form-control" name="syahbandar" id="syahbandar" data-trigger>
                                                                <option value="">- Pilih Syahbandar -</option>
                                                                <option value="Irvan Armana, S.St.Pi, M.Si">Irvan Armana, S.St.Pi, M.Si</option>
                                                                <option value="Adi Daeng Pawewang, S.Pi">Adi Daeng Pawewang, S.Pi</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="no-surat" class="col-sm-3 col-form-label">Nama Nakhoda/Nelayan</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="nama_nakhoda" name="nama_nakhoda" value="<?= old('nama_nakhoda'); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="no-surat" class="col-sm-3 col-form-label">Tanda Pengenal Kapal/Tanda Selar</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="tanda_pengenal" name="tanda_pengenal" value="<?= old('tanda_pengenal'); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="no-surat" class="col-sm-3 col-form-label">Jam/No Urut Bongkar</label>
                                                        <div class="col-sm-2">
                                                            <input type="time" class="form-control" id="jam" name="jam" value="<?= old('jam'); ?>" placeholder="Jam">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="text" class="form-control" id="no_urut" name="no_urut" value="<?= old('no_urut'); ?>" placeholder="No Urut">
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
                                                    <th>GT</th>
                                                    <th>Tanda Selar</th>
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
                                                            <?= $row['tanggal'] ?>/<?= $row['jam'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['gt'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $row['tanda_selar'] ?>
                                                        </td>
                                                        <td class="kapal">
                                                            <button class="btn btn-outline-secondary btn-sm" data-id="<?= $row['id_kapal'] ?>" data-nama="<?= $row['nama_kapal'] ?>" data-tanda="<?= $row['tanda_selar'] ?>" data-kedatangan="<?= $row['id_kedatangan'] ?>" data-bs-dismiss="modal">
                                                                <i class="fas fa-check" title="Pilih" > Pilih </i>
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
                    <?= $this->include('partial/footer') ?>

                    <!-- end main content-->

                </div>
                <!-- END layout-wrapper -->


                <?= $this->include('partial/right-sidebar') ?>


                <script>
                    $(document).ready(function() {
                        $(".kapal button").on("click", function() {
                            let dataId = $(this).data("id");
                            let dataNama = $(this).data("nama");
                            let dataKedatangan = $(this).data("kedatangan");
                            let dataTanda = $(this).data("tanda");
                            var n = $('#nama_kapal').val(dataNama);
                            var i = $('#id_kapal').val(dataId);
                            var k = $('#id_kedatangan').val(dataKedatangan);
                            var t = $('#tanda_pengenal').val(dataTanda);
                        });
                    });
                </script>

                <!-- JAVASCRIPT -->
                <script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script>
                <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
                <script src="<?= base_url('assets/libs/metismenu/metisMenu.min.js') ?>"></script>
                <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js') ?>"></script>
                <script src="<?= base_url('assets/libs/node-waves/waves.min.js') ?>"></script>
                <script src="<?= base_url('assets/libs/feather-icons/feather.min.js') ?>"></script>
                <!-- pace js -->
                <script src="<?= base_url('assets/libs/pace-js/pace.min.js') ?>"></script>
                <!-- flatpickr js -->
                <script src="<?= base_url('assets/libs/flatpickr/flatpickr.min.js') ?>"></script>

                <!-- choices js -->
                <script src="<?= base_url('assets/libs/choices.js/public/assets/scripts/choices.min.js') ?>"></script>

                <!-- Required datatable js -->
                <script src="<?= base_url('assets/libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
                <script src="<?= base_url('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>

                <!-- Responsive examples -->
                <script src="<?= base_url('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
                <script src="<?= base_url('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
                <!-- init js -->
                <script src="<?= base_url('assets/js/pages/invoices-list.init.js') ?>"></script>
                <!-- init js -->
                <script src="<?= base_url('assets/js/pages/form-advanced.init.js') ?>"></script>

                <script src="<?= base_url('assets/js/app.js') ?>"></script>


</body>

</html>