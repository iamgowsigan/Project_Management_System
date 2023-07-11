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
		
	 
		 
		 if(isset($_POST['save']))
		{
			$pid = addslashes($_POST['pid']);
		
		    $_SESSION['pid']=$pid;

			header("location: edit-bidding.php");
		
			
		
	}	

	if(isset($_POST['bidding']))
		{
			$pid = addslashes($_POST['pid']);
		
		    $_SESSION['pid']=$pid;

			header("location: view-bidding.php");
		
			
		
	}	
	
	
		if(isset($_POST['submit']))
		{
			
			
			$title = addslashes($_POST['title']);
			$cid = addslashes($_POST['category']);
			$scid = addslashes($_POST['p_subcategory']);
			$file_name = $_FILES['image']['name'];
			$file_tmp = $_FILES['image']['tmp_name'];
			$temp = explode(".", $_FILES["image"]["name"]);
			$file_name = 'product' . round(microtime(true)) . '.' . end($temp);
			$ucode = substr(uniqid('', false), -10);
					
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


			
			
			$sql= "insert into bid(c_id,sc_id,p_title,p_image,p_status,p_code) values('$cid','$scid','$title','$file_name','H','$ucode')";
			
			$query = mysqli_query($con, $sql);

            


			
			if ($query) {
				$ulog=$_SESSION['login'];
				$query = mysqli_query($con, "insert into adminlog(name,action) values('$ulog',$name.'Added')");
				$msg = "added";
				$insertid = mysqli_insert_id($con);

				$_SESSION['pid'] = $insertid;
				
				
				header("location: edit-bidding.php");
               



				} else {
				
				$error = "Something Wrong".$sql;
				
			}
		}
		
		if ($_GET['action'] == 'update' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$val = $_GET['val'];
			$query = mysqli_query($con, "UPDATE products SET p_status='$val' WHERE p_id=$id");
			$msg = "Updated ";
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
												<li class="breadcrumb-item active"><?php mylan("Management ","إدارة "); ?></li>
											</ol>
										</div>
										<h4 class="page-title"><?php mylan("Bid Products Management ","إدارة منتجات العطاء "); ?></h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal"><?php mylan("Add Bid Product ","إضافة منتج العطاء"); ?></button>
								
								<div class="col-lg-12">
									<div class="card">
										
										
										
										
										<div class="card-body">
																				
											<table data-order='[[ 0, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th><?php mylan("ID ","ID "); ?></th>
														<th><?php mylan("Image ","صورة"); ?></th>
														<th><?php mylan(" Title","عنوان "); ?></th> 
														
														<th><?php mylan("Category ","فئة "); ?></th> 
													     <th><?php mylan("Price "," السعر"); ?></th>
														 <th><?php mylan("Bidders "," المزايدون"); ?></th>
														 <th><?php mylan("Winner ","الفائز "); ?></th>
														  <th><?php mylan("End Time ","وقت النهاية "); ?></th>
														<th><?php mylan("Action ","عمل"); ?></th>
													</tr>
												</thead>
												
												
												<tbody>
													<?php
														
														$query = mysqli_query($con, "SELECT p.*,c.*,s.*,user.* from bid p LEFT JOIN category c ON p.c_id=c.c_id LEFT JOIN subcategory s ON p.sc_id = s.sc_id LEFT JOIN user ON user.u_id=p.win_user");
														$cnt = 1;
														$rowcount = mysqli_num_rows($query);
														if ($rowcount == 0) {
														?>
														<tr>
															<td colspan="7" align="center">
																<h3 style="color:black"><?php mylan(" No record found","لا يوجد سجلات "); ?></h3>
															</td>
															</tr>
																<?php
																	} else {
																	while ($row = mysqli_fetch_array($query)) {
																		$pid = $row['p_id'];
                                                                       
									                                	$edt = $row['end_time'];
																		
										                              $ed = substr($edt,0,10);
										
										                              $et = substr($edt,11,5);

										                              $date =  date('Y-m-d H:i');

										                              $edati = $ed.' '.$et;
																	?>
																	<tr>
																		<td><?php echo htmlentities($row['p_id']); ?></td>
																		<td>
																			<img src="<?php echo htmlentities($imgloc.$row['p_image']); ?>"  width="70" height="70" class="rounded img-thumbnail" onerror="this.src='assets/images/default-product.png'">
																			
																		</td>
																		
																		<td>
																		
																		<strong><?php echo wordwrap($row['p_title'],20,"<br>\n"); ?></strong><br><small><?php echo substr($row['p_sub'],0,20);?></small>... <br><?=$projectcode.$row['p_id'];?><br><span class="badge badge-primary-lighten"><?php echo htmlentities($row['views']);  ?> Views</span></td> 
																		
																		
																		
																		<td><strong><?php echo htmlentities($row['c_name']); ?></strong><br> <small><?php echo htmlentities($row['sc_name']); ?></small></td> 
																		
																		<td><strong><?php echo htmlentities($row['p_price_latest']); ?> AED</strong><br><?php echo htmlentities($row['p_quantity']); ?>&nbsp;<?php foreach($unitlist as $unit){
																		if($unit['id'] == $row['p_unit']){echo $unit['lable'];} }?>	</td>
																														
																		 <td><span class="badge badge-info-lighten"><?php echo htmlentities(mysqli_num_rows(mysqli_query($con,"SELECT * FROM bidding WHERE p_id='$pid'"))); ?> Bidders</span><br>
																		</td>
																		<td> 
																		 <?php if($row['profile_pic'] != NULL){?>
																		 <img src="<?php echo htmlentities($imgloc.$row['profile_pic']); ?>"  width="50" height="50" style="" class="rounded" onerror="this.src='assets/images/users/avatar-1.jpg'"><br>
																		 <?php } ?>
																		 <?php echo htmlentities($row['name']); ?></td>
																		<td>
                                                                            <?=$edati;?><br>

																		 	<?php 
                                                                                if($date > $edati && $edt != NULL){?>
                                                                                	<span class="badge badge-danger-lighten">Expired</span>
                                                                               <?php }else if($date < $edati && $edt != NULL ){ ?>
																		 	           <span class="badge badge-secondary-lighten">Upcoming</span>

                                                                                <?php } ?>

																		 </td>
                                                                         <td>
                                                                          	
																			<!-- Buttons-->	
																			<?php if($row['p_status']=='A'){ ?>
																				<button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php mylan("Active ","نشيط"); ?></button>
																				
																			<?php } ?>
																			
																			<?php if($row['p_status']=='D'){ ?>
																				<button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php mylan("Deactive ","معطل"); ?></button>
																				
																			<?php } ?>
																			
																			<?php if($row['p_status']=='E'){ ?>
																				<button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php mylan("Deleted ","تم الحذف"); ?></button>
																				
																			<?php } ?>
																				<?php if($row['p_status']=='H'){ ?>
																				<button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php mylan("Hide ","إخفاء "); ?></button>
																				
																			<?php } ?>
																			
																			<?php if($row['p_status']=='S'){ ?>
																				<button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php mylan("Suspend ","تعليق"); ?></button>
																				
																			<?php } ?>
																			
																			<!-- Buttons Actions-->	
																			
																			
																			<div class="dropdown-menu">
																				
																				
																				<form  method="post" enctype="multipart/form-data">
																					
																			<input type="hidden" name="pid" value='<?=$row['p_id']; ?>'>
																				
																			
																					<button style="border:none;background-color:white" type="submit" name="save"><a class="dropdown-item"><?php mylan(" View / Edit","رأي / تعديل"); ?></a></button>
																					
																					
																				</form>

																				<form  method="post" enctype="multipart/form-data">
																					
																			        <input type="hidden" name="pid" value='<?=$row['p_id']; ?>'>
																				
																			
																					<button style="border:none;background-color:white" type="submit" name="bidding"><a class="dropdown-item"><?php mylan("View Biddings ","مشاهدة ملف المزايدات "); ?></a></button>
																					
																					
																				</form>
																				
																				
																				
																				<a class="dropdown-item" href="<?=$_SERVER['PHP_SELF']; ?>?scid=<?=$row['p_id']; ?>&&val=A&&action=update" ><?php mylan("Activate ","تفعيل"); ?></a>
																				
																				<a class="dropdown-item" href="<?=$_SERVER['PHP_SELF']; ?>?scid=<?=$row['p_id']; ?>&&val=D&&action=update"><?php mylan("Deactivate ","تعطيل"); ?></a>
                                                                                 <a class="dropdown-item" href="<?=$_SERVER['PHP_SELF']; ?>?scid=<?=$row['p_id']; ?>&&val=H&&action=update"><?php mylan("Hide ","إخفاء"); ?></a>
                                                                                 <a class="dropdown-item" href="<?=$_SERVER['PHP_SELF']; ?>?scid=<?=$row['p_id']; ?>&&val=S&&action=update"><?php mylan("Suspend ","تعليق"); ?></a>
                                                                                 <a class="dropdown-item" href="<?=$_SERVER['PHP_SELF']; ?>?scid=<?=$row['p_id']; ?>&&val=E&&action=update"><?php mylan("Delete ","حذف"); ?></a>
                                                                      
																				
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
																<span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
															</a>
														</div>
														
														<form class="pl-3 pr-3"  method="post" enctype="multipart/form-data">
															<div class="row">
																
																
																<div class="col-12">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("Title ","عنوان "); ?></label>
																		<input type="text" class="form-control" name="title" required>
																	</div>
																</div>
																<div class="col-12">
																	<div class="form-group mb-3">
																		<label for="validationCustom01"><?php mylan("Category ","فئة "); ?></label>
																
																		<select class="cate select2 form-control" data-toggle="select2" name="category" required>
																			<option value="" selected disabled>Choose...</option>
																			<?php 
                                                                             $pquery = mysqli_query($con,"SELECT * FROM category Order BY c_name ASC");
                                                                             while($catrow = mysqli_fetch_array($pquery)){                                                                            
																			?>
                                                                            <option value="<?=$catrow['c_id']?>"><?=$catrow['c_name']?></option>
                                                                            <?php } ?>
																		</select>
																	</div>
																</div>
																<div class="col-12">
																<div id="show"></div>
																	</div>														
											               																
																<div class="col-12">
																	<div class="form-group mb-3">
																		<label for="validationCustom03"><?php mylan("Image ","صورة "); ?></label>
																		<input type="file" class="form-control-file" id="exampleInputFile" name="image" required><br><br>
																	</div>
																</div>
																
																
															</div>
															
															<div class="form-group text-center">
																<button class="btn btn-primary" type="submit" name="submit"><?php mylan("Add Bid Product "," إضافة منتج العطاء"); ?></button>
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