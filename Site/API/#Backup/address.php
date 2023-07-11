<?php
	session_start();
	include('includes/config.php');
	//error_reporting(0);
	include 'includes/language.php';
	include 'includes/dbhelp.php';
	include 'includes/formdata.php';
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		
		$sid=$_SESSION['sid'];
		$sname=$_SESSION['sname'];
		
		//delete
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$res=Deletedata("delete from address WHERE a_id=$id");
			header("location: ".$_SERVER['PHP_SELF']);
			$msg = "Deleted";
		}
		
		//Screen Operations
		$edit=0;
		$eid='';
		if ($_GET['edit'] == 1) {
			$edit=1;
			$eid=intval($_GET['eid']);
		}
		
		if ($_GET['edit'] == 0) {
			$edit=0;
		}
		
	?>
	<!DOCTYPE html>
	<html lang="en">
		
		<head>
			<?php include 'includes/head.php';?>
			<link href="assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
			<link href="assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
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
												<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
												<li class="breadcrumb-item active">Management</li>
											</ol>
										</div>
										<h4 class="page-title"><?=$sname;?> User Address</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								<!--LIST VIEW-->
								<?php if($edit==0){ ?> 
									
									<a href="view-user.php" class="btn btn-primary m-2" ><?php mylan("Back ","خلف "); ?></a>
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<table data-order='[[ 0, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
													<thead>
														<tr>
															<th><?php mylan("ID ","ID "); ?></th>
															<th><?php mylan("Name ","اسم"); ?></th>
															<th><?php mylan("Address "," عنوان"); ?></th> 
															<th><?php mylan("Action ","عمل "); ?></th>
														</tr>
													</thead>
													<tbody>
														<?php
															
															$listdata=Selectdata("SELECT * from address WHERE u_id=$sid");
															
															if (sizeof($listdata) == 0) {
															?>
															<tr>
																<td colspan="7" align="center">
																	<h3 style="color:black"><?php mylan("No record found ","لا يوجد سجلات "); ?></h3>
																</td>
																<tr>
																	<?php
																		} else {
																		foreach ($listdata as $row) {
																			
																		?>
																		<tr>
																			
																			<td><?php text( $row['a_id'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			<td><?php text( $row['a_name'], $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?>
																				<br>
																				<?php text( $row['a_phone'], $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '',$icon='mdi mdi-cellphone' ); ?>
																				</td>
																			
																			<td><?php text( substr($row['a_address'],0,60), $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '',$icon='mdi mdi-map-marker-down' ); ?>
																				<br><?php text( $row['a_city'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?>
																				<br><?php text( $row['a_country'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?>
																			</td>
																			
																			<td><?php action(  $row['a_id'] ,'D' ); ?></td>
																			
																		</tr>
																	<?php } } ?>
															</tbody>
														</table> 
													</div> <!-- end card-body-->
												</div> <!-- end card-->
											</div> <!-- end col-->		
										<?php  } ?>
										<!--LIST VIEW END-->
										
										
										
										<!-- --------------->							
										<!-- container End-->							
										<!------------------>							
									</div> 
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
						<script src="assets/js/vendor/jquery.dataTables.min.js"></script>
						<script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
						<script src="assets/js/vendor/dataTables.responsive.min.js"></script>
						<script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>
						
						<!-- Datatable Init js -->
						<script src="assets/js/pages/demo.datatable-init.js"></script>
						<!-- end demo js-->
					</body>
				</html>
			<?php } ?>																																																																																																																																																																																																								