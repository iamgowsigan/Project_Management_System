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
		
		$pvid = intval($_GET['varid']);


		if(isset($_POST['updatee']))
		{
			
			$title = addslashes($_POST['title']);
			$titlearab = addslashes($_POST['titlearab']);
			$mrp = addslashes($_POST['mrp']);
			$sell = addslashes($_POST['sell']);
			
			$color = $_POST['pv_color'];
			$colorcode = substr($color,1);
			
			
			
			$query = mysqli_query($con, "UPDATE product_variant SET pv_title='$title',pv_title_arab='$titlearab',pv_sell='$sell',pv_mrp='$mrp',pv_color='$colorcode' WHERE pv_id=$pvid");
			
			if ($query) {
				
				
				$msg = "Product Updated";
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
												<li class="breadcrumb-item"><a href="dashboard.php"><?php mylan("Dashboard ","Dashboard "); ?></a></li>
												<li class="breadcrumb-item active"><?php mylan("Edit Variant ","تتحرير المتغير "); ?></li>
											</ol>
										</div>
										<h4 class="page-title"><?php mylan("Edit Variant ","تتحرير المتغير "); ?></h4>
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
											<a  class="btn btn-sm btn-primary m-2" href="edit-product.php"><?php mylan("Back ","عخلف  "); ?></a>
										</p>
										<?php
											
											$query1 = mysqli_query($con, "Select * from product_variant WHERE pv_id=$pvid");
											while ($rowp = mysqli_fetch_array($query1)) {


											?>							
											
											<form class="form" method="post" enctype="multipart/form-data">
												<div class="row">
													
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("Title ","عنوان "); ?> </label>
															<input type="text" class="form-control" name="title" value="<?=$rowp['pv_title']; ?>">
														</div>
													</div>
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("Title Arab","العنوان العربي  "); ?> </label>
															<input type="text" class="form-control" name="titlearab" value="<?=$rowp['pv_title_arab']; ?>">
														</div>
													</div>
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("MRP ","MRP "); ?> </label>
															<input type="number" class="form-control" name="mrp" value="<?=$rowp['pv_mrp']; ?>">
														</div>
													</div>
													
													
													
													<div class="col-6">
														<div class="form-group mb-3">
															<label for="validationCustom01"><?php mylan("Selling Price ","سعر البيع "); ?></label>
															<input type="number" class="form-control" name="sell" value="<?=$rowp['pv_sell']; ?>">
															
														</div>
													</div>
													
													 <!--<div class="col-6">
															<div class="form-group mb-3">
																<label for="validationCustom01"><?php mylan("Color ","اللون"); ?></label>
																	<select class="select2 form-control" data-toggle="select2" name="pv_color" >
																	
																	<?php
                                                                       $pvcolor = '#'.$rowp['pv_color'];
																		for($x=0;$x<sizeof($colorlist);$x++)
																		{    ?>
																		<option value="<?=$colorlist[$x]['lable'];?>"  <?php if(strpos($pvcolor ,$colorlist[$x]['lable'])!==false)echo"selected";?>><?=$colorlist[$x]['lable']; ?></option>
																	<?php } ?>
																</select>
																
																
															</div>
														</div>-->
													
													   <div class="col-6 mb-3">
														
															<label for="validationCustom01"><?php mylan("Color ","اللون"); ?></label>
															<div  class="colorPickSelector" id="colorPickSelector1" ></div>
															<input type="hidden" name="pv_color" id="pv_color" >

															<?php 
                                                            $pvcolor = '#'.$rowp['pv_color'];
															foreach($colorlist as $c){ if($c['lable'] == $pvcolor){ $oldcolor = $c['lable'];}} ?>
															<input type="hidden" id="oldcolor" value="<?=$oldcolor;?>">
														</div>
														

													
													
													
													
												</div>
												<button name="updatee" class="btn btn-primary" type="submit"><?php mylan("Update Variant ","متغير التحديث"); ?></button>
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
	<script src="assets/js/colorPick.js"></script>
	<script>
	      var arr = <?php echo json_encode($colorlist); ?>;
	      var old = document.getElementById('oldcolor').value;
	
		var colo = [];

	 arr.forEach(myFunction);
    
      $("#colorPickSelector1").colorPick({
			'initialColor' : old,
			'palette': colo,
			'onColorSelected': function() {
				this.element.css({'backgroundColor': this.color, 'color': this.color});
				document.getElementById('pv_color').value=this.color;
			
			}
			
		});

   function myFunction(item, index) {
  	colo.push(item['lable']);
}       
	</script>										
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