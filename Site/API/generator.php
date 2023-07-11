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
	if (isset($_POST['submit'])) {

		$file_name = Uploadimage('generator', 'image');

		$field['g_name'] = addslashes($_POST['g_name']);
		$field['g_make'] = addslashes($_POST['g_make']);
		$field['g_kva'] = addslashes($_POST['g_kva']);
		$field['g_output'] = addslashes($_POST['g_output']);
		$field['g_phase'] = addslashes($_POST['g_phase']);
		$field['g_fuel'] = addslashes($_POST['g_fuel']);
		$field['g_noise'] = addslashes($_POST['g_noise']);
		$field['g_image'] = $file_name;

		$res = Insertdata("generator", $field);
		if ($res != 0) {
			$msg = "Success ";
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
			$file_name = Uploadimage('generator', 'image');
		}

		$field['g_name'] = addslashes($_POST['g_name']);
		$field['g_make'] = addslashes($_POST['g_make']);
		$field['g_kva'] = addslashes($_POST['g_kva']);
		$field['g_output'] = addslashes($_POST['g_output']);
		$field['g_phase'] = addslashes($_POST['g_phase']);
		$field['g_fuel'] = addslashes($_POST['g_fuel']);
		$field['g_noise'] = addslashes($_POST['g_noise']);
		$field['g_image'] = $file_name;

		$res = Updatedata("generator", $field, "g_id =$eid");
		if ($res != 0) {

			$msg = "Success ";
		} else {
			$error = "something error ";
		}
	}


	//delete
	if ($_GET['action'] == 'del' && $_GET['scid']) {
		$id = intval($_GET['scid']);
		$res = Deletedata("delete from generator where g_id='$id'");
		header("location: " . $_SERVER['PHP_SELF']);
		$msg = "Deleted";
	}


	//Active
	if ($_GET['action'] == 'status' && $_GET['scid']) {
		$scid = intval($_GET['scid']);
		$val = $_GET['val'];
		$field['g_active'] = $val;
		$res = Updatedata("generator", $field, "g_id=$scid");
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
											<li class="breadcrumb-item active">Generator</li>
										</ol>
									</div>
									<h4 class="page-title">Manacccge Generator</h4>
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
								</div>

								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<table data-order='[[ 0, "desc" ]]' id="basic-datatable"
												class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th>ID</th>
														<th>Image</th>
														<th>Make & Model Name</th>
														<th>Output & Power</th>
														<th>Phase & Noise</th>
														<th>Active</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php

													$listdata = Selectdata("Select * FROM generator");

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
																	<?php text($row['g_id'], $strong = false, $small = false, $badge = false, $lighten = false, $outline = false, ''); ?>
																</td>

																<td>
																	<?php image($row['g_image'], '80', '70', 'cover'); ?>
																</td>

																<td>
																	<?php text($row['g_make'], $strong = true, $small = false, $badge = false, $lighten = false, $outline = false, 'info', $icon = ''); ?>
																	<br>
																	<?php text($row['g_name'], $strong = true, $small = true, $badge = false, $lighten = false, $outline = false, ''); ?>
																
																</td>
																
																<td>
																	<?php text($row['g_output'], $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = 'mdi mdi-robot-industrial'); ?>
																	<br>
																	<?php text($row['g_kva'], $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = 'mdi mdi-source-branch'); ?>
																	<br>
																	<?php text(ArrayToName($row['g_fuel'], $fuelLevel, 'lable', 'lable'), $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = ' mdi mdi-fuel'); ?>
																</td>

																<td>
																	<?php text(ArrayToName($row['g_phase'], $phaseLevel, 'lable', 'lable'), $strong = true, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = ' uil-sign-alt'); ?>
																	<br>
																	<?php text($row['g_noise'], $strong = false, $small = true, $badge = true, $lighten = true, $outline = false, 'info', $icon = ''); ?>
																</td>

																<td>
																	<?php active($row['g_active'], $row['g_id']); ?>
																</td>

																<td>
																	<?php action($row['g_id'], 'E,D', $name = $row['name']); ?>
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
									$listdata = Selectdata("Select * FROM generator WHERE g_id=$eid");
									foreach ($listdata as $row) {
										?>

										<form class="form" method="post" enctype="multipart/form-data">
											<div class="col-lg-12">
												<div class="card">
													<div class="card-body">
														<h4>Generator Details</h4>
														<div class="row">

															<?php forminput('Name', 'g_name', $row['g_name'], 'required', '6', 'text'); ?>
															<?php forminput('Manufacture', 'g_make', $row['g_make'], 'required', '6', 'text'); ?>
															<?php forminput('Output', 'g_output', $row['g_output'], 'required', '6', 'text'); ?>
															<?php forminput('Power', 'g_kva', $row['g_kva'], 'required', '6', 'text'); ?>
															<?php forminput('Noise consumption', 'g_noise', $row['g_noise'], 'required', '6', 'text'); ?>

															<?php formselect('Fuel Type', 'g_fuel', $fuelLevel, 'required', '6', $row['g_fuel'], 'lable', 'lable'); ?>
															<?php formselect('Phase Level', 'g_phase', $phaseLevel, 'required', '6', $row['g_phase'], 'lable', 'lable'); ?>
														
															<?php formimage('Image', 'image', $row['g_image'], '', '6', 'oldimage', '80', '50', 'cover'); ?>

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


							<?php forminput('Name', 'g_name', '', 'required', '6', 'text'); ?>
							<?php forminput('Manufacture', 'g_make', '', 'required', '6', 'text'); ?>
							<?php forminput('Output', 'g_output', '', 'required', '6', 'text'); ?>
							<?php forminput('Power', 'g_kva', '', 'required', '6', 'text'); ?>
							<?php forminput('Noise consumption', 'g_noise', '', 'required', '6', 'text'); ?>

							<?php formselect('Fuel Type', 'g_fuel', $fuelLevel, 'required', '6', '', 'lable', 'lable'); ?>
							<?php formselect('Phase Level', 'g_phase', $phaseLevel, 'required', '6', '', 'lable', 'lable'); ?>

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