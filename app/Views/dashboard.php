<!DOCTYPE html>
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
	<?php
	foreach ($total_ikan as $data) {
		$nama[] = $data->nama_ikan;
		$totalikan[] = (float) $data->total;
	}
	?>

</head>

<body>

	<!-- Begin page -->
	<div id="layout-wrapper">

		<?= $this->include('partial/topbar') ?>

		<?= $this->include('partial/sidebar') ?>

		<!-- ============================================================== -->
		<!-- Start right Content here -->
		<!-- ============================================================== -->
		<div class="main-content">

			<div class="page-content">
				<div class="container-fluid">

					<?= $page_title ?>

					<div class="row">
						<div class="col-xl-3 col-md-6">
							<!-- card -->
							<div class="card card-h-100">
								<!-- card body -->
								<div class="card-body">
									<div class="row align-items-center">
										<div class="col-6">
											<span class="text-muted mb-3 lh-1 d-block text-truncate">Total Kapal Aktif</span>
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
											<span class="text-muted mb-3 lh-1 d-block text-truncate">Total Kapal Expired</span>
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
												<span class="counter-value" data-target="<?php echo $total_kedatangan; ?>">0</span>
											</h4>
										</div>
										<div class="col-6">
											<div id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
										</div>
									</div>
									<div class="text-nowrap">
										<span class="ms-1 text-muted font-size-13">Lihat detail kedatangan</span>
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
												<span class="counter-value" data-target="<?php echo $total_keberangkatan; ?>">0</span>
											</h4>
										</div>
										<div class="col-6">
											<div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
										</div>
									</div>
									<div class="text-nowrap">
										<span class="ms-1 text-muted font-size-13">Lihat detail keberangkatan</span>
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
													Bulan Ini
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
														<p class="mb-2"><i class="mdi mdi-circle align-middle font-size-10 me-2 text-success"></i> <?php echo $val->nama_ikan ?> : <b><?= $val->total ?> Kg</b></p>
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
												<h5 class="card-title me-2">Total Produksi Ikan</h5>
												<div class="ms-auto">
													<div>
														<button type="button" class="btn btn-soft-primary btn-sm">
															Bulan Ini
														</button>
													</div>
												</div>
											</div>

											<div class="row align-items-center">
												<div class="col-sm">
													<div id="total-ikan-overview" data-colors='["#5156be", "#34c38f"]' class="apex-charts"></div>
												</div>
												<div class="col-sm align-self-center">
													<div class="mt-4 mt-sm-0">
														<p class="mb-1">Total Produksi Ikan</p>
														<?php foreach ($berat_ikan as $val) { 
															if($val->berat_total==0){?>
															<h4>0 Kg</h4>
															<?php }else{ ?>
															<h4><?= $val->berat_total ?> Kg</h4>
														<?php } } ?>
														<?php foreach ($selisih as $val) { 
															$TotalBulanini = $val->TotalBulanIni;
															$TotalBulanLalu = $val->TotalBulanLalu;
															if (($TotalBulanini==0) or ($TotalBulanLalu==0)) {
																$TotalBulanini==0 or $TotalBulanLalu==0 ?>
															<p class="text-muted mb-4">Selisih <?= $TotalBulanini - $TotalBulanLalu ?> Kg ( <?= number_format(($TotalBulanini / $TotalBulanLalu) * 100) ?> % )
																<?php if (($TotalBulanini - $TotalBulanLalu) >= 0) {
																	echo '<i class="mdi mdi-arrow-up ms-1 text-success"></i>';
																} else {
																	echo '<i class="mdi mdi-arrow-down ms-1 text-warning"></i>';
																} ?>
															</p>

															<div class="row g-0">
																<div class="col-6">
																	<div>
																		<p class="mb-2 text-muted text-uppercase font-size-11">Bulan Ini</p>
																		<h5 class="fw-medium"><?= $TotalBulanini?> Kg</h5>
																	</div>
																</div>
																<div class="col-6">
																	<div>
																		<p class="mb-2 text-muted text-uppercase font-size-11">Bulan Lalu</p>
																		<h5 class="fw-medium"><?= $TotalBulanLalu ?> Kg</h5>
																	</div>
																</div>
															</div>
														<?php } } ?>

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
														<div class="text-center p-4">
															<i class="mdi mdi-twitter widget-box-1-icon"></i>
															<div class="avatar-md m-auto">
																<span class="avatar-title rounded-circle bg-soft-light text-white font-size-24">
																	<i class="mdi mdi-twitter"></i>
																</span>
															</div>
															<h4 class="mt-3 lh-base fw-normal text-white"><b>Twitter</b> PPS</h4>
															<p class="text-white-50 font-size-13"> Info terbaru tentang Pelabuhan Perikanan Samudera di media
																sosial twitter. </p>
															<button type="button" class="btn btn-light btn-sm"><a href="https://twitter.com/ppnsibolga1" target="_blank">Lihat detail<i class="mdi mdi-arrow-right ms-1"></i></a></button>
														</div>
													</div>
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
							</div>
							<!-- end row -->
						</div>
						<!-- end col -->
					</div> <!-- end row-->

					<div class="row">
						<div class="col-xl-12">
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
										<div class="col-xl-8">
											<div>
												<div id="kapal-overview" data-colors='["#5156be", "#34c38f"]' class="apex-charts"></div>
											</div>
										</div>
										<div class="col-xl-4">
											<div class="p-4">
											<?php
											 $key = 1;
											 foreach ($data_kapal as $key => $val) { ?>
												<div class="mt-3">
													<div class="d-flex align-items-center">
														<div class="avatar-sm m-auto">
															<span class="avatar-title rounded-circle bg-soft-light text-dark font-size-16">
															<?= ++$key ?>
															</span>
														</div>
														<div class="flex-grow-1 ms-3">
															<span class="font-size-16"><?= $val->nama_kapal ?></span>
														</div>

														<div class="flex-shrink-0">
															<span class="badge rounded-pill badge-soft-success font-size-12 fw-medium">+2.5%</span>
														</div>
													</div>
												</div>
												<?php } ?>

												<div class="mt-4 pt-2">
													<a href="" class="btn btn-primary w-100">Lihat Semua Kapal <i class="mdi mdi-arrow-right ms-1"></i></a>
												</div>

											</div>
										</div>
									</div>
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row-->


						<!-- end col -->
					</div>
					<!-- end row-->
				</div>
				<!-- container-fluid -->
			</div>
			<!-- End Page-content -->

			<?= $this->include('partial/footer') ?>
		</div>
		<!-- end main content-->

	</div>
	<!-- END layout-wrapper -->

	<?= $this->include('partial/right-sidebar') ?>

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

	<!-- App js -->
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
			<?php foreach ($selisih as $val) { ?>
			series: [<?= number_format(($val->TotalBulanIni / $val->TotalBulanLalu) * 100) ?>],
			labels: ['Series A'],
			<?php } ?>
		}

		var chart = new ApexCharts(
			document.querySelector("#total-ikan-overview"),
			options
		);

		chart.render();

		// Total Ikan
		//
		var piechartColors = getChartColorsArray("#total-ikan");
		var options = {
			series: <?php echo json_encode($bulanan); ?>,
			chart: {
				width: 227,
				height: 227,
				type: 'donut',
			},
			labels:<?php echo json_encode($nama_bulanan); ?>,
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

		// 
	</script>
</body>

</html>