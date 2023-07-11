<?php
	session_start();
	include('includes/config.php');
	//error_reporting(0);
	include 'includes/language.php';
	include 'includes/dbhelp.php';
	include 'includes/formdata.php';
	include 'includes/country.php';
	if (strlen($_SESSION['login']) == 0) {
		header('location:index.php');
		} else {
		
		
		
		//ADD
		if (isset($_POST['searchh'])) {
			

			$bid=$_POST['bid'];
			$cid=$_POST['cid'];
			echo "<script>window.location.href='" . $_SERVER['PHP_SELF'] . "?bid=" . $bid .  "&cid=" . $cid ."';</script>";
		//	header("location: " . $_SERVER['PHP_SELF'] . "?bid=" . $bid .  "&cid=" . $cid);
		//	$error = "Deleted ";
		}
		
		$getbid=$_GET['bid'];
		$getcid=$_GET['cid'];
		
		
 
		
 
		
		
		//Screen Operations
		$edit = 0;
		$eid = '';
		if ($_GET['edit'] == 1) {
			$edit = 1;
			$eid = intval($_GET['eid']);
			$_SESSION['fid'] = $eid;
			$_SESSION['fname'] = 'INSPECTION';
		}
		
		if ($_GET['edit'] == 0) {
			$edit = 0;
		}
		
	?>
	<!DOCTYPE html>
	<html lang="en">
		
		<head>
			<?php include 'includes/head.php'; ?>
			<link href="assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
			<link href="assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
			<link href="assets/css/vendor/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
		</head>
		
		<body class="loading" data-layout-config='{"leftSideBarTheme":"<?= $menumode; ?>","layoutBoxed":false, "leftSidebarCondensed":<?= $iconmode; ?>, "leftSidebarScrollable":false,"darkMode":<?= $bodymode; ?>, "showRightSidebarOnStart": false}'>
			<div class="wrapper">
				<?php include 'includes/left-navigation.php'; ?>
				<div class="content-page">
					<div class="content">
						<?php include 'includes/top-menu.php'; ?>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12">
									<div class="page-title-box">
										<div class="page-title-right">
											<ol class="breadcrumb m-0">
												<li class="breadcrumb-item"><a href="javascript: void(0);">
													<?= $projectname; ?>
												</a></li>
												<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
												<li class="breadcrumb-item active">Report</li>
											</ol>
										</div>
										<h4 class="page-title">
											Report Management
										</h4>
									</div>
								</div>
							</div>
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php'; ?>
								
								<!-- --------------->
								<!-- container START-->
								<!------------------>
								
								
								
								<!--LIST VIEW-->
								<?php if ($edit == 0) { ?>
									
									<div class="col-lg-12 d-print-none">
										<div class="card">
											<div class="card-body">
												<form class="form" method="post" enctype="multipart/form-data">
													<div class="row">
													<?php
														$menudata = Selectdata("SELECT * FROM city Order BY c_name ASC");
													formselect('Region', 'cid', $menudata, '', '6', $getcid, 'c_id', 'c_name'); ?>
													
													
													<?php
														$menudata = Selectdata("SELECT * FROM bank Order BY b_name ASC");
													formselect('Bank name', 'bid', $menudata, '', '6', $getbid, 'b_id', 'b_name'); ?>
													
													<button name="searchh" class="btn btn-primary" type="submit">Search</button>
													</div>
												</form>
												
												
											</div>
										</div>
									</div>
									
									<div class="col-lg-12">
										
										<div class="card">
											<div class="card-body">
												<table data-order='[[ 0, "asc" ]]' id="datatable-buttonsss" data-page-length='100' class="table w-100 nowrap ">
													<thead>
														<tr>
															<th>ID</th>
															<th>CODE</th>
															<th>BRANCH NAME</th>
															<th>1st VISIT</th>
															<th>2nd VISIT</th>
															<th>3rd VISIT</th>
															<th>4th VISIT</th>
														</tr>
													</thead>
													<tbody>
														<?php
															
															
															if($getbid!=''){
																$bidclass='AND b_id='.$getbid;
																}
																
															if($getcid!=''){
																$cidclass='AND c_id='.$getcid;
																}
															
															$count = 1;
															$msg= "SELECT * FROM sites WHERE s_active=1 AND b_id is NOT NULL AND g_id IS NOT NULL $bidclass $cidclass";
															$listdata = Selectdata("SELECT * FROM sites WHERE s_active=1 AND b_id is NOT NULL AND g_id IS NOT NULL $bidclass $cidclass");
															
															//echo $msg;
															
															if (sizeof($listdata) == 0) {
															?>
															<tr>
																<td colspan="7" align="center">
																	<h3 style="color:black">
																		<?php mylan("No record found ", "لا يوجد سجلات "); ?>
																	</h3>
																</td>
																<tr>
																	<?php
																		} else {
																		foreach ($listdata as $row) {
																			
																		?>
																		<tr>
																			
																			<td><?php text($count, $strong = false, $small = false, $badge = false, $lighten = false, $outline = false, ''); ?></td>
																			
																			<td><?php text($row['s_code'], $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = ''); ?></td>
																			
																			<td><?php text($row['s_name'], $strong = true, $small = false, $badge = false, $lighten = false, $outline = false, '', $icon = ''); ?></td>
																			
																			
																			<?php
																				
																				$sid = $row['s_id'];
																				$inspectionlist = Selectdata("SELECT * FROM inspection WHERE b_id!='null' AND s_id='$sid' ORDER BY i_id ASC");
																				
																			?>
																			
																			<td>
																				<?php if($inspectionlist[0]['i_dated']!=''){ ?>
																					<span class="d-print-none"><a href="<?= $imgloc . $inspectionlist[0]['i_image']; ?>" target="blank"><?php image($inspectionlist[0]['i_image'], '80', '90', 'cover'); ?></a><br></span>
																					<?php text(substr($inspectionlist[0]['i_dated'],0,10), $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = ''); ?>
																				<?php } ?>	
																			</td>
																			
																			<td>
																				<?php if($inspectionlist[1]['i_dated']!=''){ ?>
																					<span class="d-print-none"><a href="<?= $imgloc . $inspectionlist[1]['i_image']; ?>" target="blank"><?php image($inspectionlist[1]['i_image'], '80', '90', 'cover'); ?></a><br></span>
																					<?php text(substr($inspectionlist[1]['i_dated'],0,10), $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = ''); ?>
																				<?php } ?>	
																			</td>
																			
																			<td>
																				<?php if($inspectionlist[2]['i_dated']!=''){ ?>
																					<span class="d-print-none"><a href="<?= $imgloc . $inspectionlist[2]['i_image']; ?>" target="blank"><?php image($inspectionlist[2]['i_image'], '80', '90', 'cover'); ?></a><br></span>
																					<?php text(substr($inspectionlist[2]['i_dated'],0,10), $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = ''); ?>
																				<?php } ?>	
																			</td>
																			
																			<td>
																				<?php if($inspectionlist[3]['i_dated']!=''){ ?>
																					<span class="d-print-none"><a href="<?= $imgloc . $inspectionlist[3]['i_image']; ?>" target="blank"><?php image($inspectionlist[3]['i_image'], '80', '90', 'cover'); ?></a><br></span>
																					<?php text(substr($inspectionlist[3]['i_dated'],0,10), $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = ''); ?>
																				<?php } ?>	
																			</td>
																			
																			
																			
																			
																			
																		</tr>
																		<?php
																			$count++;
																		}
																	} ?>
															</tbody>
														</table>
													</div> <!-- end card-body-->
												</div> <!-- end card-->
											</div> <!-- end col-->
										<?php } ?>
										<!--LIST VIEW END-->
										
										<!--EDIT VIEW-->
										<?php if ($edit == 1) { ?>
											
											<div class="col-lg-12">
												<a class="btn btn-primary m-2" href="<?= $_SERVER['PHP_SELF']; ?>?edit=0">Back</a>
												
												<div class="row">
													<?php
														$eid = intval($_GET['eid']);
														$listdata = Countdata("Select * FROM media WHERE screen='INSPECTION' AND f_id='$eid'");
														cardMenu('Images', $listdata . ' Images', 'images.php?id=' . $eid, 'uil uil-images', '3', 'info');
														
													?>
												</div>
												
												<?php
													$listdata = Selectdata("Select * FROM inspection WHERE i_id=$eid");
													foreach ($listdata as $row) {
													?>
													
													<form class="form" method="post" enctype="multipart/form-data">
														<div class="col-lg-12">
															<div class="card">
																<div class="card-body">
																	<h4>User Details</h4>
																	<div class="row">
																		
																		<?php
																			$menudata = Selectdata("SELECT * FROM user WHERE expert='1' Order BY name ASC");
																		formselect('Service Person', 'u_id', $menudata, 'required', '6', $row['u_id'], 'u_id', 'name'); ?>
																		
																		<?php forminput('Cost', 'i_cost', $row['i_cost'], 'required', '6', 'text'); ?>
																		
																		<?php formtextarea('Remark', 'i_remark', $row['i_remark'], 'required', '6', 'text'); ?>
																		
																		
																		<?php formmulti('Checklist', 'i_checklist', $serviceCheckList, 'required', '6', $row['i_checklist'], 'id', 'lable'); ?>
																		
																		
																		
																		<?php formimage('Image', 'image', $row['i_image'], '', '6', 'oldimage', '80', '120', 'cover'); ?>
																		
																		<div class="col-6">
																			<p>Record Location<br>
																				<?= $row['i_lat']; ?>,
																				<?= $row['i_lng']; ?><br>
																				<a href="https://www.google.com/maps/search/?api=1&query=<?= $row['i_lat']; ?>,<?= $row['i_lng']; ?>" target="blank">View on map</a>
																			</p>
																		</div>
																		
																	</div>
																	<button name="update" class="btn btn-primary" type="submit">Update</button>
																</div> <!-- end card-body-->
															</div> <!-- end card-->
														</div> <!-- end col-->
														
													</div> <!-- end col-->
												</form>
												
												
												
											<?php } ?>
											
										<?php } ?>
										
										<!--Edit end-->
										
										<!-- ADD new-->
										<?php addStart(); ?>
										
										<?php
											$menudata = Selectdata("SELECT * FROM user WHERE expert='1' Order BY name ASC");
										formselect('Service Person', 'u_id', $menudata, 'required', '6', '', 'u_id', 'name'); ?>
										
										<?php forminput('Remark', 'i_remark', '', 'required', '6', 'text'); ?>
										
										<?php forminput('Latitude', 'i_lat', '', 'required', '6', 'text'); ?>
										
										<?php forminput('Longitude', 'i_lng', '', 'required', '6', 'text'); ?>
										
										<?php formmulti('Checklist', 'i_checklist', $serviceCheckList, 'required', '6', '', 'id', 'lable'); ?>
										
										<?php forminput('Cost', 'i_cost', '', 'required', '6', 'text'); ?>
										
										<?php formimage('Image', 'image', '', '', '6', 'oldimage', '80', '50', 'cover'); ?>
										<?php addEnd(); ?>
										
										<!-- ADD new End-->
										
										<!-- --------------->
										<!-- container End-->
										<!------------------>
									</div>
								</div>
								<!-- Footer Start -->
								<?php include 'includes/footer.php'; ?>
							</div>
						</div>
						<!-- Right Sidebar -->
						<?php include 'includes/right-bar.php'; ?>
						<!-- bundle -->
						
						<script>
							$(document).ready(function() {
								$('#datatable-buttonsss').DataTable({
									dom: 'Bfrtip',
									class :'d-print-none',
									buttons: [
									'copy', 'csv', 'excel', 'pdf', 'print'
									]
								});
							});
							
							
						</script>
						
						
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
						<script src="assets/js/vendor/dataTables.buttons.min.js"></script>
						<script src="assets/js/vendor/buttons.bootstrap4.min.js"></script>
						<script src="assets/js/vendor/buttons.html5.min.js"></script>
						<script src="assets/js/vendor/buttons.flash.min.js"></script>
						<script src="assets/js/vendor/buttons.print.min.js"></script>
						<script src="assets/js/vendor/pdfmake.min.js"></script>
						
						<!-- Datatable Init js -->
						<script src="assets/js/pages/demo.datatable-init.js"></script>
						<!-- end demo js-->
					</body>
					
				</html>
			<?php } ?>									