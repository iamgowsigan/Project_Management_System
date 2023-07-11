<?php
	session_start();
	include('includes/config.php');
	error_reporting(0);
	include 'includes/language.php';
	
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		
	?>
	<!DOCTYPE html>
	<html lang="en">
		
		<head>
			<?php include 'includes/head.php';?>
			
		</head>	
		<body class="loading" data-layout-config='{"leftSideBarTheme":"<?=$menumode;?>","layoutBoxed":false, "leftSidebarCondensed":<?=$iconmode;?>, "leftSidebarScrollable":false,"darkMode":<?=$bodymode;?>, "showRightSidebarOnStart": false}'>
			<div class="wrapper">		
				<?php include 'includes/top-navigation.php';?>
				<div class="content-page">
					<div class="content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<div class="page-title-box">
										<div class="page-title-right">
											<ol class="breadcrumb m-0">
												<li class="breadcrumb-item"><a href="javascript: void(0);"><?=$projectname;?></a></li>
												<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
												<li class="breadcrumb-item active"><?=$projectname;?></li>
											</ol>
										</div>
										<h4 class="page-title">INSIGHTS</h4>
									</div>
								</div>
							</div>     
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
								
								
								<div class="col-12">
									<div class="card widget-inline">
										<div class="card-body p-0">
											<div class="row no-gutters">
												<div class="col-sm-6 col-xl-3">
													<div class="card shadow-none m-0">
														<div class="card-body text-center">
															<i class="mdi mdi-account-supervisor text-primary" style="font-size: 24px;"></i>
															<h3><span>dvd</span></h3>
															<p class="text-muted font-15 mb-0">Total Students</p>
														</div>
													</div>
												</div>
												
												<div class="col-sm-6 col-xl-2">
													<div class="card shadow-none m-0 border-left">
														<div class="card-body text-center">
															<i class="mdi mdi-cards-club text-primary" style="font-size: 24px;"></i>
															<h3><span>df</span></h3>
															<p class="text-muted font-15 mb-0">Total Department</p>
														</div>
													</div>
												</div>
												
												<div class="col-sm-6 col-xl-2">
													<div class="card shadow-none m-0 border-left">
														<div class="card-body text-center">
															<i class=" mdi mdi-school text-primary" style="font-size: 24px;"></i>
															<h3><span>dfvd</span></h3>
															<p class="text-muted font-15 mb-0">Total Faculties</p>
														</div>
													</div>
												</div>
												
												<div class="col-sm-6 col-xl-2">
													<div class="card shadow-none m-0 border-left">
														<div class="card-body text-center">
															<i class="uil uil-briefcase text-primary" style="font-size: 24px;"></i>
															<h3><span>dfbd</span> </h3>
															<p class="text-muted font-15 mb-0">Total Projects</p>
														</div>
													</div>
												</div>
												
												<div class="col-sm-6 col-xl-3">
													<div class="card shadow-none m-0 border-left">
														<div class="card-body text-center">
															<i class="mdi mdi-account-group text-primary" style="font-size: 24px;"></i>
															<h3><span>fd</span> </h3>
															<p class="text-muted font-15 mb-0">Total SIG</p>
														</div>
													</div>
												</div>
												
												
											</div> <!-- end row -->
										</div>
									</div> <!-- end card-box-->
								</div> <!-- end col-->
								
								<div class="col-xl-4 col-lg-6">
									
									<div class="card">
										<div class="card-body">
											
											<!-- <div class="dropdown float-right">
												<a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
												
                                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
												
                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
												
                                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
												
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
												</div>
											</div>-->
											
											<h4 class="header-title">PROJECT STATUS</h4>
											
										  <div id="project-status" class="apex-charts mb-4 mt-4"
                                            data-colors="#0acf97,#fa5c7c,#ffbc00" data-success=<?=$projectsuccess;?> data-pending=<?=$projectpending;?> data-process=<?=$projectprocess;?> ></div>
                                       

											
											<div class="chart-widget-list">
												<p>
													<i class="mdi mdi-square text-success"></i> Completed 
													<span class="float-right"><?=$projectsuccess;?></span>
												</p>
												
												<p>
													<i class="mdi mdi-square text-danger"></i> On Process
													<span class="float-right"> <?=$projectprocess;?></span>
												</p> 
												<p>
													<i class="mdi mdi-square text-warning"></i> Behind
													<span class="float-right"> <?=$projectpending;?></span>
												</p> 
												
											</div>
										</div> <!-- end card-body-->
									</div> <!-- end card-->
								</div> <!-- end col-->
								<!-- end col -->  
								
								
								
							</div> <!-- container End-->
						</div> 
						<!-- Footer Start -->
						<?php include 'includes/footer.php';?>
					</div>
				</div>
				
				
				<!-- Right Sidebar -->
				<?php include 'includes/right-bar.php';?>
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
				<?php include 'dashboard-chart.php';?>
				
				<script>
					
					var success = $('#project-status').data('success');
					var pending = $('#project-status').data('pending');
					var process = $('#project-status').data('process');
					
					
				!function(o){"use strict";function e(){this.$body=o("body"),this.charts=[]}e.prototype.initCharts=function(){window.Apex={chart:{parentHeightOffset:0,toolbar:{show:!1}},grid:{padding:{left:0,right:0}},colors:["#0acf97","#FFBC00","#fa5c7c"]};var e=["#0acf97","#FFBC00","#fa5c7c"];(r=o("#revenue-chart").data("colors"))&&(e=r.split(","));var t={chart:{height:364,type:"line",dropShadow:{enabled:!0,opacity:.2,blur:7,left:-7,top:7}},dataLabels:{enabled:!1},stroke:{curve:"smooth",width:4},series:[{name:"Current Week",data:[10,20,15,25,20,30,20]},{name:"Previous Week",data:[0,15,10,30,15,35,25]}],colors:e,zoom:{enabled:!1},legend:{show:!1},xaxis:{type:"string",categories:["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],tooltip:{enabled:!1},axisBorder:{show:!1}},yaxis:{labels:{formatter:function(e){return e+"k"},offsetX:-15}}};new ApexCharts(document.querySelector("#revenue-chart"),t).render();e=["#FFBC00","#e3eaef"];(r=o("#high-performing-product").data("colors"))&&(e=r.split(","));t={chart:{height:255,type:"bar",stacked:!0},plotOptions:{bar:{horizontal:!1,columnWidth:"20%"}},dataLabels:{enabled:!1},stroke:{show:!0,width:2,colors:["transparent"]},series:[{name:"Actual",data:[65,59,80,81,56,89,40,32,65,59,80,81]},{name:"Projection",data:[89,40,32,65,59,80,81,56,89,40,65,59]}],zoom:{enabled:!1},legend:{show:!1},colors:e,xaxis:{categories:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],axisBorder:{show:!1}},yaxis:{labels:{formatter:function(e){return e+"k"},offsetX:-15}},fill:{opacity:1},tooltip:{y:{formatter:function(e){return"$"+e+"k"}}}};new ApexCharts(document.querySelector("#high-performing-product"),t).render();var r;e=["#0acf97","#FFBC00","#fa5c7c"];(r=o("#project-status").data("colors"))&&(e=r.split(","));t={chart:{height:213,type:"donut"},legend:{show:!1},stroke:{colors:["transparent"]},series:[success,process,pending],labels:["Success","Process","Pending"],colors:e,responsive:[{breakpoint:480,options:{chart:{width:200},legend:{position:"bottom"}}}]};new ApexCharts(document.querySelector("#project-status"),t).render()},e.prototype.initMaps=function(){0<o("#world-map-markers").length&&o("#world-map-markers").vectorMap({map:"world_mill_en",normalizeFunction:"polynomial",hoverOpacity:.7,hoverColor:!1,regionStyle:{initial:{fill:"#e3eaef"}},markerStyle:{initial:{r:9,fill:"#FFBC00","fill-opacity":.9,stroke:"#fff","stroke-width":7,"stroke-opacity":.4},hover:{stroke:"#fff","fill-opacity":1,"stroke-width":1.5}},backgroundColor:"transparent",markers:[{latLng:[40.71,-74],name:"New York"},{latLng:[37.77,-122.41],name:"San Francisco"},{latLng:[-33.86,151.2],name:"Sydney"},{latLng:[1.3,103.8],name:"Singapore"}],zoomOnScroll:!1})},e.prototype.init=function(){o("#dash-daterange").daterangepicker({singleDatePicker:!0}),this.initCharts(),this.initMaps()},o.Dashboard=new e,o.Dashboard.Constructor=e}(window.jQuery),function(t){"use strict";t(document).ready(function(e){t.Dashboard.init()})}(window.jQuery);</script>
				
				
				<!-- end demo js-->
			</body>
		</html>
	<?php } ?>																																																																																																																											