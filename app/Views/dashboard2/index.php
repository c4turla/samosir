<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard PPN Sibolga</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">

    <!-- plugin css -->
    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/leaflet2.css" />
    <script src="assets/js/leaflet2.js"></script>
    <script src="https://unpkg.com/lodash@4.17.21/lodash.js"></script>
    <?php
    foreach ($total_ikan as $data) {
        $nama[] = $data->nama_ikan;
        $totalikan[] = (float) $data->total;
    }
    ?>
    <style>
        #map {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .get-markers {
            width: 100%;
            margin: 10px 0;
        }
    </style>

</head>

<body data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="<?= base_url('/dashboardbaru') ?>" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.svg" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Dashboard PPN Sibolga</span>
                            </span>
                        </a>

                        <a href="<?= base_url('/dashboardbaru') ?>" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.svg" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Dashboard PPN Sibolga</span>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                </div>

                <div class="d-flex">

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item" id="mode-setting-btn">
                            <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                            <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                        </button>
                    </div>
                    <!-- 
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="bell" class="icon-lg"></i>
                            <span class="badge bg-danger rounded-pill">5</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small text-reset text-decoration-underline"> Unread (3)</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <img src="assets/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">James Lemire</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">It will seem like simplified English.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hour ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-sm me-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="bx bx-cart"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your order is placed</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-sm me-3">
                                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                                <i class="bx bx-badge-check"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Your item is shipped</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">If several languages coalesce the grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#!" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <img src="assets/images/users/avatar-6.jpg" class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1">Salena Layfield</h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hours ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top d-grid">
                                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span>
                                </a>
                            </div>
                        </div>
                    </div> -->

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item right-bar-toggle me-2">
                            <i data-feather="settings" class="icon-lg"></i>
                        </button>
                    </div>

                </div>
            </div>
        </header>

        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="<?= base_url('/dashboardbaru') ?>" id="topnav-dashboard" role="button">
                                    <i data-feather="home"></i><span data-key="t-dashboards">Dashboard</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">



                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-h-100">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Kapal Aktif</span>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target="<?php echo $total_kapal; ?>">0</span>
                                            </h4>
                                        </div>

                                        <div class="col-6">
                                            <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                        </div>
                                    </div>
                                    <div class="text-nowrap">
                                        <span class="ms-1 text-muted font-size-13">Lihat detail kapal</span>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-h-100">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Kapal Expired</span>
                                            <h4 class="mb-3">
                                                <span class="counter-value" data-target="<?php echo $kapal_expired; ?>">0</span>
                                            </h4>
                                        </div>
                                        <div class="col-6">
                                            <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                        </div>
                                    </div>
                                    <div class="text-nowrap">
                                        <span class="ms-1 text-muted font-size-13">Lihat detail kapal</span>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col-->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-h-100">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Kedatangan</span>
                                            <h4 class="mb-3">
                                                <?php foreach ($total_kedatangan as $row) :  $total = $row->tahun_ini; ?>
                                                    <span class="counter-value" data-target="<?php echo number_format($total, 0, ",", ".") ?>">0</span>
                                            </h4>
                                        </div>
                                        <div class="col-6">
                                            <div id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                        </div>
                                    </div>
                                    <div class="text-nowrap">
                                        <?php if ($row->total > 0) { ?>
                                            <span class="badge badge-soft-success text-success">+<?php echo $row->total; ?> Kedatangan </span>
                                        <?php } else { ?>
                                            <span class="badge badge-soft-danger text-danger"><?php echo $row->total; ?> Kedatangan</span>
                                        <?php } ?>
                                        <span class="ms-1 text-muted font-size-13">Dari Bulan Lalu</span>
                                    <?php endforeach; ?>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-h-100">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Keberangkatan</span>
                                            <h4 class="mb-3">
                                                <?php foreach ($total_keberangkatan as $row) :  $tahun = $row->tahun_ini; ?>
                                                    <span class="counter-value" data-target="<?php echo number_format($tahun, 0, ",", "."); ?>">0</span>
                                            </h4>
                                        </div>
                                        <div class="col-6">
                                            <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                        </div>
                                    </div>
                                    <div class="text-nowrap">
                                        <?php if ($row->total > 0) { ?>
                                            <span class="badge badge-soft-success text-success">+ <?php echo $row->total; ?> Kedatangan </span>
                                        <?php } else { ?>
                                            <span class="badge badge-soft-danger text-danger"><?php echo $row->total; ?> Kedatangan</span>
                                        <?php } ?>
                                        <span class="ms-1 text-muted font-size-13">Dari Bulan Lalu</span>
                                    <?php endforeach; ?>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row-->

                    <div class="row">
                        <div class="col-xl-5">
                            <!-- card -->
                            <div class="card card-h-100">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center mb-4">
                                        <h5 class="card-title me-2">Data Per Jenis Ikan</h5>
                                        <div class="ms-auto">
                                            <div>
                                                <button type="button" class="btn btn-soft-primary btn-sm">
                                                    BULAN INI
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-sm">
                                            <div id="total-ikan" data-colors='["#2ab57d", "#5156be", "#fd625e", "#4ba6ef", "#ffbf53"]' class="apex-charts"></div>
                                        </div>
                                        <div class="col-sm align-self-center">
                                            <div class="mt-4 mt-sm-0">
                                                <?php foreach ($total_ikan as $val) { ?>
                                                    <div class="mt-2 pt-0">
                                                        <p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-success"></i> <?php echo $val->nama_ikan ?> : <b><?= number_format($val->total, 0, ",", ".") ?> Kg</b></p>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-xl-7">
                            <div class="row">
                                <div class="col-xl-8">
                                    <!-- card -->
                                    <div class="card card-h-100">
                                        <!-- card body -->
                                        <div class="card-body">
                                            <div class="d-flex flex-wrap align-items-center mb-4">
                                                <h5 class="card-title me-2">Estimasi Data Penangkapan Ikan</h5>
                                                <div class="ms-auto">
                                                    <button type="button" class="btn btn-soft-primary btn-sm">
                                                        BULAN INI
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="row align-items-center">
                                                <div class="col-sm">
                                                    <div id="total-ikan-overview" data-colors='["#5156be", "#34c38f"]' class="apex-charts"></div>
                                                </div>
                                                <div class="col-sm align-self-center">
                                                    <div class="mt-4 mt-sm-0">
                                                        <p class="mb-1">Estimasi Penangkapan Ikan</p>
                                                        <?php foreach ($berat_ikan as $val) {
                                                            if ($val->berat_total == 0) { ?>
                                                                <h4>0 Kg</h4>
                                                            <?php } else { ?>
                                                                <h4><?= number_format($val->berat_total, 0, ",", ".") ?> Kg</h4>
                                                        <?php }
                                                        } ?>
                                                        <?php foreach ($selisih as $val) {
                                                            $TotalBulanini = $val->TotalBulanIni;
                                                            $TotalBulanLalu = $val->TotalBulanLalu;
                                                            $Beda = $TotalBulanini - $TotalBulanLalu;
                                                            $TotalBulanLalu = $TotalBulanLalu == 0 || $TotalBulanLalu == null || empty($TotalBulanLalu) ? 1 : $TotalBulanLalu;
                                                            $Persentase = ($TotalBulanini / $TotalBulanLalu) * 100;
                                                            if (!empty($TotalBulanini) or (!empty($TotalBulanLalu))) {
                                                                $TotalBulanini == 0 or $TotalBulanLalu == 0 ?>
                                                                <p class="text-muted mb-4">Selisih <?= number_format($Beda, 0, ",", ".") ?> Kg ( <?= number_format($Persentase) ?> % )
                                                                    <?php if (($Beda) >= 0) {
                                                                        echo '<i class="mdi mdi-arrow-up ms-1 text-success"></i>';
                                                                    } else {
                                                                        echo '<i class="mdi mdi-arrow-down ms-1 text-warning"></i>';
                                                                    } ?>
                                                                </p>

                                                                <div class="row g-0">
                                                                    <div class="col-6">
                                                                        <div>
                                                                            <p class="mb-2 text-muted text-uppercase font-size-11">Bulan Ini</p>
                                                                            <b class="fw-medium"><?= number_format($TotalBulanini, 0, ",", ".") ?> Kg</b>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div>
                                                                            <p class="mb-2 text-muted text-uppercase font-size-11">Bulan Lalu</p>
                                                                            <b class="fw-medium"><?= number_format($TotalBulanLalu, 0, ",", ".") ?> Kg</b>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php }
                                                        } ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-xl-4">
                                    <!-- card -->
                                    <div class="card bg-primary text-white shadow-primary card-h-100">
                                        <!-- card body -->
                                        <div class="card-body p-0">
                                            <div id="carouselExampleCaptions" class="carousel slide text-center widget-carousel" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <div class="text-center p-4">
                                                            <i class="mdi mdi-facebook widget-box-1-icon"></i>
                                                            <div class="avatar-md m-auto">
                                                                <span class="avatar-title rounded-circle bg-soft-light text-white font-size-24">
                                                                    <i class="mdi mdi-facebook"></i>
                                                                </span>
                                                            </div>
                                                            <h4 class="mt-3 lh-base fw-normal text-white"><b>Facebook</b> PPS</h4>
                                                            <p class="text-white-50 font-size-13"> Info terbaru tentang Pelabuhan Perikanan Samudera di media
                                                                sosial facebook. </p>
                                                            <button type="button" class="btn btn-light btn-sm"><a href="https://www.facebook.com/people/Ppn-Sibolga/100011255800448/" target="_blank">Lihat detail <i class="mdi mdi-arrow-right ms-1"></i></a></button>
                                                        </div>
                                                    </div>
                                                    <!-- end carousel-item -->
                                                    <div class="carousel-item">
                                                        <a class="twitter-timeline" data-lang="id" data-width="221" data-height="290" data-theme="light" href="https://twitter.com/ppnsibolga1?ref_src=twsrc%5Etfw">Tweets by ppnsibolga</a>
                                                        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                                    </div>
                                                    <!-- end carousel-item -->
													<!-- end carousel-item -->
													<div class="carousel-item">
														<div class="text-center p-4">
															<i class="mdi mdi-youtube widget-box-1-icon"></i>
															<div class="avatar-md m-auto">
																<span class="avatar-title rounded-circle bg-soft-light text-white font-size-24">
																	<i class="mdi mdi-youtube"></i>
																</span>
															</div>
															<h4 class="mt-3 lh-base fw-normal text-white"><b>Youtube</b> PPS</h4>
															<p class="text-white-50 font-size-13"> Info terbaru tentang Pelabuhan Perikanan Samudera di media
																sosial youtube. </p>
															<button type="button" class="btn btn-light btn-sm"><a href="https://www.youtube.com/channel/UCOPYtVQlh4lZj2bbcJn3ayg" target="_blank">Lihat detail <i class="mdi mdi-arrow-right ms-1"></i></a></button>
														</div>
													</div>
													<!-- end carousel-item -->
                                                </div>
                                                <!-- end carousel-inner -->

                                                <div class="carousel-indicators carousel-indicators-rounded">
                                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                </div>
                                                <!-- end carousel-indicators -->
                                            </div>
                                            <!-- end carousel -->
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end col -->
                    </div> <!-- end row-->

                    <div class="row">
                        <div class="col-xl-8">
                            <!-- card -->
                            <div class="card">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center mb-4">
                                        <h5 class="card-title me-2">Kedatangan dan Keberangkatan Kapal Tahun <?php echo date('Y'); ?></h5>
                                        <div class="ms-auto">
                                            <div>
                                                <button type="button" class="btn btn-soft-primary btn-sm">
                                                    ALL
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-xl-12">
                                            <div>
                                                <div id="kapal-overview" data-colors='["#5156be", "#34c38f"]' class="apex-charts"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row-->

                        <div class="col-xl-4">
                            <!-- card -->
                            <div class="card">
                                <!-- card body -->
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center mb-4">
                                        <h5 class="card-title me-2">Posisi Kapal</h5>
                                        <div class="ms-auto">
                                        </div>
                                    </div>

                                    <div id="map" data-colors='["#5156be"]' style="height: 400px"></div>

                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row-->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © SAMOSIR - Sistem Informasi Monitoring dan Aktivitas Kapal Perikanan.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Develop by <a href="https://kendariweb.com" class="text-decoration-underline">Kendariweb</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title d-flex align-items-center p-3">

                <h5 class="m-0 me-2">Theme Customizer</h5>

                <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <!-- Settings -->
            <hr class="m-0" />

            <div class="p-4">
                <h6 class="mb-3">Layout</h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout" id="layout-horizontal" value="horizontal">
                    <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-light" value="light">
                    <label class="form-check-label" for="layout-mode-light">Light</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-mode" id="layout-mode-dark" value="dark">
                    <label class="form-check-label" for="layout-mode-dark">Dark</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-width" id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                    <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-width" id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                    <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-position" id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                    <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-position" id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                    <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                    <label class="form-check-label" for="topbar-color-light">Light</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="topbar-color" id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                    <label class="form-check-label" for="topbar-color-dark">Dark</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                    <label class="form-check-label" for="sidebar-size-default">Default</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                    <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-size" id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                    <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                    <label class="form-check-label" for="sidebar-color-light">Light</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                    <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                </div>
                <div class="form-check sidebar-setting">
                    <input class="form-check-input" type="radio" name="sidebar-color" id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                    <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                </div>

                <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-ltr" value="ltr">
                    <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layout-direction" id="layout-direction-rtl" value="rtl">
                    <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                </div>

            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <!-- pace js -->
    <script src="assets/libs/pace-js/pace.min.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Plugins js-->
    <script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
    <!-- dashboard init -->
    <script src="assets/js/pages/dashboard.init.js"></script>

    <script src="assets/js/app.js"></script>
    <script>
        // Total Ikan Bulan ini dan Bulan Lalu
        var radialchartColors = getChartColorsArray("#total-ikan-overview");
        var options = {
            chart: {
                height: 270,
                type: 'radialBar',
                offsetY: -10
            },
            plotOptions: {
                radialBar: {
                    startAngle: -130,
                    endAngle: 130,
                    dataLabels: {
                        name: {
                            show: false
                        },
                        value: {
                            offsetY: 10,
                            fontSize: '18px',
                            color: undefined,
                            formatter: function(val) {
                                return val + "%";
                            }
                        }
                    }
                }
            },
            colors: [radialchartColors[0]],
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    type: 'horizontal',
                    gradientToColors: [radialchartColors[1]],
                    shadeIntensity: 0.15,
                    inverseColors: false,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [20, 60]
                },
            },
            stroke: {
                dashArray: 4,
            },
            legend: {
                show: false
            },
            <?php foreach ($selisih as $val) {
                $TotalBulanini = $val->TotalBulanIni;
                $TotalBulanLalu = $val->TotalBulanLalu;
                $TotalBulanLalu = $TotalBulanLalu == 0 || $TotalBulanLalu == null || empty($TotalBulanLalu) ? 1 : $TotalBulanLalu;
                $Persentase = ($TotalBulanini / $TotalBulanLalu) * 100; ?>
                series: [<?= number_format($Persentase, 0, ",", ".") ?>],
                labels: ['Series A'],
            <?php } ?>
        }

        var chart = new ApexCharts(
            document.querySelector("#total-ikan-overview"),
            options
        );

        chart.render();

        // Total Ikan
        var piechartColors = getChartColorsArray("#total-ikan");
        var options = {
            series: <?php echo json_encode($bulanan); ?>,
            chart: {
                width: 227,
                height: 227,
                type: 'donut',
            },
            labels: <?php echo json_encode($nama_bulanan); ?>,
            colors: piechartColors,
            stroke: {
                width: 0,
            },
            legend: {
                show: false
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#total-ikan"), options);
        chart.render();

        //	

        // Kapal Overview
        //
        var barchartColors = getChartColorsArray("#kapal-overview");
        var options = {
            series: [{
                name: 'Kedatangan',
                data: <?php echo json_encode($kedatangan); ?>
            }, {
                name: 'Keberangkatan',
                data: <?php echo json_encode($keberangkatan); ?>
            }],
            chart: {
                type: 'bar',
                height: 400,
                toolbar: {
                    show: false
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            colors: barchartColors,
            fill: {
                opacity: 1
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: true,
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return Math.floor(val) + ' Kapal'
                    }
                }
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            }
        };

        var chart = new ApexCharts(document.querySelector("#kapal-overview"), options);
        chart.render();
    </script>

    <script>
        var kapalIcon = L.icon({
            iconUrl: '/images/kapal.png',

            iconSize: [25, 30], // size of the icon
            shadowSize: [50, 64], // size of the shadow
            shadowAnchor: [4, 62], // the same for the shadow
        });
        // my json data
        var data = [
            <?php foreach ($posisi2 as $row) : ?> {
                    "name": "<?= $row['nama']; ?>",
                    "lat": "<?= $row['lat']; ?>",
                    "long": "<?= $row['long']; ?>",
                    "popupContent": "<?= $row['nama_kapal']; ?> - <?= $row['status']; ?>"
                },
            <?php endforeach; ?>
        ]



        var groupedData = _.groupBy(data, "name"); // Depends on how you identify identical items


        //init leaflet  map
        var map = new L.Map('map');

        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; PPN Sibolga',
            maxZoom: 18
        }).addTo(map);
        var sibolga = new L.LatLng(1.724178, 98.790000);
        map.setView(sibolga, 15);



        //iterate my json data and create markers with popups
        for (let key in groupedData) {
            var items = groupedData[key];

            for (var i = 0; i < data.length; i++) {
                // Coordinates of first item, all items of this group are supposed to be on same place
                var latLng = [items[0].lat, items[0].long];
                var kapal = items.map(item => item.popupContent);
                // Merge all popup contents
                //var name = data.filter(name)
                var popupContent = '<b>' + items[0].name + '</b>' + '<br/>' + kapal
                    .join("<br/>")
                L.marker(latLng, {
                    icon: kapalIcon
                }).bindPopup(popupContent).addTo(map)
            }
        }
    </script>

</body>

</html>