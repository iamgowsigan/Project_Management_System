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
		
		if (isset($_POST['save'])) {
			$uid = addslashes($_POST['uid']);
			
			$_SESSION['uid'] = $uid;
			
			header("location: view-site.php");
			
		}
 
 
		//ADD
		if (isset($_POST['submit'])) {
			
			$file_name = Uploadimage('sites', 'image');
			
			$field['s_name'] = addslashes($_POST['s_name']);
			$field['s_code'] = addslashes($_POST['s_code']);
			$field['c_id'] = addslashes($_POST['c_id']);
			$field['s_contact_person'] = addslashes($_POST['s_contact_person']);
			$field['s_phone'] = addslashes($_POST['s_phone']);
			$field['s_email'] = addslashes($_POST['s_email']);
			$field['s_image'] = $file_name;
			
			$res = Insertdata("sites", $field);
			if ($res != 0) {
		//	header("location: " . $_SERVER['PHP_SELF'] . "?eid=" . $res . "&&edit=1");
			echo "<script>window.location.href='" . $_SERVER['PHP_SELF'] . "?eid=" . $res . "&&edit=1" ."';</script>";
 
				//header("location: " . $_SERVER['PHP_SELF'] . "?eid=" . $res . "&&edit=1");
				} else {
				$error = "Deleted ";
			}
			
			
		}
		
		//Update
		if (isset($_POST['update'])) {
			
			$eid = intval($_GET['eid']);
			
			$oldimage = $_POST['oldimage'];
			if ($_FILES['image']['name'] == '') {
				$file_name = $oldimage;
				} else {
				$file_name = Uploadimage('site', 'image');
			}
			
			$field['b_id'] = addslashes($_POST['b_id']);
			$field['g_id'] = addslashes($_POST['g_id']);
			$field['c_id'] = addslashes($_POST['c_id']);
			$field['s_name'] = addslashes($_POST['s_name']);
			$field['s_code'] = addslashes($_POST['s_code']);
			$field['s_contact_person'] = addslashes($_POST['s_contact_person']);
			$field['s_phone'] = addslashes($_POST['s_phone']);
			$field['s_email'] = addslashes($_POST['s_email']);
			$field['s_purchase_date'] = addslashes($_POST['s_purchase_date']);
			$field['s_lat'] = addslashes($_POST['s_lat']);
			$field['s_lng'] = addslashes($_POST['s_lng']);
			$field['s_address'] = addslashes($_POST['s_address']);
			$field['s_city'] = addslashes($_POST['s_city']);
			$field['s_servicedate'] = addslashes($_POST['s_servicedate']);
			$field['s_image'] = $file_name;
			
			$res = Updatedata("sites", $field, "s_id =$eid");
			if ($res != 0) {
				
				$msg = "Success ";
				} else {
				$error = "something error ";
			}
		}
		
		
		//delete
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$res = Deletedata("delete from sites where s_id='$id'");
			header("location: " . $_SERVER['PHP_SELF']);
			$msg = "Deleted";
		}
		
		
		//Active
		if ($_GET['action'] == 'status' && $_GET['scid']) {
			$scid = intval($_GET['scid']);
			$val = $_GET['val'];
			$field['s_active'] = $val;
			$res = Updatedata("sites", $field, "s_id=$scid");
			$msg = "Success ";
			//header("location: ".$_SERVER['PHP_SELF']);
		}
		
		
		
		//Screen Operations
		$edit = 0;
		$eid = '';
		if ($_GET['edit'] == 1) {
			$edit = 1;
			$eid = intval($_GET['eid']);
			$_SESSION['pid'] = $eid;
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
		</head>
		
		<body class="loading"
		data-layout-config='{"leftSideBarTheme":"<?= $menumode; ?>","layoutBoxed":false, "leftSidebarCondensed":<?= $iconmode; ?>, "leftSidebarScrollable":false,"darkMode":<?= $bodymode; ?>, "showRightSidebarOnStart": false}'>
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
												<li class="breadcrumb-item active">Sites</li>
											</ol>
										</div>
										<h4 class="page-title">Manage Sites</h4>
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
									
									<div class="col-lg-12">
										<button type="button" class="btn btn-primary m-2" data-toggle="modal"
										data-target="#signup-modal">Add New</button>
										<div class="card">
											<div class="card-body">
												<table data-order='[[ 6, "asc" ]]' data-page-length='100' id="basic-datatable"
												class="table dt-responsive w-100">
													<thead>
														<tr>
															<th>ID</th>
															<th>Image</th>
															<th>Site Name & Code</th>
															<th>Bank & Model Name</th>
															<th>Contact</th>
															<th>Service Date</th>
															<th>Active</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<?php
															
															$listdata = Selectdata("Select sites.*,bank.*,generator.* from sites 
															JOIN bank ON bank.b_id = sites.b_id 
															JOIN generator ON generator.g_id = sites.g_id");
															
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
																			
																			<td>
																				<?php text($row['s_id'], $strong = false, $small = false, $badge = false, $lighten = false, $outline = false, ''); ?>
																			</td>
																			
																			<td>
																				<?php image($row['s_image'], '80', '60', 'cover'); ?>
																			</td>
																			
																			<td>
																				<?php text($row['s_name'], $strong = true, $small = false, $badge = false, $lighten = false, $outline = false, ''); ?>
																				<br>
																				<?php text('##'.$row['s_code'], $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = ''); ?>
																			</td>
																			
																			<td>
																				<?php text($row['b_name'], $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = ''); ?>
																				<br>
																				<?php text($row['g_make'].'-'.$row['g_name'], $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = ''); ?><br>
																				<?php text($row['s_purchase_date'], $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = 'mdi mdi-calendar'); ?>
																			</td>
																			
																			<td>
																				<?php text($row['s_contact_person'], $strong = true, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = ''); ?>
																				<br>
																				<?php text($row['s_phone'], $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = 'mdi mdi-phone'); ?>
																				<br>
																		    	<?php text(substr($row['s_city'],0,25), $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = 'mdi mdi-map-marker-down'); ?>
																			</td>
																			
																		
																			
																			<td>
																				<?php text($row['s_servicedate'], $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = 'mdi mdi-calendar'); ?>
																				
																				<br>
																				<?php
																					
																					
																					$date1 = new DateTime();;
																					$date2 = new DateTime($row['s_servicedate']);
																					$days  = $date2->diff($date1)->format('%a');
																					$bgcolor='success';
																					if($days>30){
																						$bgcolor='success';
																						}else if($days>10){
																						$bgcolor='info';
																						}else if($days>5){
																						$bgcolor='warning';
																						}else{
																						$bgcolor='danger';
																					}
																				text($days.' days', $strong = false, $small = true, $badge = true, $lighten = false, $outline = false,  $bgcolor); ?>
																				
																				
																			</td>
																			
																			<td>
																				<?php active($row['s_active'], $row['s_id']); ?>
																			</td>
																			
																			<td>
																				<?php action($row['s_id'], 'V,E,D', $name = $row['s_name']); ?>
																			</td>
																			
																		</tr>
																		<?php }
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
												
												
												<?php
													$listdata = Selectdata("Select * FROM sites WHERE s_id=$eid");
													foreach ($listdata as $row) {
													?>
													
													<form class="form" method="post" enctype="multipart/form-data">
														<div class="col-lg-12">
															<div class="card">
																<div class="card-body">
																	<h4>User Details</h4>
																	<div class="row">
																		
																		<?php forminput('Site Name', 's_name', $row['s_name'], 'required', '6', 'text'); ?>
																		<?php forminput('Code', 's_code', $row['s_code'], 'required', '6', 'text'); ?>
																		
																		<?php
																			$menudata = Selectdata("SELECT * FROM city Order BY c_name ASC");
																		formselect('Region', 'c_id', $menudata, 'required', '6', $row['c_id'], 'c_id', 'c_name'); ?>
																		
																		
																		<?php forminput('Contact name', 's_contact_person', $row['s_contact_person'], 'required', '6', 'text'); ?>
																		
																		<?php
																			$menudata = Selectdata("SELECT * FROM bank Order BY b_name ASC");
																		formselect('Bank name', 'b_id', $menudata, 'required', '6', $row['b_id'], 'b_id', 'b_name'); ?>
																		
																		<?php
																			$menudata = Selectdata("SELECT * FROM generator Order BY g_name ASC");
																		formselect('Generator name', 'g_id', $menudata, 'required', '6', $row['g_id'], 'g_id', 'g_name'); ?>
																		
																		<?php forminput('Phone', 's_phone', $row['s_phone'], 'required', '6', 'text'); ?>
																		<?php forminput('Email', 's_email', $row['s_email'], 'required', '6', 'text'); ?>
																		<?php forminput('Purchase date', 's_purchase_date', $row['s_purchase_date'], 'required', '6', 'date'); ?>
																		<?php forminput('City', 's_city', $row['s_city'], 'required', '6', 'text'); ?>
																		<?php forminput('Lattitude', 's_lat', $row['s_lat'], 'required', '6', 'text'); ?>
																		<?php forminput('Longitude', 's_lng', $row['s_lng'], 'required', '6', 'text'); ?>
																		<?php forminput('Address', 's_address', $row['s_address'], 'required', '6', 'text'); ?>
																		<?php forminput('Next Service date', 's_servicedate', $row['s_servicedate'], 'required', '6', 'date'); ?>
																		<?php formimage('Image', 'image', $row['s_image'], '', '6', 'oldimage', '80', '50', 'cover'); ?>
																		
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
										
										<?php forminput('Site Name', 's_name', '', 'required', '6', 'text'); ?>
										
										<?php
											$menudata = Selectdata("SELECT * FROM city Order BY c_name ASC");
										formselect('Region', 'c_id', $menudata, 'required', '6', '', 'c_id', 'c_name'); ?>
										
										<?php forminput('Code', 's_code', '', 'required', '6', 'text'); ?>
										<?php forminput('Contact name', 's_contact_person', '', 'required', '6', 'text'); ?>
										
										<?php forminput('Phone', 's_phone', '', 'required', '6', 'text'); ?>
										<?php forminput('Email', 's_email', '', 'required', '6', 'text'); ?>
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