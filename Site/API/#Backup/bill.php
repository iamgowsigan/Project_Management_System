<?php
	session_start();
	include('includes/config.php');
	error_reporting(0);
	include 'includes/language.php';
	
	
		
		$orderid=$_GET['id'];
	
		$userid = $_GET['uid'];
		
		
		
		//GET ORDERS
		
		$orders=array();
		$products=array();
		$address=array();
		
		$sql3 = "SELECT orders.*,user.* FROM orders LEFT JOIN user ON user.u_id=orders.u_id WHERE orders.o_id=$orderid AND orders.u_id=$userid ORDER by o_id DESC";
		$result3 = $con->query($sql3);	
		if ($result3->num_rows >0) 
		{
			while($row3 = $result3->fetch_assoc()) 
			{	
				$getAddress=$row3['address_id'];
				$joinall=$row3;			
				array_push($orders,$joinall);
				
			}
			
		} 
		
		
		
		$sql4 = "SELECT cart.*,products.*,product_variant.* FROM cart 
		LEFT JOIN products ON products.p_id=cart.p_id 
		LEFT JOIN product_variant ON product_variant.pv_id=cart.variant 
		 WHERE cart.book_id=$orderid AND cart.product_type='REGULAR' ORDER by cart.cart_id DESC";
		
        // $result4 = mysqli_query($con,$sql4);

        $result4 = $con->query($sql4);	
		if ($result4->num_rows >0) 
		{
			while($row3 = $result4->fetch_assoc()) 
			{	
				
				$joinall=$row3;			
				array_push($products,$joinall);
				
			}
			
		} 
		
		
		$sql4 = "SELECT address.*,user.phone,user.u_id FROM address LEFT JOIN user ON user.u_id=address.u_id WHERE a_id=$getAddress";
		$result4 = $con->query($sql4);	
		if ($result4->num_rows >0) 
		{
			while($row3 = $result4->fetch_assoc()) 
			{	
				
				$joinall=$row3;			
				array_push($address,$joinall);
				
			}
			
		} 
		
		//END GET ORDERS
		
		
		
		
		if(isset($_POST['submit']))
		{
			
			$counts = addslashes($_POST['counts']);
			$amounts = addslashes($_POST['amounts']);
			$notes = addslashes($_POST['notes']);
			$bank = addslashes($_POST['bank']);
			
			$couponamount = addslashes($_POST['couponamount']);
			$couponcount = addslashes($_POST['couponcount']);
			
			$query = mysqli_query($con, "insert into shop_payments(u_id,sent_amount,bank_detail,booking_count,detail,coupon_amount,coupon_count) values('$id','$amounts','$bank','$counts','$notes','$couponamount','$couponcount')");
			
			
			if ($query) {
				
				$last_id = mysqli_insert_id($con);
				mysqli_query($con, "UPDATE cart SET admin_paid='1',admin_paid_id='$last_id',admin_paid_date=now() WHERE admin_paid='0' AND s_id=$id");
				
				
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
			<link href="assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
			<link href="assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
		</head>	
		<body class="loading" >
				
				<?php //include 'includes/left-navigation.php';?>
			
			
						<?php// include 'includes/top-menu.php';?>
					
							<!--<div class="row">
								<div class="col-12">
									<div class="page-title-box">
										<div class="page-title-right">
											<ol class="breadcrumb m-0">
												<li class="breadcrumb-item"><a href="javascript: void(0);"><?=$projectname;?></a></li>
												<li class="breadcrumb-item"><a href="dashboard.php"><?php mylan("Dashboard ","لوحة القيادة "); ?></a></li>
												<li class="breadcrumb-item active"><?php mylan("Orders ","طلب "); ?></li>
											</ol>
										</div>
										<h4 class="page-title"><?=$shopname;?></h4>
									</div>
								</div>
							</div> -->  
						<!-- container Start-->
								<?php //include 'includes/warnings.php';?>
								
								<!-- --------------->							
								<!-- container START-->							
								<!------------------>		
								
																
								
								<div class="row">
									<div class="col-12">
										<div class="card">
											<div class="card-body">
												
												<!-- Invoice Logo-->
												<div class="clearfix">
													<div class="float-left mb-3">
														<img src="assets/images/logo-light.png" alt="" height="30">
													</div>
													<div class="float-right">
														<h4 class="m-0 d-print-none"><?php mylan("Invoice ","فاتورة "); ?></h4><br>
																																			
																		
													</div>
												</div>
												
												<!-- Invoice Detail-->
												<div class="row">
													<div class="col-sm-6">
														<div class="float-left mt-3">
															<h4><b><?=$orders[0]['name']; ?></b></h4>
															<p class="text-muted font-13">#<?=$projectcode;?>U0<?=$orders[0]['u_id']; ?><br>
																<?=$orders[0]['phone']; ?><br><br>
															</p>
														</div>
														
													</div><!-- end col -->
													<div class="col-sm-4 offset-sm-2">
														<div class="mt-3 float-sm-right">
															<h3 class="float-right"><?php mylan("ORDER #00","طلب # 00"); ?><?=$orders[0]['o_id']; ?></h3><br>
															
																<h3  class="float-right"><?php if($orders[0]['status']=='P'){
																						echo '<span class="badge badge-warning ">PENDING</span>';
																					} ?>
																					
																					<?php if($orders[0]['status']=='A'){
																						echo '<span class="badge badge-success ">ACCEPTED</span>';
																					} ?>
																					
																					<?php if($orders[0]['status']=='S'){
																						echo '<span class="badge badge-info ">Order Sent</span>';
																					} ?>
																					
																					<?php if($orders[0]['status']=='D'){
																						echo '<span class="badge badge-primary ">Delivered</span>';
																					} ?>

																					<?php if($orders[0]['status']=='C'){
																						echo '<span class="badge badge-danger ">Cancelled</span>';
																					} ?>

																					<?php if($orders[0]['status']=='R'){
																						echo '<span class="badge badge-secondary ">Returned</span>';
																					} ?>
															 					</h3><br>
															 					<p class="float-right"> <?=date("d M, Y", strtotime($orders[0]['o_dated'])); ?></p>
														</div>

													</div><!-- end col -->
												</div>
												<!-- end row -->
												 <?php if($orders[0]['o_type'] == 'BIDDING'){?>
													<h3><span class="badge badge-primary-lighten ">Bidding</span></h3><br>
													   
												 <?php }else{?>
												 <h3><span class="badge badge-info-lighten ">Regular</span></h3>
												 
												 <?php }?>
												<div class="row">
											
													<div class="col-sm-4">
														<h6><?php mylan("Shipping Address ","عنوان الشحن "); ?></h6>
														<address>
															<small><?=$address[0]['a_name']; ?><br>
															<?php echo wordwrap($address[0]['a_address'],30,"<br>\n"); ?><br>
															<?=$address[0]['a_city']; ?><br>
															<?=$address[0]['a_country']; ?><br></small>
															
														</address>
														<h6><?php mylan("Shipping Time ","وقت الشحن "); ?></h6>
														
														  <p><?php 
														  
														  if($orders[0]['delivery_time'] != NULL){
														  echo date("d-m-Y H:i A",strtotime($orders[0]['delivery_time']));
														  }else{
															  echo "Any Preferred Time";
														  }
														  
														  ?></p>
													</div> <!-- end col-->
													
													<div class="col-sm-4">
														<address>
															
															<b><?php mylan("Order Type : ","نوع الطلب : "); ?></b> <?php if($orders[0]['method']=='pay'){
																echo 'Online Pay';
																}else{
																echo 'Cash On Delivery';
															} ?><br>
															<b><?php mylan("Transaction ID : ","رقم المعاملة : "); ?></b> <?=$orders[0]['trans_id']; ?><br>
															<b><?php mylan("Order CODE : ","رمز الطلب : "); ?></b> <?=$orders[0]['code']; ?><br>
															<b><?php mylan("Order Date : ","تاريخ الطلب : "); ?></b> <?=date("d M, Y", strtotime($orders[0]['o_dated'])); ?><br>
															
														</address>
													</div> <!-- end col-->
													
													<div class="col-sm-4">
														<?php if($orders[0]['method']=='pay'){
															echo '<img class="mr-3 rounded float-right" src="assets/paid.jpg" width="150" >';
															}else{
															echo '<img class="mr-3 rounded float-right" src="assets/cod.jpg" width="150" height="150" >';
														} ?>
														
														
													</div> <!-- end col-->
													
													
													
													
												</div>    
												<!-- end row -->        
												
												<div class="row">
													<div class="col-12">
														<div class="table-responsive">
															<table class="table mt-4">
																<thead>
																	<tr><th>#</th>
																		<th><?php mylan("Item ","العنصر "); ?></th>
																		
																		<th><?php mylan("Quantity "," كمية"); ?></th>
																		<th><?php mylan("Unit Cost ","تكلفة الوحدة "); ?></th>
																		<th><?php mylan("Coupon ","قسيمة "); ?></th>	
																		
																		<th class="text-right"><?php mylan("Total ","مجموع "); ?></th>
																	</tr></thead>
																	<tbody>
																		
																		
																		
																		<?php for($x=0; $x<sizeof($products); $x++){ ?>
																			<tr>
																				<td><?=$products[$x]['p_id']; ?></td>
																				<td>
																					
																					<div class="media">
																						<img class="mr-3 rounded" src="<?=$imgloc.$products[$x]['p_image'];?>" width="70" height="70" onerror="this.src='assets/images/users/avatar-1.jpg'">
																						
																						<div class="media-body">
																							<small><?=$projectcode; ?>P0<?=$products[$x]['p_id']; ?></small><br>
																							<b><?=$products[$x]['p_title']; ?></b> <br/>
																							
																							<?php mylan("Variant : ","البديل: "); ?> <?=($products[$x]['variant']!=null)? $products[$x]['pv_title']:'- - -'; ?>&nbsp;&nbsp;
																							<div style="width:20px;height:20px;background-color:#<?=$products[$x]['pv_color'];?>"></div>
																							
																						</div>
																					</div>
																					
																					
																				</td>
																				
																			
																				<td><?=$products[$x]['quantity']; ?></td>
																				<td><?=$products[$x]['purchase_price'].' '.$currency; ?></td>
																				<td><?=$products[$x]['coupon_price'].' '.$currency; ; ?></td>
																																								
																				<td class="text-right"><b><?=($products[$x]['purchase_price']*$products[$x]['quantity']).' '.$currency; ?></b></td>
																			</tr>
																			
																		<?php } ?>
																		
																		
																		
																		
																	</tbody>
															</table>
														</div> <!-- end table-responsive-->
													</div> <!-- end col -->
												</div>
												<!-- end row -->
												
												<div class="row">
													<div class="col-6">
														<div class="clearfix pt-3">
															<h6 class="text-muted"><?php mylan("Notes: "," ملاحظات:"); ?></h6>
															
															<small>
																<?php mylan("All accounts are to be paid within 7 days from receipt of
																	invoice. To be paid by cheque or credit card or direct payment
																	online. If account is not paid within 7 days the credits details
																	supplied as confirmation of work undertaken will be charged the
																	agreed quoted fee noted above. ","يجب دفع جميع الحسابات في غضون 7 أيام من استلامها
فاتورة. يُدفع بشيك أو ببطاقة ائتمان أو دفع مباشر
عبر الانترنت. إذا لم يتم دفع الحساب في غضون 7 أيام ، تفاصيل الاعتمادات
المقدمة كتأكيد على العمل المنجز سيتم فرض رسوم عليها
الرسوم المقتبسة المتفق عليها المذكورة أعلاه. "); ?>
															</small>
														</div>
													</div> <!-- end col -->
													<div class="col-6">
														<div class="mt-3 mt-sm-0">
															
															<div class='row'>
																<div class='col-8'><b class="float-right"><?php mylan("Total Items : "," إجمالي العناصر:"); ?></b></div>
																<div class='col-4 '><span class="float-right"><?=$orders[0]['quantity']; ?> <?php mylan("Item (s) ","بند "); ?></span></div>	
															</div>
															
															<div class='row'>
																<div class='col-8'><b class="float-right"><?php mylan(" Product Price :","سعر المنتج : "); ?></b></div>
																<div class='col-4 '><span class="float-right"><?=($orders[0]['product_price']-$orders[0]['offer_price']).' '.$currency; ?></span></div>	
															</div>
															
															
															<div class='row'>
																<div class='col-8'><b class="float-right"><?php mylan(" Delivery :","توصيل : "); ?></b></div>
																<div class='col-4 '><span class="float-right"><?=$orders[0]['delivery_cost'].' '.$currency; ?></span></div>	
															</div>
															
															<?php if($orders[0]['coupon_id']!='0'){ ?>
																<div class='row'>
																	<div class='col-8'><b class="float-right"><?php mylan("COUPON ","قسيمة "); ?> ( <?=$orders[0]['coupon_code']; ?> ) :</b></div>
																	<div class='col-4 '><span class="float-right" style="color:red;">- <?=$orders[0]['coupon_offer'].' '.$currency; ?></span></div>	
																</div>
															<?php } ?>
															
															<hr></hr>
															<div class='row'>
																<div class='col-8'><b class="float-right"><?php mylan("Tax "," ضريبة"); ?> ( <?=$orders[0]['tax_percentage'] ?> % ) :</b></div>
																<div class='col-4 '><span class="float-right"><?=$orders[0]['tax_cost'].' '.$currency; ?></span></div>	
															</div>
															
															<hr></hr>
															
															
															
															<h3  class="float-right mt-3 mt-sm-0"><?=$orders[0]['purchase_price'].' '.$currency; ?></h3>
															
														</div>
														<div class="clearfix"></div>
													</div> <!-- end col -->
												</div>
												<div class="d-print-none mt-4">
													<div class="text-right">
														
													
												
														<a href="javascript:window.print()" class="btn btn-primary"><i class="mdi mdi-printer"></i><?php mylan("Print ","مطبعة "); ?> </a>
														
													</div>
												</div>   
												<!-- end buttons -->
																						
											</div> <!-- end card-body-->
										</div> <!-- end card -->
									</div> <!-- end col-->
							
								<!-- end row -->
								
								
								<!-- --------------->							
								<!-- container End-->							
								<!------------------>							
						
			
						<!-- Footer Start -->
						<?php //include 'includes/footer.php';?>
					
				
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
				
				<!-- Apex js -->
				<script src="assets/js/vendor/apexcharts.min.js"></script>
				
				<!-- Todo js -->
				<script src="assets/js/vendor/jquery.dataTables.min.js"></script>
				<script src="assets/js/vendor/dataTables.bootstrap4.js"></script>
				<script src="assets/js/vendor/dataTables.responsive.min.js"></script>
				<script src="assets/js/vendor/responsive.bootstrap4.min.js"></script>
				
				<!-- Datatable Init js -->
				<script src="assets/js/pages/demo.datatable-init.js"></script>
				
				
			</body>
		</html>
																																			