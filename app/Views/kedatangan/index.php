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
    <link href="<?= base_url('assets/css/preloader.min.css') ?>" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />

    <!-- choices css -->
    <link href="<?= base_url('assets/libs/choices.js/public/assets/styles/choices.min.css') ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href=" http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
    <script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <style>
        #map {
            width: 1124px;
            height: 680px;
            margin: 0;
            padding: 0;
        }

        .get-markers {
            width: 100%;
            margin: 10px 0;
        }
    </style>


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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Jadwal</a></li>
                                        <li class="breadcrumb-item active">Kedatangan</li>
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
                                                <h5 class="card-title">List Data Kedatangan</h5>
                                            </div>
                                        </div>
                                        <div class="col-sm-auto">
                                            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                                                <div>
                                                    <a href="<?= base_url('kedatangan-add') ?>" class="btn btn-success"><i class="bx bx-plus me-1"></i> Tambah Kedatangan</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="flash-data" data-flashdata="<?php echo session()->getFlashdata('message'); ?>"></div>
                                    </div>
                                    <!-- end row -->

                                    <div class="table-responsive">
                                        <table id="tblkedatangan" class="table align-middle dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                            <thead>
                                                <tr class="bg-transparent">
                                                    <th style="width: 30px;">
                                                        <div class="form-check font-size-16">
                                                            <input type="checkbox" name="check" class="form-check-input" id="checkAll">
                                                            <label class="form-check-label" for="checkAll"></label>
                                                        </div>
                                                    </th>
                                                    <th style="width: 120px;">Nama Kapal</th>
                                                    <th>Asal</th>
                                                    <th>Tanggal/Jam</th>
                                                    <th>Dermaga</th>
                                                    <th>Status</th>
                                                    <th>Approval</th>
                                                    <th style="width: 90px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

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


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?= $this->include('partial/footer') ?>
    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <?= $this->include('partial/right-sidebar') ?>

    <script type="text/javascript">
    //Hapus Data
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href'); 
        console.log(urlToRedirect); 

    Swal.fire({
        title: "Apakah Anda Yakin?",
        text: "Data ini akan dihapus!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#2ab57d",
        cancelButtonColor: "#fd625e",
        confirmButtonText: "Ya, Hapus Data!"
    }).then((result) => {
        if (result.value) {
            window.location.href = urlToRedirect;
        }
        })
    };

    $(document).ready(function() {
        $('#tblkedatangan').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo site_url('datakedatangan') ?>",
            columnDefs: [
            { targets: -1, orderable: false}, //target -1 means last column
             ],
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
    <!-- Sweet Alerts js -->
    <script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>
    <!-- Sweet alert init js-->
    <script src="<?= base_url('assets/js/pages/sweetalert.init.js') ?>"></script>

    <script src="<?= base_url('assets/js/app.js') ?>"></script>


</body>

</html>