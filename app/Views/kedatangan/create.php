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
                                        <li class="breadcrumb-item"><a href="<?= base_url('/kedatangan') ?>">Jadwal</a></li>
                                        <li class="breadcrumb-item active">Tambah Kedatangan</li>
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
                                    <h4 class="card-title">Tambah Data Kedatangan</h4>
                                    <p class="card-title-desc">Gunakan Form ini untuk menambah data kedatangan.</p>
                                </div>
                                <div class="card-body p-4">

                                    <div class="row">
                                        <form action="<?= base_url('kedatangan/store') ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                                <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                                                    <i class="mdi mdi-block-helper me-3 align-middle"></i><strong>Periksa Kembali Form Entri Anda</strong></hr /> <?php echo session()->getFlashdata('error'); ?>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            <?php endif; ?>
                                            <div class="col-lg-12 ms-lg-auto">
                                                <div class="mt-4 mt-lg-0">
                                                    <div class="row mb-4">
                                                        <label for="nama-kapal" class="col-sm-3 col-form-label">Nama Kapal</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="id_kapal" id="id_kapal" data-trigger>
                                                                <option value="">- Pilih Kapal -</option>
                                                                <?php foreach ($kapal as $row) : ?>
                                                                    <option value="<?php echo $row->id; ?>"><?php echo $row->nama_kapal; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="asal" class="col-sm-3 col-form-label">Asal</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="asal" name="asal" value="<?= old('asal'); ?>">
                                                            <input type="hidden" id="approve_by" name="approve_by" value="<?= session()->get('name'); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                                                        <div class="col-sm-2">
                                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= old('tanggal'); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="jam" class="col-sm-3 col-form-label">Jam</label>
                                                        <div class="col-sm-2">
                                                            <input type="time" class="form-control" id="jam" name="jam" value="<?= old('jam'); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="dermaga" class="col-sm-3 col-form-label">Dermaga</label>
                                                        <div class="col-sm-4">
                                                            <select class="form-control" name="dermaga" id="dermaga" data-trigger>
                                                                <option value="">- Pilih Dermaga -</option>
                                                                <?php foreach ($dermaga as $row) : ?>
                                                                    <option value="<?php echo $row->id_tangkahan; ?>"><?php echo $row->nama; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-header">
                                                <h4 class="card-title">Ikan Hasil Tangkapan</h4>
                                            </div>
                                            </hr>
                                            <table class="ml-10 mt-4" style="width: 100%;">
                                                <tr>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Jenis Ikan</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="jenis_ikan1" id="jenis_ikan1" data-trigger>
                                                                    <option value="">- Pilih Jenis Ikan -</option>
                                                                    <?php foreach ($ikan as $row) : ?>
                                                                        <option value="<?php echo $row->id_ikan; ?>"><?php echo $row->nama_ikan; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Berat Ikan</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="berat_ikan1" name="berat_ikan1">
                                                                    <div class="input-group-text">Kg</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Jenis Ikan</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="jenis_ikan2" id="jenis_ikan2" data-trigger>
                                                                    <option value="">- Pilih Jenis Ikan -</option>
                                                                    <?php foreach ($ikan as $row) : ?>
                                                                        <option value="<?php echo $row->id_ikan; ?>"><?php echo $row->nama_ikan; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Berat Ikan</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="berat_ikan2" name="berat_ikan2">
                                                                    <div class="input-group-text">Kg</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Jenis Ikan</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="jenis_ikan3" id="jenis_ikan3" data-trigger>
                                                                    <option value="">- Pilih Jenis Ikan -</option>
                                                                    <?php foreach ($ikan as $row) : ?>
                                                                        <option value="<?php echo $row->id_ikan; ?>"><?php echo $row->nama_ikan; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Berat Ikan</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="berat_ikan3" name="berat_ikan3">
                                                                    <div class="input-group-text">Kg</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Jenis Ikan</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="jenis_ikan4" id="jenis_ikan4" data-trigger>
                                                                    <option value="">- Pilih Jenis Ikan -</option>
                                                                    <?php foreach ($ikan as $row) : ?>
                                                                        <option value="<?php echo $row->id_ikan; ?>"><?php echo $row->nama_ikan; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Berat Ikan</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="berat_ikan4" name="berat_ikan4">
                                                                    <div class="input-group-text">Kg</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Jenis Ikan</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="jenis_ikan5" id="jenis_ikan5" data-trigger>
                                                                    <option value="">- Pilih Jenis Ikan -</option>
                                                                    <?php foreach ($ikan as $row) : ?>
                                                                        <option value="<?php echo $row->id_ikan; ?>"><?php echo $row->nama_ikan; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Berat Ikan</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="berat_ikan5" name="berat_ikan5">
                                                                    <div class="input-group-text">Kg</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Jenis Ikan</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-control" name="jenis_ikan6" id="jenis_ikan6" data-trigger>
                                                                    <option value="">- Pilih Jenis Ikan -</option>
                                                                    <?php foreach ($ikan as $row) : ?>
                                                                        <option value="<?php echo $row->id_ikan; ?>"><?php echo $row->nama_ikan; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row mb-4">
                                                            <label for="tipe-kapal" class="col-sm-3 col-form-label">Berat Ikan</label>
                                                            <div class="col-sm-4">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" id="berat_ikan6" name="berat_ikan6">
                                                                    <div class="input-group-text">Kg</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                            </table>

                                            <hr class="mt-4 mb-4">
                                            <div class="row mb-4 mt-4">
                                                <label for="asal" class="col-sm-3 col-form-label">Suhu Ikan</label>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="suhu_ikan" name="suhu_ikan">
                                                        <div class="input-group-text">°C</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="asal" class="col-sm-3 col-form-label">Suhu Palka</label>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="suhu_palka" name="suhu_palka">
                                                        <div class="input-group-text">°C</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="asal" class="col-sm-3 col-form-label">Jumlah Sampah</label>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="sampah" name="sampah">
                                                        <div class="input-group-text">Kg</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="asal" class="col-sm-3 col-form-label">Harga Rata-rata</label>
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <div class="input-group-text">Rp</div>
                                                        <input type="number" class="form-control" id="harga_rata" name="harga_rata">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="mutu" class="col-sm-3 col-form-label">Mutu</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name="mutu" id="mutu" data-trigger>
                                                        <option value="">- Pilih Mutu -</option>
                                                        <option value="I">I</option>
                                                        <option value="II">II</option>
                                                        <option value="III">III</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="produk" class="col-sm-3 col-form-label">Produk</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name="produk" id="produk" data-trigger>
                                                        <option value="">- Pilih Produk -</option>
                                                        <option value="SEGAR">SEGAR</option>
                                                        <option value="BEKU">BEKU</option>
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
                                                        <option value="MENGISI PERBEKALAN">MENGISI PERBEKALAN</option>
                                                    </select>
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
        var tileLayer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        var map = new L.Map('latlongmap', {
            'center': [1.7208, 98.7970],
            'zoom': 15,
            'layers': [tileLayer]
        });

        var marker = L.marker([1.7208, 98.7970], {
            draggable: true
        }).addTo(map);

        marker.on('dragend', function(e) {
            document.getElementById('lat').value = marker.getLatLng().lat;
            document.getElementById('long').value = marker.getLatLng().lng;
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
    <!-- Sweet Alerts js -->
    <script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>

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