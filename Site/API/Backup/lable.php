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
		
		if(isset($_POST['submit']))
		{
			
			
			$title = addslashes($_POST['title']);
			$titlearab = addslashes($_POST['titlearab']);
 $namecolor = addslashes($_POST['color']);
 
			
			
			
			
			$query = mysqli_query($con, "insert into lable(l_name,l_name_arab,l_color) values('$title','$titlearab','$namecolor' )");
			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog',$name.'lable Added')");
				
				$msg = "Added";
				} else {
				$error = "Something Wrong";
			}
			
			
		}
		
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "delete from  lable  where l_id='$id'");
            $msg = "Deleted ";
            $uname = $_SESSION['login'];
            $queryy = mysqli_query($con, "insert into adminlog(name,action) values('$uname','lable deleted')");
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		
		if ($_GET['action'] == 'act' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE problems SET p_active='1' WHERE p_id=$id");
			$msg = "Activated ";
			header("location: ".$_SERVER['PHP_SELF']);
			
		}
		
		if ($_GET['action'] == 'dact' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$userlog = $_SESSION['login'];
			
			$query = mysqli_query($con, "UPDATE problems SET p_active='0' WHERE p_id=$id");
			$msg = "Deactivated ";
			header("location: ".$_SERVER['PHP_SELF']);
			
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
												<li class="breadcrumb-item"><a href="javascript: void(0);"><?php mylan("Dashboard ","لوحة القيادة "); ?></a></li>
												<li class="breadcrumb-item active"><?php mylan("Lables "," ملصقات "); ?></li>
											</ol>
										</div>
										<h4 class="page-title"><?php mylan(" Lable Management  ","  إدارة التسمية  "); ?></h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal"><?php mylan("Add Lable   "," أضف تسمية  "); ?></button>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
									 
											
											<table data-order='[[ 0, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th><?php mylan(" ID  "," هوية شخصية  "); ?></th>
														<th><?php mylan(" Title  ","عنوان   "); ?></th>
														<th><?php mylan(" عنوان    "," عنوان  "); ?></th> 
														<th><?php mylan(" Color  "," اللون  "); ?></th> 
														<th><?php mylan("Action ","عمل "); ?></th>
													</tr>
												</thead>
												
												
												<tbody>
													<?php
														
														$query = mysqli_query($con, "Select * FROM lable");
														$cnt = 1;
														$rowcount = mysqli_num_rows($query);
														if ($rowcount == 0) {
														?>
														<tr>
															<td colspan="7" align="center">
																<h3 style="color:black"><?php mylan("No record found ","لا يوجد سجلات "); ?></h3>
															</td>
															<tr>
																<?php
																	} else {
																	while ($row = mysqli_fetch_array($query)) {
																	?>
																	<tr>
																		<td><?php echo htmlentities($row['l_id']); ?></td>
																		
															 
																		
																		
																		<td><b><?php echo htmlentities($row['l_name']); ?></b></td>
																		
																		<td><b><?php echo htmlentities($row['l_name_arab']); ?></b></td>
																		
																		
															 <td><strong style="color:<?=$row['l_color']; ?>"><?=$row['l_color']; ?></strong></td>
																		
														 
																		<td>
																			
															 
															 <!-- Menu Items-->	
																			<div class="btn-group">
																				<button type="button" class="btn btn-light dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false"><?php mylan(" More   "," أكثر  "); ?> <span class="caret"></span> </button>
																				<div class="dropdown-menu">
																				
																					<a class="dropdown-item"  href="edit-lable.php?scid=<?php echo htmlentities($row['l_id']); ?>" ><?php mylan(" Edit  ","يحرر   "); ?></a>
																				
																					<a class="dropdown-item"  href="<?=$_SERVER['PHP_SELF']; ?>?scid=<?php echo htmlentities($row['l_id']); ?>&&action=del" onclick="return confirm('Are you sure you want to delete?');" ><?php mylan(" Delete  "," حذف  "); ?></a>
																					
																				</div>
																			</div>
																			
																			
																		</td>
																		
																	</tr>
																<?php } } ?>
														</tbody>
													</table> 
													
												</div> <!-- end card-body-->
											</div> <!-- end card-->
										</div> <!-- end col-->		
										
										
										
										
										<!-- Form Model-->		
										<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog  modal-lg modal-dialog-centered">
												<div class="modal-content">
													
													<div class="modal-body">
														<div class="text-center mt-2 mb-4">
															<a href="index.html" class="text-success">
																<span><img src="assets/images/logo_sm_dark.png" alt="" height="18"></span>
															</a>
														</div>
														
														<form class="pl-3 pr-3"  method="post" enctype="multipart/form-data">
															<div class="row">
																
																
																<div class="col-6">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("   Name"," اسم "); ?></label>
																		<input type="text" class="form-control" name="title" required>
																	</div>
																</div>
																
																
																
																
																<div class="col-6">
																	<div class="form-group mb-3">
																		<label for="validationCustom01">ا<?php mylan("  اسم ","اسم   "); ?></label>
																		<input type="text" class="form-control" name="titlearab" required>
																	</div>
																</div>
																
																<div class="col-6">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("   Color (choose color suite for white Background)"," اللون (اختر مجموعة ألوان للخلفية البيضاء)  "); ?></label>
																		<input class="form-control" id="example-color" type="color" name="color" value="#727cf5">
																	</div>
																</div>
																
																
										  
																
																
															</div>
															
															<div class="form-group text-center">
																<button class="btn btn-primary" type="submit" name="submit"><?php mylan("Add Lable   "," أضف تسمية  "); ?></button>
															</div>
															
														</form>
														
													</div>
												</div>
											</div>
										</div>
										
										<!--  Form modal end -->
										
										
										
										
										
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