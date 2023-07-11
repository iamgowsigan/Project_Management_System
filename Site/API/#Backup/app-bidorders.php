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
		
		
	//	$uid = intval($_SESSION['uid']);

		
		 if(isset($_POST['viewbutton']))
		{
			$orderid = addslashes($_POST['orderid']);
			$_SESSION['orderid']=$orderid;
			
			header("location: bidorder-view.php");
			
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
										<h4 class="page-title"><?php mylan("Bidding Orders Management "," إدارة أوامر العطاءات"); ?></h4>
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
									
											<table id="basic-datatable" class="table dt-responsive nowrap w-100">
												<thead>
													<tr>
														<th><?php mylan("ID ","ID "); ?></th>
														<th><?php mylan("Product ","المنتج "); ?></th>
														<th><?php mylan(" User"," مستخدم"); ?></th>
													
														<th><?php mylan("Method ","طريقة "); ?></th> 
													
														 <th><?php mylan("Price ","السعر "); ?></th>
														 <th><?php mylan("Coupon ","قسيمة "); ?></th>
														 <th><?php mylan("Address ","عنوان "); ?></th>
														 <th><?php mylan("Status "," حالة"); ?></th>
														<th><?php mylan("Action ","عمل "); ?></th>
													</tr>
												</thead>
												
												
												<tbody>
													<?php
														
														$query = mysqli_query($con, "SELECT u.name,u.phone,o.*,a.*,c.p_id from orders o LEFT JOIN user u ON o.u_id = u.u_id LEFT JOIN address a ON o.address_id=a.a_id LEFT JOIN (SELECT * FROM cart WHERE product_type='BIDDING' group by book_id ) c ON c.book_id = o.o_id WHERE o.o_type = 'BIDDING'");
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
																		$product_id = $row['p_id'];
                                                                       
                                                                         $qry = mysqli_query($con, "SELECT * FROM bid WHERE p_id='$product_id'");
                                                                         $prod= mysqli_fetch_array($qry);
																	?>
																	<tr>
																		<td><?php echo htmlentities($row['o_id']); ?></td>
																		<td>
																			<img src="<?php echo htmlentities($imgloc.$prod['p_image']); ?>" alt="image" style="object-fit:contain;width:80px;height:80px;" class="rounded img-thumbnail"  onerror="this.src='assets/images/default-product.png'">
																		</td>
																		<td><strong><?php echo htmlentities($row['name']); ?></strong><br><?=$projectcode.$row['u_id'];?></td>
																															
																		
																		<td>
																				<?php if($row['method'] == 'cod'){ ?>
																			<span class="badge badge-danger"><?php echo htmlentities($row['method']); ?></span>
                                                                           <?php }else{ ?>
                                                                            <span class="badge badge-success"><?php echo htmlentities($row['method']); ?></span>



                                                                         <?php  } ?>

																		</td> 
																		
																		<td><strong><?php echo htmlentities($row['purchase_price']); ?> AED</strong><br><?php echo htmlentities($row['quantity']); ?> Items</td>
																		
																		<td><span  style="color:blue;font-weight: bold"><?php if($row['coupon_id'] != '0'){echo htmlentities($row['coupon_code']); ?></span><br><small><?php echo htmlentities($row['coupon_offer']).' '.'AED';?></small>  <?php } else{echo 'No Coupon';}?></td>
																		<td><i class="mdi mdi-map-marker"></i> <?php echo htmlentities($row['a_city']); ?></td>
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