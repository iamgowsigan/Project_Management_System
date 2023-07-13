<?php
session_start();
include('includes/config.php');
error_reporting(0);
include 'includes/language.php';

if (strlen($_SESSION['login']) == 0) {
	header('location:index.php');
} else {

	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php include 'includes/head.php'; ?>

	</head>

	<body class="loading"
		data-layout-config='{"leftSideBarTheme":"<?= $menumode; ?>","layoutBoxed":false, "leftSidebarCondensed":<?= $iconmode; ?>, "leftSidebarScrollable":false,"darkMode":<?= $bodymode; ?>, "showRightSidebarOnStart": false}'>
		<div class="wrapper">
			<?php include 'includes/top-bar.php'; ?>
			<div class="content-page" style=" margin: auto; overflow: hidden; padding: 0px; min-height: 100vh">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<img class="d-block img-fluid" src="assets/images/image1.png" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="assets/images/image1.png" alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="assets/images/image1.png" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<div class="content" style="padding: 0px 25px 25px 25px;">

					<div class="container-fluid">
						<div class="row"><!-- container Start-->

							<?php
							//$countstudent = mysqli_num_rows(mysqli_query($con, "SELECT * from student"));
						
							//$countdept = mysqli_num_rows(mysqli_query($con, "SELECT * from department"));
						
							//$countfaculty = mysqli_num_rows(mysqli_query($con, "SELECT * from faculty"));
						
							//$countprojects = mysqli_num_rows(mysqli_query($con, "SELECT * from projects"));
						
							//$countsig = mysqli_num_rows(mysqli_query($con, "SELECT * from sig"));
						
							//$projectsuccess = mysqli_num_rows(mysqli_query($con, "SELECT * FROM projects WHERE p_status LIKE 'SUC%' ORDER BY p_id"));
						
							//$projectpending = mysqli_num_rows(mysqli_query($con, "SELECT * FROM projects WHERE p_status LIKE 'PEN%' ORDER BY p_id"));
						
							//$projectprocess = mysqli_num_rows(mysqli_query($con, "SELECT * FROM projects WHERE p_status LIKE 'PRO%' ORDER BY p_id"));
						

							?>

							 <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box" style="justify-content: center; align-items: center; display: flex;">
                                    <h3 class="page-title">TOP COURSES</h3>
                                </div>
                            </div>
                        </div>      
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <!-- Simple card -->
                                <div class="card d-block">
                                    <img class="card-img-top" src="assets/images/small/html.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">HTML & CSS</h5>
                                        <p class="card-text">HTML describes the structure of a web page semantically and originally included cues for its appearance.
											 HTML elements are the building blocks of HTML pages.</p>
                                        <a href="javascript: void(0);" class="btn btn-primary">Button</a>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div><!-- end col -->

							 <div class="col-md-6 col-lg-3">
                                <!-- Simple card -->
                                <div class="card d-block">
                                    <img class="card-img-top" src="assets/images/small/java.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">JAVA PROGRAMMING</h5>
                                        <p class="card-text">Java is a multi-platform, object-oriented, and network-centric language
											 that can be used as a platform in itself.</p>
                                        <a href="javascript: void(0);" class="btn btn-primary">Button</a>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div><!-- end col -->

                            <div class="col-md-6 col-lg-3">
                                <!-- Simple card -->
                                <div class="card d-block">
                                    <img class="card-img-top" src="assets/images/small/python.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">PYTHON PROGRAMING</h5>
                                        <p class="card-text">Python is a general-purpose language, meaning it can be used to create a variety of 
											different programs and isn't specialized for any specific problems.</p>
                                        <a href="javascript: void(0);" class="btn btn-primary">Button</a>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div><!-- end col -->

							 <div class="col-md-6 col-lg-3">
                                <!-- Simple card -->
                                <div class="card d-block">
                                    <img class="card-img-top" src="assets/images/small/sql.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">SQL LANGUAGE</h5>
                                        <p class="card-text">A relational database stores information in tabular form, with rows 
											and columns representing different data attributes and the various relationships between the data values.</p>
                                        <a href="javascript: void(0);" class="btn btn-primary">Button</a>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->



						</div> <!-- container End-->
					</div>
					<!-- Footer Start -->
					<?php include 'includes/footer.php'; ?>
				</div>
			</div>


			<!-- Right Sidebar -->
			<?php include 'includes/right-bar.php'; ?>
			<!-- bundle -->
			<script src="assets/js/vendor.min.js"></script>
			<script src="assets/js/app.min.js"></script>

			<!-- Apex js -->
			<script src="assets/js/vendor/apexcharts.min.js"></script>

			<!-- Todo js -->
			<script src="assets/js/ui/component.todo.js"></script>

			<!-- third party js -->
			<script src="assets/js/vendor/Chart.bundle.min.js"></script>
			<!-- third party js ends -->

			<!-- demo app -->
			<script src="assets/js/pages/demo.dashboard-projects.js"></script>
			<!-- end demo js-->

			<!-- demo:js -->
			<?php include 'dashboard-chart.php'; ?>

			<script>

				var success = $('#project-status').data('success');
				var pending = $('#project-status').data('pending');
				var process = $('#project-status').data('process');


				!function (o) { "use strict"; function e() { this.$body = o("body"), this.charts = [] } e.prototype.initCharts = function () { window.Apex = { chart: { parentHeightOffset: 0, toolbar: { show: !1 } }, grid: { padding: { left: 0, right: 0 } }, colors: ["#0acf97", "#FFBC00", "#fa5c7c"] }; var e = ["#0acf97", "#FFBC00", "#fa5c7c"]; (r = o("#revenue-chart").data("colors")) && (e = r.split(",")); var t = { chart: { height: 364, type: "line", dropShadow: { enabled: !0, opacity: .2, blur: 7, left: -7, top: 7 } }, dataLabels: { enabled: !1 }, stroke: { curve: "smooth", width: 4 }, series: [{ name: "Current Week", data: [10, 20, 15, 25, 20, 30, 20] }, { name: "Previous Week", data: [0, 15, 10, 30, 15, 35, 25] }], colors: e, zoom: { enabled: !1 }, legend: { show: !1 }, xaxis: { type: "string", categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"], tooltip: { enabled: !1 }, axisBorder: { show: !1 } }, yaxis: { labels: { formatter: function (e) { return e + "k" }, offsetX: -15 } } }; new ApexCharts(document.querySelector("#revenue-chart"), t).render(); e = ["#FFBC00", "#e3eaef"]; (r = o("#high-performing-product").data("colors")) && (e = r.split(",")); t = { chart: { height: 255, type: "bar", stacked: !0 }, plotOptions: { bar: { horizontal: !1, columnWidth: "20%" } }, dataLabels: { enabled: !1 }, stroke: { show: !0, width: 2, colors: ["transparent"] }, series: [{ name: "Actual", data: [65, 59, 80, 81, 56, 89, 40, 32, 65, 59, 80, 81] }, { name: "Projection", data: [89, 40, 32, 65, 59, 80, 81, 56, 89, 40, 65, 59] }], zoom: { enabled: !1 }, legend: { show: !1 }, colors: e, xaxis: { categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], axisBorder: { show: !1 } }, yaxis: { labels: { formatter: function (e) { return e + "k" }, offsetX: -15 } }, fill: { opacity: 1 }, tooltip: { y: { formatter: function (e) { return "$" + e + "k" } } } }; new ApexCharts(document.querySelector("#high-performing-product"), t).render(); var r; e = ["#0acf97", "#FFBC00", "#fa5c7c"]; (r = o("#project-status").data("colors")) && (e = r.split(",")); t = { chart: { height: 213, type: "donut" }, legend: { show: !1 }, stroke: { colors: ["transparent"] }, series: [success, process, pending], labels: ["Success", "Process", "Pending"], colors: e, responsive: [{ breakpoint: 480, options: { chart: { width: 200 }, legend: { position: "bottom" } } }] }; new ApexCharts(document.querySelector("#project-status"), t).render() }, e.prototype.initMaps = function () { 0 < o("#world-map-markers").length && o("#world-map-markers").vectorMap({ map: "world_mill_en", normalizeFunction: "polynomial", hoverOpacity: .7, hoverColor: !1, regionStyle: { initial: { fill: "#e3eaef" } }, markerStyle: { initial: { r: 9, fill: "#FFBC00", "fill-opacity": .9, stroke: "#fff", "stroke-width": 7, "stroke-opacity": .4 }, hover: { stroke: "#fff", "fill-opacity": 1, "stroke-width": 1.5 } }, backgroundColor: "transparent", markers: [{ latLng: [40.71, -74], name: "New York" }, { latLng: [37.77, -122.41], name: "San Francisco" }, { latLng: [-33.86, 151.2], name: "Sydney" }, { latLng: [1.3, 103.8], name: "Singapore" }], zoomOnScroll: !1 }) }, e.prototype.init = function () { o("#dash-daterange").daterangepicker({ singleDatePicker: !0 }), this.initCharts(), this.initMaps() }, o.Dashboard = new e, o.Dashboard.Constructor = e }(window.jQuery), function (t) { "use strict"; t(document).ready(function (e) { t.Dashboard.init() }) }(window.jQuery);</script>


			<!-- end demo js-->
	</body>

	</html>
<?php } ?>