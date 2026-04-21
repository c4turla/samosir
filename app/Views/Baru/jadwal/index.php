<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>JADWAL KAPAL PELABUHAN PERINAKANAN NUSANTARA SIBOLGA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistem Infromasi dan Monitoring Aktivitas Kapal Perikanan" name="description" />
    <meta content="Kendariweb" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">

    <!-- flatpickr css -->
    <link href="<?= base_url('assets/libs/flatpickr/flatpickr.min.css') ?>" rel="stylesheet" type="text/css">



    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        body {
            background: url(assets/images/background.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        /*         .card {
            margin-right: auto;
            margin-left: auto;
            box-shadow: 0 15px 25px rgba(129, 124, 124, 0.2);
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.2);
        } */
    </style>
    <script type="text/JavaScript" src="https://MomentJS.com/downloads/moment-with-locales.js"></script>
    <script type="text/JavaScript">
        <!--
            function AutoRefresh( t ) {
               setTimeout("location.reload(true);", t);
            }
         //-->
    </script>
    <link rel="stylesheet" href=" http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
    <script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
    <script src="https://unpkg.com/lodash@4.17.21/lodash.js"></script>
    <style>
        #map {
            width: 100%;
            height: 580px;
            margin: 0;
            padding: 0;
        }

        .get-markers {
            width: 100%;
            margin: 10px 0;
        }
    </style>


</head>

<body onload="JavaScript:AutoRefresh(5000);" data-topbar="dark">

    <!-- <body data-layout="horizontal"> -->

    <!-- Begin page -->


    <header id="page-topbar">
        <div class="row">

            <div class="navbar-header navbar-expand-sm bg-primary navbar-dark">
                <div class="col-xs-1 hidden-sm hidden-xs"></div>
                <div class="col-lg-12 col-xs-11 col-sm-12">
                    <div class="container-fluid">
                        <div class="d-flex">
                            <div class="ml-400">
                                <a href="/" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="assets/images/logo-head.png" alt="" height="36">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="assets/images/logo-head.png" alt="" height="36">
                                        <span class="logo-txt" style="color: white;"> SISTEM INFORMASI DAN MONITORING AKTIVITAS KAPAL PERIKANAN (SAMOSIR) - PPN SIBOLGA</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="page-content">
        <div class="container-fluid">


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Jadwal Kapal PPN Sibolga Tanggal : <b id="datedisplay"></b></h4>
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
                                        <h5 class="card-title">Data Kedatangan</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="table-responsive" style="background-color:rgba(0, 0, 0, 0);">
                                <table class="table align-middle  dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                    <thead>
                                        <tr class="bg-transparent">
                                            <th style="width: 30px;">
                                                <div class="form-check font-size-16">
                                                    <input type="checkbox" name="check" class="form-check-input" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>Nama Kapal</th>
                                            <th>Asal</th>
                                            <th>Tanggal/Jam</th>
                                            <th>Durasi Waktu</th>
                                            <th>Dermaga</th>
                                            <th>Ikan Dominan</th>
                                            <th>Status</th>
                                            <th>Produk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $key = 1;
                                        foreach ($kedatangan as $key => $kedatangan) :
                                            date_default_timezone_set("Asia/Jakarta");
                                            $mulai =  strtotime('' . $kedatangan->tanggal . '' . $kedatangan->jam . '');
                                            $akhir = time();
                                            $diff = $akhir - $mulai;
                                            //membagi detik menjadi jam
                                            $jam   = floor($diff / (60 * 60));
                                            $menit = $diff - ($jam * (60 * 60));
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= ++$key ?>
                                                </td>

                                                <td><a href="javascript: void(0);" class="text-dark fw-medium"><?= $kedatangan->nama_kapal ?></a> </td>
                                                <td>
                                                    <?= $kedatangan->asal ?>
                                                </td>
                                                <td><?= $kedatangan->tanggal ?> <?= $kedatangan->jam ?></td>
                                                <td>
                                                    <?php echo '' . $jam .  ' Jam ' . floor($menit / 60) . ' Menit '  ?> </td>
                                                <td>
                                                    <?= $kedatangan->nama ?>
                                                </td>
                                                <td>
                                                    <?= $kedatangan->nama_ikan ?>
                                                </td>
                                                <td>
                                                    <?php if ($kedatangan->status == 'TAMBAT' || $kedatangan->status == 'LABUH') {
                                                        echo '<div class="badge badge-soft-warning font-size-12">' . $kedatangan->status . '</div>';
                                                    } elseif ($kedatangan->status == 'PERBAIKAN') {
                                                        echo '<div class="badge badge-soft-danger font-size-12">' . $kedatangan->status . '</div>';
                                                    } else {
                                                        echo '<div class="badge badge-soft-success font-size-12">' . $kedatangan->status . '</div>';
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?= $kedatangan->produk ?>
                                                </td>
                                            </tr>
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-4">
                                        <h5 class="card-title">Data Keberangkatan</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="table-responsive">
                                <table class="table align-middle  dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                    <thead>
                                        <tr class="bg-transparent">
                                            <th style="width: 30px;">
                                                <div class="form-check font-size-16">
                                                    <input type="checkbox" name="check" class="form-check-input" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>Nama Kapal</th>
                                            <th>Tujuan</th>
                                            <th>Tanggal/Jam</th>
                                            <th>Dermaga</th>
                                            <th>ABK</th>
                                            <th>Status</th>
                                            <th>Approval</th>
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
                                            </tr>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-4">
                                        <h5 class="card-title">Posisi Kapal</h5>
                                    </div>
                                </div>
                            </div>

                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <p style="text-align: center;">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Pelabuhan Perikanan Nusantara Sibolga. Dibuat Oleh Kendariweb.com
                </p>
            </div>
        </div>
    </div>

    </div>
    <!-- end main content-->

    <script>
    var kapalIcon = L.icon({
            iconUrl: '/images/kapal.png',

            iconSize: [25, 30], // size of the icon
            shadowSize: [50, 64], // size of the shadow
            shadowAnchor: [4, 62], // the same for the shadow
        });
     // my json data
     var data = [
        <?php foreach ($posisi as $row) : ?>
        {
          "name" : "<?= $row['nama']; ?>",
          "lat" :"<?= $row['lat']; ?>",
          "long" : "<?= $row['long']; ?>",
          "popupContent" : "<?= $row['nama_kapal']; ?> - <?= $row['status']; ?>"
        },
        <?php endforeach; ?>
     ]



     var groupedData = _.groupBy(data, "name"); // Depends on how you identify identical items


     //init leaflet  map
     var map = new L.Map('map');                       
            
     L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors',
        maxZoom: 18
     }).addTo(map);
     var sibolga = new L.LatLng(1.724178, 98.790000); 
     map.setView(sibolga, 16);



     //iterate my json data and create markers with popups
     for(let key in groupedData){
       var items = groupedData[key];

       for (var i = 0; i < data.length; i++) {
       // Coordinates of first item, all items of this group are supposed to be on same place
       var latLng = [items[0].lat, items[0].long];
       var kapal = items.map(item => item.popupContent) ;
       // Merge all popup contents
       //var name = data.filter(name)
       var popupContent = '<b>'+ items[0].name +'</b>'+'<br/>'+ kapal
       .join("<br/>") 
       L.marker(latLng, {icon: kapalIcon}).bindPopup(popupContent).addTo(map)
       }
     }
     </script>

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/metismenu/metisMenu.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/node-waves/waves.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/feather-icons/feather.min.js') ?>"></script>

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
    <script type="text/JavaScript">
        var a = moment.locale("id");
        var c = moment().format("LLLL");
         document.getElementById("datedisplay").innerHTML = c;
        
        
        var start = '12:40:00';
        var end = moment().format("HH:mm:ss");
        var duration = moment.duration(moment(end).diff(end));
        let f = duration.asMinutes();
        console.log(f)
      </script>


</body>

</html>