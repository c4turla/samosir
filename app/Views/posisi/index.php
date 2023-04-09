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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Posisi</a></li>
                                        <li class="breadcrumb-item active">Kapal</li>
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
                                                <h5 class="card-title">Posisi Kapal di PPN Sibolga</h5>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="map"></div>
                                    <!-- end row -->

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



    <!-- JAVASCRIPT -->
  
   <!-- <script>
        // Creating map options
        var kapalIcon = L.icon({
            iconUrl: '/images/kapal.png',

            iconSize: [25, 30], // size of the icon
            shadowSize: [50, 64], // size of the shadow
            shadowAnchor: [4, 62], // the same for the shadow
        });
        var locations = [
            <?php foreach ($posisi as $row) : ?>
            ["<?= $row['nama']; ?>","<?= $row['nama_kapal']; ?>", <?= $row['lat']; ?>, <?= $row['long']; ?>, "<?= $row['status']; ?>"],
            <?php endforeach; ?>
        ];
        var mapOptions = {
            center: [1.724178, 98.790000],
            zoom: 16
        }
        var map = new L.map('map', mapOptions); // Creating a map object

        mapLink =
            '<a href="http://kendariweb.com">PPN Sibolga</a>';
        L.tileLayer(
            'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; ' + mapLink + '.',
                maxZoom: 18,
            }).addTo(map);

        for (var i = 0; i < locations.length; i++) {
            marker = new L.marker([locations[i][2], locations[i][3]], {icon: kapalIcon})
                .bindPopup('<b>'+ locations[i][0] +'</b>'+'<br/>'+ locations[i][1] + '&nbsp;-&nbsp;' + locations[i][4])
                .addTo(map);

        }
    </script> -->


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
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>
</html>