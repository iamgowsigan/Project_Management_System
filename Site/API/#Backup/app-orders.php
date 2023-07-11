<?php
	session_start();
	include('includes/config.php');
	//error_reporting(0);
	include 'includes/language.php';
	include 'includes/dbhelp.php';
	include 'includes/formdata.php';
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		
		
		if(isset($_POST['viewbutton']))
		{
			$orderid = addslashes($_POST['orderid']);
			$_SESSION['orderid']=$orderid;
			
			header("location: order-view.php");
			
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
												<li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
												<li class="breadcrumb-item active">Management</li>
											</ol>
										</div>
										<h4 class="page-title"> Regular Orders Management</h4>
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								<!--LIST VIEW-->
								<?php if($edit==0){ ?> 
									
									<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal">Add New</button>
									
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<table data-order='[[ 0, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
													<thead>
														<tr>
															<th><?php mylan("ID ","ID "); ?></th>
															<th><?php mylan("Product "," "); ?></th>
															<th><?php mylan("User ","مستخدم "); ?></th>
															<th><?php mylan("Method ","طريقة "); ?></th> 
															<th><?php mylan("Price ","السعر "); ?></th>
															<th><?php mylan("Coupon ","قسيمة "); ?></th>
															<th><?php mylan("Address "," عنوان"); ?></th>
															<th><?php mylan("Status ","حالة "); ?></th>
															<th><?php mylan("Action ","عمل "); ?></th>
														</tr>
													</thead>
													<tbody>
														<?php
															
															$listdata=Selectdata("SELECT u.name,u.phone,o.*,a.*,c.p_id from orders o LEFT JOIN user u ON o.u_id = u.u_id LEFT JOIN address a ON o.address_id=a.a_id LEFT JOIN (SELECT * FROM cart WHERE product_type='REGULAR' group by book_id ) c ON c.book_id = o.o_id WHERE o.o_type = 'REGULAR'");
															
															if (sizeof($listdata) == 0) {
															?>
															<tr>
																<td colspan="7" align="center">
																	<h3 style="color:black"><?php mylan("No record found ","لا يوجد سجلات "); ?></h3>
																</td>
																<tr>
																	<?php
																		} else {
																		foreach ($listdata as $row) {
																			$product_id = $row['p_id'];
																			echo '<script>console.log("'.$product_id.'");</script>';
																			$qry = mysqli_query($con, "SELECT * FROM products WHERE p_id='$product_id'");
																			$prod= mysqli_fetch_array($qry);
																		?>
																		<tr>
																			
																			<td><?php text( $row['o_id'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			
																			<td><?php image( $prod['p_image'],'80','80','cover'  ); ?></td>
																			
																			<td><?php text( $row['name'], $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?>
																				<br>
																				<?php text( $projectcode.$row['u_id'], $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?>
																			</td>
																			
																			<td>
																				<?php if($row['method'] == 'cod'){ ?>
																					<span class="badge badge-danger"><?php echo htmlentities($row['method']); ?></span>
																					<?php }else{ ?>
																					<span class="badge badge-success"><?php echo htmlentities($row['method']); ?></span>
																					
																				<?php  } ?>
																			</td> 
																			
																			<td><?php text( $row['purchase_price'].' AED', $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?>
																				<br>
																			<?php text( $row['quantity'].' Items', $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			
																			<td><?php text( $row['coupon_code'], $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '',$icon='' ); ?>
																				<br><small><?php text( $row['coupon_offer'].' AED', $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '',$icon='' ); ?></small>
																			</td>
																			
																			<td><?php text( $row['a_city'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '', $icon='mdi mdi-map-marker' ); ?></td>
																			
																			<td>  	
																				<!-- Buttons-->	
																				<?php if($row['status']=='A'){ ?>
																					<span  class="badge badge-success" ><?php mylan("Accepted ","قبلت"); ?></button>
																					
																				<?php } ?>
																				
																				<?php if($row['status']=='P'){ ?>
																					<span  class="badge badge-info" ><?php mylan("Pending","قيد الانتظار"); ?></button>
																					
																					
																				<?php } ?>
																				
																				<?php if($row['status']=='D'){ ?>
																					<span  class="badge badge-success" ><?php mylan("Delivered","تم التوصيل"); ?></button>
																					
																					
																				<?php } ?>
																				<?php if($row['status']=='S'){ ?>
																					<span  class="badge badge-dark" ><?php mylan("Sent","أرسلت"); ?></button>
																					
																					
																				<?php } ?>
																				
																				<?php if($row['status']=='R'){ ?>
																					<span  class="badge badge-danger" ><?php mylan("Rejected ","مرفوض"); ?></button>
																					
																				<?php } ?>
																				
																			</td>
																			
																			<td>
																				
																				<form  method="post" enctype="multipart/form-data">
																					
																					<input type="hidden" name="orderid" value='<?=$row['o_id']; ?>'>
																					<button class="btn btn-light" type="submit" name="viewbutton"><i class="mdi mdi-arrow-right-bold"></i></button>
																					
																				</form>
																			</td>
																			
																		</tr>
																	<?php } } ?>
															</tbody>
														</table> 
													</div> <!-- end card-body-->
												</div> <!-- end card-->
											</div> <!-- end col-->		
										<?php  } ?>
										<!--LIST VIEW END-->
										
										
										
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