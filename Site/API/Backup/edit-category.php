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
		

		$id = intval($_SESSION['cid']);
        $screenname = $_SESSION['cat_screen'];
        $catid =  $_SESSION['cat_id'];
		
		if(isset($_POST['subcat']))
		{

			header("location: subcategory.php");
			
		}

		
		
		if(isset($_POST['updatee']))
		{
			
			$title = addslashes($_POST['title']);
			$titlearab = addslashes($_POST['titlearab']);
			$detail = addslashes($_POST['detail']);
			$detailarab = addslashes($_POST['detailarab']);
		

		
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
			
			
			
			$query = mysqli_query($con, "UPDATE category SET c_name='$title',c_name_arab='$titlearab',c_detail='$detail',c_detail_arab='$detailarab',c_image='$file_name',c_banner='$file_name2' WHERE c_id=$id");
			
			
			
			if ($query) {
				
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog','Category Updated')");
				
				$msg = "Category Updated";
				} else {
				$error = "Something Wrong";
			}
		}


		$categorydetail=array();
		
		$sql = "Select *  FROM category WHERE c_id='$id'";
		$result1 = $con->query($sql);	
		while($row1 = $result1->fetch_assoc()) 
		{	
			array_push($categorydetail,$row1);
		}

		$_SESSION['category'] = $categorydetail[0]['c_name'];
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
												<li class="breadcrumb-item active"><?php mylan("Edit Category "," تحرير الفئة "); ?></li>
											</ol>
										</div>
										<h4 class="page-title"><?php mylan("View/Edit   ","معاينة ما تم تحريره "); ?><?=ucwords($screenname);?> <?php mylan("Category  ","فئة "); ?></h4>
										<a href="<?=$screenname;?>-category.php" class="btn btn-primary m-2" ><?php mylan("Back ","عودة "); ?></a>
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
															<label for="validationCustom01"><?php mylan("Title ","عنوان "); ?> </label>
															<input type="text" class="form-control" name="title" value="<?=$categorydetail[0]['c_name']; ?>" required>
														</div>
													</div>
													
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("Name Arabic ","الاسم عربي"); ?></label>
															<input type="text" class="form-control" name="titlearab" value="<?=$categorydetail[0]['c_name_arab']; ?>" required>
															
														</div>
													</div>
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("Detail ","التفاصيل "); ?> </label>
															
															<textarea  class="form-control" rows="5" name="detail"><?=$categorydetail[0]['c_detail']; ?></textarea>
														</div>
													</div>
													
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("Detail Arabic ","التفاصيل عربي "); ?></label>
															
															<textarea  class="form-control" rows="5" name="detailarab"><?=$categorydetail[0]['c_detail_arab']; ?></textarea>
															
														</div>
													</div>
													
													
											
										
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom03"><?php mylan("Image ","صورة "); ?></label>
															<input type="file" class="form-control-file" id="exampleInputFile" name="image"><br><br>
															<img src="<?php echo htmlentities($imgloc.$categorydetail[0]['c_image']); ?>" alt="image" class="img-fluid avatar-md rounded" onerror="this.src='assets/images/default-category.jpg'">
															<input type="hidden" name="oldimage" value="<?php echo htmlentities($categorydetail[0]['c_image']); ?>">
															
														</div>
													</div>
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom03"><?php mylan("Banner ","لافتة "); ?></label>
															<input type="file" class="form-control-file" id="exampleInputFile" name="image2"><br><br>
															<img src="<?php echo htmlentities($imgloc.$categorydetail[0]['c_banner']); ?>" alt="image"  height='50px' onerror="this.src='assets/images/users/avatar-1.jpg'">
															<input type="hidden" name="oldimage2" value="<?php echo htmlentities($categorydetail[0]['c_banner']); ?>">
															
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