<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>SIKAP - Sistem Informasi Aktivitas Kapal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistem Informasi Aktivitas Kapal" name="description" />
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
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


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

                    <?= $this->renderSection('content') ?>

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <?= $this->include('partial/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <?= $this->include('partial/right-sidebar') ?>

    <!-- JAVASCRIPT -->

            <!-- Sweet Alerts js -->
            <script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>
        <!-- Sweet alert init js-->
        <script src="<?= base_url('assets/js/pages/sweetalert.init.js') ?>"></script>
        
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