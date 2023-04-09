<!doctype html>
<html lang="en">

<head>

    <?= $title_meta ?>

    <!-- preloader css -->
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


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
                    <?= $page_title ?>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-9 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm order-2 order-sm-1">
                                            <div class="d-flex align-items-start mt-3 mt-sm-0">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xl me-3">
                                                        <img src="<?= base_url() . "/images/users/" . session()->get('photo'); ?>" alt="" class="img-fluid rounded-circle d-block">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div>
                                                        <h5 class="font-size-16 mb-1"><?= session()->get('name'); ?></h5>
                                                        <p class="text-muted font-size-13"><?= session()->get('jabatan'); ?></p>

                                                        <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                            <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?= session()->get('alamat'); ?></div>
                                                            <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?= session()->get('email'); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-auto order-1 order-sm-2">
                                            <div class="d-flex align-items-start justify-content-end gap-2">
                                                <div>
                                                    <div class="dropdown">
                                                        <button class="btn btn-link font-size-16 shadow-none text-muted dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end">
                                                            <li><a class="dropdown-item" href="<?= base_url("user/edit"); ?>/<?= $_SESSION['id'] ?>">Edit</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Detail User</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab">About Apps</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->

                            <div class="tab-content">
                                <div class="tab-pane active" id="overview" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Detail User</h5>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <div class="pb-1">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Nama :</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <p class="mb-2"><?= session()->get('name'); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pb-1">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Email :</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <p><?= session()->get('email'); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pb-1">
                                                    <div class="row">
                                                        <div class="col-xl-2">
                                                            <div>
                                                                <h5 class="font-size-15">Alamat :</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl">
                                                            <div class="text-muted">
                                                                <p><?= session()->get('alamat'); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->

                                </div>
                                <!-- end tab pane -->

                                <div class="tab-pane" id="about" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">About Apps</h5>
                                        </div>
                                        <div class="card-body">
                                            <div>
                                                <div class="pb-3">
                                                    <h5 class="font-size-15">Aplikasi SAMOSIR :</h5>
                                                    <div class="text-muted">
                                                        <p class="mb-2">Sistem Informasi dan Monitoring Aktivitas Kapal Perikanan (SAMOSIR) merupakan aplikasi yang digunakan PPN Sibolga untuk monitoring Aktivitas Kapal yang ada di pelabuhan.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end tab pane -->

                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end col -->

                        <div class="col-xl-3 col-lg-4">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">List Pengguna</h5>

                                    <div class="list-group list-group-flush">
                                    <?php foreach ($user as $key => $user) {  ?>
                                        <a href="<?= base_url("user/edit"); ?>/<?= $user['id'] ?>" class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm flex-shrink-0 me-3">
                                                    <img src="<?= base_url() . "/images/users/" . $user['photo']; ?>" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div>
                                                        <h5 class="font-size-14 mb-1"><?= $user['name'] ?></h5>
                                                        <p class="font-size-13 text-muted mb-0"><?= $user['jabatan'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

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
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="assets/libs/pace-js/pace.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>