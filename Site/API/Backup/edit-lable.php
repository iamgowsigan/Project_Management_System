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
		$adminid=$_SESSION['userid'];
		$id = intval($_GET['scid']);
		
		
		
		
		if(isset($_POST['updatee']))
		{
			
			
			$title = addslashes($_POST['title']);
			$titlearab = addslashes($_POST['titlearab']);
			
			$namecolor = addslashes($_POST['color']);
			
			$query = mysqli_query($con, "UPDATE lable SET l_name='$title',l_name_arab='$titlearab',l_color='$namecolor'  WHERE l_id=$id");
			
			
			
			if ($query) {
				
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog','problems Updated')");
				
				$msg = "Updated";
				} else {
				$error = "Something Wrong";
			}
		}
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
												<li class="breadcrumb-item"><a href="dashboard.php"><?php mylan("Dashboard ","لوحة القيادة "); ?></a></li>
												<li class="breadcrumb-item active"><?php mylan("Lable","لابل"); ?></li>
											</ol>
										</div>
										<h4 class="page-title"><?php mylan("Edit Lable"," تحرير التسمية"); ?></h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								
								<a href="lable.php" class="btn btn-primary m-2" ><?php mylan("Back ","عودة "); ?></a>
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<h4 class="header-title"></h4>
											
										</p>
										<?php
											
											$query1 = mysqli_query($con, "Select * from lable WHERE l_id=$id");
											while ($rowp = mysqli_fetch_array($query1)) {
											?>							
											
											<form class="form" method="post" enctype="multipart/form-data">
												<div class="row">
													
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan(" Title ","عنوان "); ?>Title</label>
															<input type="text" class="form-control" name="title" value="<?=$rowp['l_name']; ?>" required>
														</div>
													</div>
													
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01">لقب</label>
															<input type="text" class="form-control" name="titlearab" value="<?=$rowp['l_name_arab']; ?>" required>
															
														</div>
													</div>
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan(" Color (choose color suite for white Background) ","اللون (اختر مجموعة ألوان للخلفية البيضاء) "); ?>Color (choose color suite for white Background)</label>
															<input class="form-control" id="example-color" type="color" name="color" value="<?=$rowp['l_color']; ?>">
														</div>
													</div>
													
													
													
													
												</div>
												<button name="updatee" class="btn btn-primary" type="submit"><?php mylan(" Update Label ","تحديث التسمية "); ?></button>
											</form>    
										<?php } ?>	
									</div> <!-- end card-body-->
								</div> <!-- end card-->
							</div> <!-- end col-->		
							
							
							
							
							
							
							
							
							
							
							
							
							
							
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
			
			<!-- demo app -->
			<script src="assets/js/pages/demo.dashboard-crm.js"></script>
			<!-- end demo js-->
		</body>
	</html>
<?php } ?>	