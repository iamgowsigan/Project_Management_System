<?php
	session_start();
	include('includes/config.php');
	error_reporting(0);
	include 'includes/language.php';
	include 'includes/country.php';
	include 'includes/dbhelp.php';
	include 'includes/formdata.php';
	
	if(strlen($_SESSION['login'])==0)
	{ 
		header('location:index.php');
	}
	else{
		$adminid=$_SESSION['userid'];
		
		$sid= $_GET['sid'];
		$sname=$_GET['sname'];
		
		if($sid!=''){
			$_SESSION['sid']=$sid;
			$_SESSION['sname']=$sname;
			}else{
			
			$sid=$_SESSION['sid'];
			$sname=$_SESSION['sname'];
			
		}
		
		
		if(isset($_POST['viewbutton']))
		{
			$orderid = addslashes($_POST['orderid']);
			$_SESSION['orderid']=$orderid;
			
			header("location: order-view.php");
			
		}
		
		$userdetail=array();
		
		$sql = "Select * FROM user WHERE u_id='$sid'";
		$result1 = $con->query($sql);	
		while($row1 = $result1->fetch_assoc()) 
		{	
			array_push($userdetail,$row1);
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
												<li class="breadcrumb-item active"><?php mylan(" View User","عرض المستخدم "); ?></li>
											</ol>
										</div>
										<h4 class="page-title"> <?php mylan("View User ","عرض المستخدم"); ?></h4>
										<a href="user.php" class="btn btn-primary m-2" ><?php mylan("Back ","خلف "); ?></a>
										
									</div>
								</div>
							</div>   
							<div class="row"><!-- container Start-->
								<?php include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
								
								<div class="col-xl-12 col-lg-12">
									
									<div class="card widget-flat h-75">
										<div class="card-body">
											<div class="row mb-2">
												
												<div class="col-sm-2">
													<img src="<?php echo htmlentities($imgloc.$userdetail[0]['profile_pic']); ?>"  style="width:100px;height:100px;object-fit:contain"  class="rounded-circle img-thumbnail" onerror="this.src='assets/images/bg-auth.jpg'">
												</div> <!-- end col-->
												
												<div class="col-sm-4">
													
													<small>
														<h4><?=$userdetail[0]['name'];?></h4>
														<b><?=$projectcode;?>U0<?=$userdetail[0]['u_id']; ?></b><br>
														<i class="mdi mdi-map-marker-alert"></i>&nbsp;&nbsp;<?=ArrayToName($userdetail[0]['city'],$statelist,'id','name'); ?>  <br>
														
													</small>
													
												</div> <!-- end col-->
												
												<div class="col-sm-4">
													<small>
														
														<a href="tell:<?=$userdetail[0]['phone']; ?>"><i class="mdi mdi-cellphone"></i>&nbsp;&nbsp;<?php echo htmlentities($userdetail[0]['phone']); ?></a><br>
														<i class="mdi mdi-email-multiple"></i>&nbsp;&nbsp;<?=$userdetail[0]['email']; ?><br>	
														<i class="mdi mdi-map-marker-alert"></i>&nbsp;&nbsp;<?=ArrayToName($userdetail[0]['country'],$countrylist,'phonecode','name'); ?>  <br>
														
													</small>
													
												</div> <!-- end col-->
												
												<div class="col-sm-2">
													
													<small>
														
														<i class=" mdi mdi-shield-star-outline"></i>&nbsp;&nbsp;<?=ArrayToName($userdetail[0]['expert'],$expertLevel,'id','label'); ?>  <br>
														
														<i class="mdi mdi-gender-male-female"></i>&nbsp;&nbsp;<?=$userdetail[0]['gender']; ?><br>
														
														<i class="mdi mdi-calendar"></i>&nbsp;&nbsp;<?= substr($userdetail[0]['dob'],0,10); ?><br>
													</small>
													
												</div> <!-- end col-->
												
											</div> <!-- end row -->
											
											
										</div> <!-- end card-body-->
									</div> <!-- end card--> 
								</div> <!-- end col-->
								
								<?php 
									
									cardMenu($lable='Favourites' ,$number=Countdata("SELECT * from product_like WHERE u_id=$sid").' Items', $url='favourites.php',$icon='mdi mdi-archive-outline' ,$size='3' ,'success' );
									cardMenu($lable='Cart' ,$number=Countdata("SELECT * from cart WHERE u_id=$sid AND book_id=0").' Items', $url='cart.php',$icon='mdi mdi-account-group' ,$size='3' ,'info' );
									cardMenu($lable='Wallet' ,$number=Countdata("SELECT * from wallet WHERE u_id=$sid").' Items', $url='wallet.php',$icon='mdi mdi-wallet' ,$size='3' ,'warning' );
									cardMenu($lable='Address' ,$number=Countdata("SELECT * from address WHERE u_id=$sid").' Items', $url='address.php',$icon='mdi mdi-map-marker' ,$size='3' ,'secondary' );
									
								?>
								
								
								<!--LIST VIEW-->
								<?php if($edit==0){ ?> 
									
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<h3 class="text-dark mt-0" ><?php mylan("Order List ","لائحة الطلبات "); ?></h3>
												<table data-order='[[ 0, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
													<thead>
														<tr>
															<th><?php mylan("ID ","ID "); ?></th>
															<th><?php mylan("Product ","المنتج "); ?></th>
															<th><?php mylan("Method ","طريقة "); ?></th> 
															
															<th><?php mylan("Price ","السعر "); ?></th>
															<th><?php mylan("Coupon ","قسيمة "); ?></th>
															<th><?php mylan("Address ","عنوان "); ?></th>
															<th><?php mylan("Status ","حالة "); ?></th>
															<th><?php mylan("Action ","عمل "); ?></th>
														</tr>
													</thead>
													<tbody>
														<?php
															
															$listdata=Selectdata("SELECT o.*,a.*,c.p_id from orders o LEFT JOIN address a ON o.address_id = a.a_id LEFT JOIN (SELECT * FROM cart WHERE u_id=$sid group by book_id) c ON c.book_id = o.o_id  WHERE o.u_id=$sid");
															
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
																			$qry = mysqli_query($con, "SELECT * FROM products WHERE p_id='$product_id'");
																			$prod= mysqli_fetch_array($qry);
																			
																		?>
																		<tr>
																			
																			<td><?php text( $row['o_id'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			
																			<td><?php image( $prod['p_image'],'80','80','cover'  ); ?></td>
																			
																			<td>
																				<?php if($row['method'] == 'cod'){ ?>
																					<span class="badge badge-danger"><?php echo htmlentities($row['method']); ?></span>
																					<?php }else{ ?>
																					<span class="badge badge-success"><?php echo htmlentities($row['method']); ?></span>
																				<?php  } ?>
																			</td> 
																			
																			<td><?php text( $row['purchase_price'].' AED', $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '',$icon='' ); ?>
																				<br><small><?php text( $row['quantity'].' items', $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '',$icon='' ); ?></small>
																			</td>
																			
																			<td><?php text( $row['coupon_code'], $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '',$icon='' ); ?>
																				<br><small><?php text( $row['coupon_offer'].' AED', $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '',$icon='' ); ?></small>
																			</td>
																			
																			<td><?php text( $row['a_city'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false,'', $icon='mdi mdi-map-marker' ); ?></td>
																			
																			<td>  	
																				<!-- Buttons-->	
																				<?php if($row['status']=='A'){ ?>
																					<span  class="badge badge-success" ><?php mylan("Accepted ","قبلت "); ?></button>
																					
																				<?php } ?>
																				
																				<?php if($row['status']=='P'){ ?>
																					<span  class="badge badge-info" ><?php mylan("Pending","قيد الانتظار "); ?></button>
																					
																					
																				<?php } ?>
																				
																				<?php if($row['status']=='D'){ ?>
																					<span  class="badge badge-success" ><?php mylan("Delivered","تم التوصيل "); ?></button>
																					
																					
																				<?php } ?>
																				<?php if($row['status']=='S'){ ?>
																					<span  class="badge badge-dark" ><?php mylan("Sent","أرسلت "); ?></button>
																					
																					
																				<?php } ?>
																				
																				<?php if($row['status']=='R'){ ?>
																					<span  class="badge badge-danger" ><?php mylan("Rejected ","مرفوض "); ?></button>
																					
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
						
						<!-- demo app -->
						<script src="assets/js/pages/demo.dashboard-crm.js"></script>
						<!-- end demo js-->
					</body>
					</html>
					<?php } ?>																																																																																																													