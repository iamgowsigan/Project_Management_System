<?php
	session_start();
	include('includes/config.php');
	error_reporting(0);
	include 'includes/language.php';
	include 'includes/dbhelp.php';
	
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
				<?php include 'includes/left-navigation.php';?>
				<div class="content-page">
					<div class="content">
						<?php include 'includes/top-menu.php';?>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<div class="page-title-box">
										<div class="page-title-right">
											<ol class="breadcrumb m-0">
												<li class="breadcrumb-item"><a href="javascript: void(0);"><?=$projectname;?></a></li>
												<li class="breadcrumb-item"><a href="javascript: void(0);"><?php mylan("Dashboard ","لوحة القيادة "); ?></a></li>
												<li class="breadcrumb-item active"><?=$projectname;?></li>
											</ol>
										</div>
										<h4 class="page-title"><?php mylan("INSIGHTS "," أفكار"); ?></h4>
									</div>
								</div>
							</div>     
							<div class="row"><!-- container Start-->
								
								<?php
									
									$countuser=Countdata("SELECT * from user");
									$countBank=Countdata("SELECT * from bank");	
									$countGenerator=Countdata("SELECT * from generator");
									$countSites=Countdata("SELECT * from sites");
									// $countclubs=Countdata("Select * FROM user WHERE a_name IS NOT NULL AND a_name!=''");
									// $countappmatches=Countdata("SELECT * FROM booking where b_direct_book='0'");
									// $countdirectmatches=Countdata("SELECT * FROM booking where b_direct_book='1'");
									
									// $booking=Selectdata("SELECT booking.*,ground.*,user.* FROM booking JOIN ground ON ground.g_id=booking.g_id  JOIN user ON user.u_id=booking.u_id WHERE ground.u_id ORDER BY b_id DESC LIMIT 5");
									// $court=Selectdata("Select * FROM user WHERE a_name IS NOT NULL AND a_name!='' ORDER BY u_id DESC LIMIT 5");
									// $users=Selectdata("SELECT * from user WHERE  a_name='' OR a_name IS NULL ORDER BY u_id DESC LIMIT 5");
									
									
								?>		
								<div class="col-12">
									<div class="card widget-inline">
										<div class="card-body p-0">
											<div class="row no-gutters">
												<div class="col-sm-6 col-xl-3">
													<div class="card shadow-none m-0">
														<div class="card-body text-center">
															<i class="mdi mdi-account-supervisor text-primary" style="font-size: 24px;"></i>
															<h3><span><?=$countuser?></span></h3>
															<p class="text-muted font-15 mb-0"><?php mylan("Total Users "," إجمالي المستخدمين"); ?></p>
														</div>
													</div>
												</div>
												
												<div class="col-sm-6 col-xl-3">
													<div class="card shadow-none m-0 border-left">
														<div class="card-body text-center">
															<i class="mdi mdi-google-my-business text-primary" style="font-size: 24px;"></i>
															<h3><span><?=$countBank?></span></h3>
															<p class="text-muted font-15 mb-0">Total Bank</p>
														</div>
													</div>
												</div>
												
												<div class="col-sm-6 col-xl-3">
													<div class="card shadow-none m-0 border-left">
														<div class="card-body text-center">
															<i class="mdi mdi-cart-arrow-right text-primary" style="font-size: 24px;"></i>
															<h3><span><?=$countGenerator?></span></h3>
															<p class="text-muted font-15 mb-0">Total Generators</p>
														</div>
													</div>
												</div>
												
												<div class="col-sm-6 col-xl-3">
													<div class="card shadow-none m-0 border-left">
														<div class="card-body text-center">
															<i class="mdi mdi-file-table text-primary" style="font-size: 24px;"></i>
															<h3><span><?=$countSites?></span></h3>
															<p class="text-muted font-15 mb-0">Total Sites</p>
														</div>
													</div>
												</div>
												
											</div> <!-- end row -->
										</div>
									</div> <!-- end card-box-->
								</div> <!-- end col-->
					 <!-- #region -->
								 
										 
												
												
												
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
								
								
								<!-- demo:js -->
								<?php include 'dashboard-chart.php';?>
								
								
								<!-- end demo js-->
							</body>
						</html>
					<?php } ?>																																																																																																																																											