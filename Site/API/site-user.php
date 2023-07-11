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

	$getpage = $_GET['view'];

	if ($getpage != '') {
		$_SESSION['getpage'] = $getpage;
	} else {

		$getpage = $_SESSION['getpage'];
	}

	$sid = $_SESSION['sid'];
	$sname = $_SESSION['sname'];

	//ADD
	if (isset($_POST['submit'])) {

		$field['u_id'] = addslashes($_POST['u_id']);
		$field['s_id'] = $sid;

		$res = Insertdata("site_user", $field);
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

		$field['u_id'] = addslashes($_POST['u_id']);
		$field['s_id'] = $sid;

		$res = Updatedata("site_user", $field, "su_id =$eid");
		if ($res != 0) {

			$msg = "Success ";
		} else {
			$error = "something error ";
		}
	}


	//delete
	if ($_GET['action'] == 'del' && $_GET['scid']) {
		$id = intval($_GET['scid']);
		$res = Deletedata("delete from site_user where su_id='$id'");
		header("location: " . $_SERVER['PHP_SELF']);
		$msg = "Deleted";
	}


	//Active
	if ($_GET['action'] == 'status' && $_GET['scid']) {
		$scid = intval($_GET['scid']);
		$val = $_GET['val'];
		$field['su_active'] = $val;
		$res = Updatedata("site_user", $field, "su_id=$scid");
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
											<li class="breadcrumb-item active">Site User</li>
										</ol>
									</div>
									<h4 class="page-title">
										<?php
										if ($getpage == 'all') { ?>
											Manage Site User
										<?php }
										if ($getpage == "user") { ?>
											<?= $sname ?> Site User
										<?php } ?>
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

								<div class="col-lg-12">
									<?php
									if ($getpage != 'all') { ?>
										<a href="view-sites.php?eid=<?= $sid; ?>&&edit=1" class="btn btn-primary m-2"><?php mylan("Back ", "خلف "); ?></a>
										<button type="button" class="btn btn-primary m-2 float-right" data-toggle="modal"
											data-target="#signup-modal">Add New</button>
									<?php } ?>
									<div class="card">
										<div class="card-body">
											<table data-order='[[ 0, "desc" ]]' id="basic-datatable"
												class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th>ID</th>
														<th>Image</th>
														<th>User</th>
														<th>Person type</th>
														<th>Active</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php

													$userclass = '';
													if ($getpage == 'all') {
														$userclass = '';
													}
													if ($getpage == "user") {
														$userclass = 'WHERE site_user.s_id =' . $sid;
													}

													$listdata = Selectdata("Select site_user.*, user.*, sites.*, generator.g_image FROM site_user 
													JOIN user ON user.u_id = site_user.u_id
													JOIN sites ON sites.s_id = site_user.s_id
													JOIN generator ON generator.g_id = sites.g_id $userclass");

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
																	<?php text($row['su_id'], $strong = false, $small = false, $badge = false, $lighten = false, $outline = false, ''); ?>
																</td>

																<td>
																	<?php image($row['s_image'], '80', '60', 'cover'); ?>
																</td>

																<td>

																	<div class="media">
																		<img class="mr-2 rounded-circle"
																			src="<?= $imgloc . $row['profile_pic']; ?>" width="40">
																		<div class="media-body">
																			<h6 class="mt-1 mb-0">
																				<?= $row['name']; ?>
																			</h6>
																			<span class="font-11">
																				<?= $row['phone']; ?>
																			</span>
																		</div>

																	</div>
																</td>

																<td>
																	<?php text(ArrayToName($row['expert'], $expertLevel, 'id', 'lable'), $strong = true, $small = true, $badge = true, $lighten = true, $outline = false, 'info', $icon = 'uil-user'); ?>
																</td>

																<td>
																	<?php active($row['su_active'], $row['su_id']); ?>
																</td>

																<td>
																	<?php action($row['su_id'], 'E,D', $name = $row['name']); ?>
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
									$listdata = Selectdata("Select * FROM site_user WHERE su_id=$eid");
									foreach ($listdata as $row) {
										?>

										<form class="form" method="post" enctype="multipart/form-data">
											<div class="col-lg-12">
												<div class="card">
													<div class="card-body">
														<h4>Site User Details</h4>
														<div class="row">

															<?php
															$menudata = Selectdata("SELECT * FROM user Order BY name ASC");
															formselect('User name', 'u_id', $menudata, 'required', '6', $row['u_id'], 'u_id', 'name'); ?>

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
							$menudata = Selectdata("SELECT * FROM user Order BY name ASC");
							formselect('User name', 'u_id', $menudata, 'required', '6', '', 'u_id', 'name'); ?>

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