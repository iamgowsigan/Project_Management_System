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
		
		$id = intval($_SESSION['sid']);
		
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
				$file_name = 'category' . round(microtime(true)) . '.' . end($temp);
				
				
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
			
			
			
			
			$file_name2 = $_FILES['image2']['name'];
			
			if($file_name2=="")
			{
				$file_name2=$oldimage2;
				
				}else{
				
				$file_name2 = $_FILES['image2']['name'];
				$file_tmp2 = $_FILES['image2']['tmp_name'];
				$temp2 = explode(".", $_FILES["image2"]["name"]);
				$file_name2 = 'categoryban' . round(microtime(true)) . '.' . end($temp2);
				
				
				if($production=="1"){
					$file_type=$_FILES['image2']['type'];
					$result = $s3->putObject([
					'Bucket' => $bucketName,
					'Key'    => $file_name2,
					'ContentType'    => $file_type,
					'SourceFile' => $file_tmp2			
					]);
					
				}
				else{
					
					move_uploaded_file($file_tmp2, $imgloc . $file_name2);
				}
				
				
			}
			
			
			
			$query = mysqli_query($con, "UPDATE safety SET s_name='$title',s_name_arab='$titlearab',s_image='$file_name',screen='$screen' WHERE s_id =$id");
			
			
			
			if ($query) {
				
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog','Safety Updated')");
				
				$msg = "Category Updated";
				} else {
				$error = "Something Wrong";
			}
		}
		
		
		$safetydetail=array();
		
		$sql = "Select *  FROM safety WHERE s_id ='$id'";
		$result1 = $con->query($sql);	
		while($row1 = $result1->fetch_assoc()) 
		{	
			array_push($safetydetail,$row1);
		}
		
		$_SESSION['category'] = $safetydetail[0]['s_name'];
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
										<h4 class="page-title"><?php mylan("View/Edit   ","معاينة ما تم تحريره "); ?><?=ucwords($screenname);?> <?php mylan("Safety  ","أمان "); ?></h4>
										<a href="safety.php" class="btn btn-primary m-2" ><?php mylan("Back ","عودة "); ?></a>
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
														<label for="validationCustom01"><?php mylan("Safety Name ","اسم الأمان "); ?> </label>
														<input type="text" class="form-control" name="title" value="<?=$safetydetail[0]['s_name']; ?>" required>
													</div>
												</div>
												
												
												
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="validationCustom01"><?php mylan("Safety Name Arabic ","إسم الأمان عربي"); ?></label>
														<input type="text" class="form-control" name="titlearab" value="<?=$safetydetail[0]['s_name_arab']; ?>" required>
														
													</div>
												</div>
												
												
												<div class="col-6">
													<div class="form-group">
														<label for="cat">App Screen</label>
														<select class="select2 form-control" data-toggle="select2" name="screen" required>
															<option <?php if($safetydetail[0]['screen'] == '1') {echo 'selected';}?> value="1">Hotel</option>
															<option <?php if($safetydetail[0]['screen'] == '2') {echo 'selected';}?> value="2">Advendure</option>
															
															
														</select>
													</div>
												</div>
												
												
												
												
												
												<div class="col-6">
													<div class="form-group mb-3">
														<label for="validationCustom03"><?php mylan("Image ","صورة "); ?></label>
														<input type="file" class="form-control-file" id="exampleInputFile" name="image"><br><br>
														<img src="<?php echo htmlentities($imgloc.$safetydetail[0]['s_image']); ?>" alt="image" class="img-fluid avatar-md rounded" onerror="this.src='assets/images/default-category.jpg'">
														<input type="hidden" name="oldimage" value="<?php echo htmlentities($safetydetail[0]['s_image']); ?>">
														
													</div>
												</div>
												
												
											</div>
											<button name="updatee" class="btn btn-primary" type="submit"><?php mylan("Update Category "," تحديث الفئة "); ?></button>
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