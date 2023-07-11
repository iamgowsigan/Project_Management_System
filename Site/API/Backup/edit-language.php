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
		
		$id = intval($_SESSION['fid']);
		
		if(isset($_POST['subcat']))
		{
			
			header("location: subcategory.php");
			
		}
		
		
		
		if(isset($_POST['updatee']))
		{
			
			$title = addslashes($_POST['title']);
			$titlearab = addslashes($_POST['titlearab']);
			$screen = addslashes($_POST['screen']);
			
			
			$oldimage = $_POST['oldimage'];
			$oldimage2 = $_POST['oldimage2'];
			$file_name = $_FILES['image']['name'];
			
			if($file_name=="")
			{
				$file_name=$oldimage;
				
				}else{
				
				$file_name = $_FILES['image']['name'];
				$file_tmp = $_FILES['image']['tmp_name'];
				$temp = explode(".", $_FILES["image"]["name"]);
				$file_name = 'language' . round(microtime(true)) . '.' . end($temp);
				
				
				if($production=="1"){
					$file_type=$_FILES['image']['type'];
					$result = $s3->putObject([
					'Bucket' => $bucketName,
					'Key'    => $file_name,
					'ContentType'    => $file_type,
					'SourceFile' => $file_tmp			
					]);
					
				}
				else{
					
					move_uploaded_file($file_tmp, $imgloc . $file_name);
				}
				
				
			}
			
			
			
			
			$query = mysqli_query($con, "UPDATE language SET ln_name='$title',ln_name_arab='$titlearab',ln_image='$file_name'  WHERE ln_id =$id");
			
			
			
			if ($query) {
				
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog','Safety Updated')");
				
				$msg = "language Updated";
				} else {
				$error = "Something Wrong";
			}
		}
		
		
		$detail=array();
		
		$sql = "Select *  FROM language WHERE ln_id ='$id'";
		$result1 = $con->query($sql);	
		while($row1 = $result1->fetch_assoc()) 
		{	
			array_push($detail,$row1);
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
												<li class="breadcrumb-item active"><?php mylan("Edit Safety "," تحرير الأمان"); ?></li>
											</ol>
										</div>
										<h4 class="page-title"><?php mylan("View/Edit   ","معاينة ما تم تحريره "); ?><?=ucwords($screenname);?> Language</h4>
										<a href="language.php" class="btn btn-primary m-2" ><?php mylan("Back ","عودة "); ?></a>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<h4 class="header-title"></h4>
											
										</p>
										
										
										<form class="form" method="post" enctype="multipart/form-data">
											<div class="row">
												
												
												
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="validationCustom01">Name</label>
														<input type="text" class="form-control" name="title" value="<?=$detail[0]['ln_name']; ?>" required>
													</div>
												</div>
												
												
												
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="validationCustom01">Name in arabic</label>
														<input type="text" class="form-control" name="titlearab" value="<?=$detail[0]['ln_name_arab']; ?>" required>
														
													</div>
												</div>
												
												
												
												
												
												
												
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="validationCustom03"><?php mylan("Image ","صورة "); ?></label>
														<input type="file" class="form-control-file" id="exampleInputFile" name="image"><br><br>
														<img src="<?php echo htmlentities($imgloc.$detail[0]['ln_image']); ?>" alt="image" class="img-fluid avatar-md rounded" onerror="this.src='assets/images/default-category.jpg'">
														<input type="hidden" name="oldimage" value="<?php echo htmlentities($detail[0]['ln_image']); ?>">
														
													</div>
												</div>
												
												
											</div>
											<button name="updatee" class="btn btn-primary" type="submit">Update</button>
										</form>    
										
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