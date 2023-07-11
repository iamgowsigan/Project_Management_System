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

		$file_name = Uploadimage('user', 'image');

		$field['name'] = addslashes($_POST['name']);
		$field['phone'] = addslashes($_POST['phone']);
		$field['email'] = addslashes($_POST['email']);
		$field['expert'] = 1;
		$field['dob'] = addslashes($_POST['dob']);
		$field['country'] = addslashes($_POST['country']);
		$field['city'] = addslashes($_POST['city']);
		$field['profile_pic'] = $file_name;

		$res = Insertdata("user", $field);
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
			$file_name = Uploadimage('user', 'image');
		}

		$field['name'] = addslashes($_POST['name']);
		$field['phone'] = addslashes($_POST['phone']);
		$field['email'] = addslashes($_POST['email']);
		$field['expert'] = 1;
		$field['dob'] = addslashes($_POST['dob']);
		$field['country'] = addslashes($_POST['country']);
		$field['gender'] = addslashes($_POST['gender']);
		$field['city'] = addslashes($_POST['city']);
		$field['about'] = addslashes($_POST['about']);
		$field['profile_pic'] = $file_name;

		$res = Updatedata("user", $field, "u_id =$eid");
		if ($res != 0) {

			$msg = "Success ";
		} else {
			$error = "something error ";
		}
	}


	//delete
	if ($_GET['action'] == 'del' && $_GET['scid']) {
		$id = intval($_GET['scid']);
		$res = Deletedata("delete from user where u_id='$id'");
		header("location: " . $_SERVER['PHP_SELF']);
		$msg = "Deleted";
	}


	//Active
	if ($_GET['action'] == 'status' && $_GET['scid']) {
		$scid = intval($_GET['scid']);
		$val = $_GET['val'];
		$field['u_active'] = $val;
		$res = Updatedata("user", $field, "u_id=$scid");
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
											<li class="breadcrumb-item active">Service Persons</li>
										</ol>
									</div>
									<h4 class="page-title">Manage Service Persons</h4>
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
														<th>Name</th>
														<th>Contact</th>
														<th>Active</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php

													$listdata = Selectdata("Select * FROM user WHERE expert = 1");

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
																	<?php text($row['u_id'], $strong = false, $small = false, $badge = false, $lighten = false, $outline = false, ''); ?>
																</td>

																<td>
																	<?php image($row['profile_pic'], '80', '80', 'cover'); ?>
																</td>

																<td>
																	<?php text($row['name'], $strong = true, $small = false, $badge = false, $lighten = false, $outline = false, ''); ?>
																</td>

																<td>
																	<?php text($row['phone'], $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = 'mdi mdi-cellphone'); ?>
																	<br>
																	<?php text($row['email'], $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = 'mdi mdi-email'); ?>
																	<br>
																	<?php text(ArrayToName($row['city'], $statelist, 'id', 'name'), $strong = false, $small = true, $badge = false, $lighten = false, $outline = false, '', $icon = 'mdi mdi-map-marker-down'); ?>
																</td>

																<td>
																	<?php active($row['u_active'], $row['u_id']); ?>
																</td>

																<td>
																	<?php action($row['u_id'], 'V,E,D', $name = $row['name']); ?>
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
									$listdata = Selectdata("Select * FROM user WHERE expert = 1 AND u_id=$eid");
									foreach ($listdata as $row) {
										?>

										<form class="form" method="post" enctype="multipart/form-data">
											<div class="col-lg-12">
												<div class="card">
													<div class="card-body">
														<h4>User Details</h4>
														<div class="row">

															<?php forminput('Name', 'name', $row['name'], 'required', '6', 'text'); ?>
															<?php forminput('Phone number', 'phone', $row['phone'], 'required', '6', 'text'); ?>
															<?php forminput('Email', 'email', $row['email'], 'required', '6', 'text'); ?>
															<?php forminput('Aadhar Number', 'about', $row['about'], '', '6', 'text'); ?>
															<div class="col-6">
																<div class="form-group mb-3">
																	<label for="validationCustom01">
																		<?php mylan("Gender", " جنس"); ?>
																	</label>
																	<select class="form-control select2" data-toggle="select2"
																		name="gender">
																		<option <?php if ($userdetail[0]['gender'] == 'male') {
																			echo 'selected';
																		} ?> value="male"><?php mylan(" ", " "); ?>Male
																		</option>
																		<option <?php if ($userdetail[0]['gender'] == 'female') {
																			echo 'selected';
																		} ?> value="female"><?php mylan(" ", " "); ?>Female</option>
																	</select>
																</div>
															</div>

															<?php
															include 'includes/country.php';
															formselect('Country', 'country', $countrylist, 'required', '6', $row['country'], 'phonecode', 'name'); ?>

															<?php
															include 'includes/country.php';
															formselect('City', 'city', $statelist, 'required', '6', $row['city'], 'id', 'name'); ?>


															<?php formimage('Profile', 'image', $row['profile_pic'], '', '6', 'oldimage', '50', '80', 'cover'); ?>


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

							<?php forminput('Name', 'name', '', 'required', '6', 'text'); ?>
							<?php forminput('Phone number', 'phone', '', 'required', '6', 'text'); ?>
							<?php forminput('Email', 'email', '', 'required', '6', 'text'); ?>

							<div class="col-6">
								<div class="form-group mb-3">
									<label for="validationCustom01">
										<?php mylan("Gender", " جنس"); ?>
									</label>
									<select class="form-control select2" data-toggle="select2" name="gender">
										<option <?php if ($userdetail[0]['gender'] == 'male') {
											echo 'selected';
										} ?> value="male"><?php mylan(" ", " "); ?>Male
										</option>
										<option <?php if ($userdetail[0]['gender'] == 'female') {
											echo 'selected';
										} ?> value="female"><?php mylan(" ", " "); ?>Female</option>
									</select>
								</div>
							</div>

							<?php
							include 'includes/country.php';
							formselect('Country', 'country', $countrylist, 'required', '6', '', 'phonecode', 'name'); ?>

							<?php
							include 'includes/country.php';
							formselect('City', 'city', $statelist, 'required', '6', '', 'id', 'name'); ?>


							<?php formimage('Profile', 'image', '', '', '6', 'oldimage', '80', '50', 'cover'); ?>


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