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
		
		if(isset($_POST['save']))
		{
			$pid = addslashes($_POST['pid']);
			
		    $_SESSION['pid']=$pid;
			
			header("location: edit-product.php");
			
		}	
		
		if(isset($_POST['review']))
		{
			$pid = addslashes($_POST['pid']);
			
		    $_SESSION['pid']=$pid;
			
			header("location: view-review.php");
			
		}	
		$sid= $_GET['sid'];
		$sname=$_GET['sname'];
		
		if($sid!=''){
			$_SESSION['sid']=$sid;
			$_SESSION['sname']=$sname;
			}else{
			
			$sid=$_SESSION['sid'];
			$sname=$_SESSION['sname'];
			
		}
		
		//ADD
		if(isset($_POST['submit']))
		{
			
			$file_name=Uploadimage('products','image');
			
			$field['title'] = addslashes($_POST['title']);
			$field['category'] = addslashes($_POST['category']);
			$field['p_subcategory'] = addslashes($_POST['p_subcategory']);
			$field['p_image'] = $file_name;
			
			$res=Insertdata("products",$field);
			if($res!=0){
				$msg = "Success ";
				header("location: ".$_SERVER['PHP_SELF']."?eid=".$res."&&edit=1");
				
				}else{
				$error = "Deleted ";
			} 
			
			
		}
		
		//Update
		if(isset($_POST['update']))
		{
			
			$eid=intval($_GET['eid']);
			$oldimage = $_POST['oldimage'];
			if($_FILES['image']['name']==''){
				$file_name=$oldimage;
				}else{
				$file_name=Uploadimage('products','image');
			}
			
			$field['title'] = addslashes($_POST['title']);
			$field['p_title_arab'] = addslashes($_POST['p_title_arab']);
			$field['p_sub'] = addslashes($_POST['p_sub']);
			$field['p_sub_arab'] = addslashes($_POST['p_sub_arab']);
			$field['category'] = addslashes($_POST['category']);
			$field['p_mrp'] = addslashes($_POST['p_mrp']);
			$field['p_sell'] = addslashes($_POST['p_sell']);
			$field['p_quantity'] = addslashes($_POST['p_quantity']);
			$field['p_unit'] = addslashes($_POST['p_unit']);
			$field['p_rating'] = addslashes($_POST['p_rating']);
			$field['p_count'] = addslashes($_POST['p_count']);
			$field['p_stock'] = addslashes($_POST['p_stock']);
			$field['p_stock_left'] = addslashes($_POST['p_stock_left']);
			$field['p_subcategory'] = addslashes($_POST['p_subcategory']);
			$field['p_detail'] = addslashes($_POST['p_detail']);
			$field['p_detail_arab'] = addslashes($_POST['p_detail_arab']);
			$field['p_units'] = addslashes($_POST['p_units']);
			$field['p_color'] = addslashes($_POST['p_color']);
			$field['p_image'] = $file_name;
			$field['screen'] = $sid;
			$val = $_GET['val'];
			
			$res=Updatedata("products",$field,"p_id =$eid");
			if($res!=0){
				
				$msg = "Success ";
				}else{
				$error = "something error ";
			}
			
			if($val=='A'){
				
				$getUser=Selectdata("SELECT notify.*, user.* FROM notify JOIN user ON user.u_id=notify.u_id");
				for($x=0;$x<sizeof($getUser);$x++){
					
					$imgurl='https://myktreat.com/mec/'.$img;
					require_once('firebase.php');
					
					sendMessage('Product Available Now',$title,$imgurl,$getUser[$x]['fbtoken']);
					
				}
				
			}
			
		}
		
		
		//delete
		if ($_GET['action'] == 'del' && $_GET['scid']) {
			$id = intval($_GET['scid']);
			$res=Deletedata("delete from products where p_id='$id'");
			header("location: ".$_SERVER['PHP_SELF']);
			$msg = "Deleted";
		}
		
		//statusactive
		if ($_GET['action'] == 'update' && $_GET['scid']) {
			$scid = intval($_GET['scid']);
			$val = $_GET['val'];
			$field['p_status'] = $val;
			$res=Updatedata("products",$field,"p_id=$scid");
			$msg = "Success ";
			//	header("location: ".$_SERVER['PHP_SELF']);
		}
		
		if ($_GET['action'] == 'stock' && $_GET['id']) {
			$id = intval($_GET['id']);
			$query = mysqli_query($con, "UPDATE products SET p_stock_left=p_stock WHERE p_id=$id");
			$msg = "Updated ";
			
		}
		
		
		//Screen Operations
		$edit=0;
		$eid='';
		if ($_GET['edit'] == 1) {
			$edit=1;
			$eid=intval($_GET['eid']);
		}
		
		if ($_GET['edit'] == 0) {
			$edit=0;
		}
		
	?>
	<!DOCTYPE html>
	<html lang="en">
		
		<head>
			<?php include 'includes/head.php';?>
			<link href="assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
			<link href="assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
			<link href="assets/css/vendor/summernote-bs4.css" rel="stylesheet" type="text/css" />
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
												<li class="breadcrumb-item active">Category</li>
											</ol>
										</div>
										<h4 class="page-title">Products Management</h4>
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
									
									<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#signup-modal">Add Product</button>
									<div class="col-lg-12">
										<div class="card">
											<div class="card-body">
												<table data-order='[[ 0, "desc" ]]' id="basic-datatable" class="table dt-responsive nowrap w-100">
													<thead>
														<tr>
															<th><?php mylan("ID ","ID "); ?></th>
															<th><?php mylan("Image ","صورة"); ?></th>
															<th><?php mylan("Title ","عنوان "); ?></th> 
															<th><?php mylan("Code ","شفرة "); ?></th>
															<th><?php mylan("Reviews ","المراجعات "); ?></th>
															<th><?php mylan("Category ","فئة "); ?></th> 
															<th><?php mylan("Price ","السعر "); ?></th>
															<th><?php mylan("Stock ","مخزون "); ?></th>
															<th>Active</th>
															<th><?php mylan("Action ","عمل"); ?></th>
														</tr>
													</thead>
													<tbody>
														<?php
															
															$listdata=Selectdata("SELECT p.*,c.*,s.* from products p LEFT JOIN category c ON p.c_id=c.c_id LEFT JOIN subcategory s ON p.sc_id = s.sc_id");
															
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
																			
																		?>
																		<tr>
																			
																			<td><?php text( $row['p_id'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																			
																			<td><?php image( $row['p_image'],'60','60','cover'  ); ?></td>
																			
																			<td><?php text( substr($row['p_title'],0,30), $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?>
																				<br>
																				<?php text( substr($row['p_sub'],0,20), $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?>
																			</td>
																			
																			<td><?php text( $projectcode.$row['p_id'], $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?>
																				<br>
																				<?php text( $row['p_code'], $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?>
																			</td>
																			
																			<td>
																				<div class="rateit rateit-mdi" data-rateit-mode="font" data-rateit-icon=""  data-rateit-value="<?php if($row['p_count']!=0)echo $row['p_rating']/$row['p_count']; ?>" data-rateit-ispreset="true" data-rateit-readonly="true" style="font-size:15px">
																				</div> 
																				<br><span class="badge badge-primary-lighten"><?php echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM product_views WHERE p_id='$pid'")) ?> Views</span>
																				
																				
																			</td>
																			
																			<td><?php text( $row['c_name'], $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?>
																				<br>
																				<?php text( $row['sc_name'], $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?>
																			</td>
																			
																			<td><?php text( $row['p_sell'].' AED', $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?>
																				<br>
																				<?php text( $row['p_quantity'].' piece', $strong=false, $small=true, $badge=false, $lighten=false, $outline=false, '' ); ?>
																			</td>
																			
																			<td>
																				<div class="progress progress-md mb-1">
																					<div class="progress-bar <?php  if(($row['p_stock_left']/$row['p_stock'])*100>20){echo 'bg-info';}else{ echo 'bg-danger';} ;?>" role="progressbar" style="width: <?php echo (($row['p_stock_left']/$row['p_stock'])*100) ;?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
																				</div>
																				
																				<code >
																					<?php echo $row['p_stock_left'];?> &nbsp;/&nbsp;<?php echo $row['p_stock'];?>
																				</code>
																				
																				<a href="<?=$_SERVER['PHP_SELF']; ?>?id=<?=$row['p_id']; ?>&action=stock" > <i class="mdi mdi-reload"></i></a>
																				
																			</td>
																			
																			<td><?php statusactive(  $row['p_id'],$row['p_status'] ,'A,D,E,H,S'); ?></td>
																			
																			<td><?php action($row['p_id'] ,'D,E'); ?></td>
																			
																			
																		</tr>
																	<?php } } ?>
															</tbody>
														</table> 
													</div> <!-- end card-body-->
												</div> <!-- end card-->
											</div> <!-- end col-->		
										<?php  } ?>
										<!--LIST VIEW END-->
										
										
										<!--EDIT VIEW-->
										<?php if($edit==1){ ?>
											
											<div class="col-lg-12">
												<a class="btn btn-primary m-2" href="<?=$_SERVER['PHP_SELF']; ?>?edit=0" >Back</a>
												
												<div class="row">
													
													<?php
														$listdata=Selectdata("Select * from products WHERE p_id=$eid");
														foreach ($listdata as $row) {
														?>
														
														<form class="form" method="post" enctype="multipart/form-data">
															<div class="col-lg-12">
																<div class="card">
																	<div class="card-body">
																		<h4>Basic</h4>
																		<div class="row">
																			
																			<?php  forminput(  'Title',  'p_title',  $row['p_title'] ,  'required',  '6',  'text'  ); ?>
																			<?php  forminput(  'Title Arab',  'p_title_arab',  $row['p_title_arab'],  'required',  '6',  'text'  ); ?>
																			<?php  forminput(  'Sub Title',  'p_sub',  $row['p_sub'],  'required',  '6',  'text'  ); ?>
																			<?php  forminput(  'Sub Title Arab',  'p_sub_arab',  $row['p_sub_arab'],  'required',  '6',  'text'  ); ?>
																			<?php  
																				$menudata=Selectdata("SELECT * FROM category ORDER BY c_id ASC");
																			formselect(  'Category',  'c_id', $menudata, 'required','6', $row['c_id'], 'c_id', 'c_name' ); ?>
																			<?php  
																				$menudata=Selectdata("SELECT * FROM subcategory Order BY sc_name ASC");
																			formselect(  'Sub Category',  'sc_id', $menudata, 'required','6', $row['sc_id'], 'sc_id', 'sc_name' ); ?>
																			
																		</div>
																	
																	</div> <!-- end card-body-->
																	</div> <!-- end card-->
																	</div> <!-- end col-->		
																	
																	
																	
																	<div class="col-lg-12">
																	<div class="card">
																	<div class="card-body">
																	<h4>Price & Units</h4>
																	<div class="row">
																	<?php  forminput(  'Original Price',  'p_mrp',  $row['p_mrp'],  'required',  '6',  'text'  ); ?>
																	<?php  forminput(  'Selling Price',  'p_sell',  $row['p_sell'],  'required',  '6',  'text'  ); ?>
																	<?php  forminput(  'Quantity',  'p_quantity',  $row['p_quantity'],  'required',  '6',  'text'  ); ?>
																	<?php  formselect(  'Unit',  'p_unit', $unitlist, 'required','6', $row['p_unit'], 'id', 'lable' ); ?>
																	<?php  forminput(  'Stock Count',  'p_stock',  $row['p_stock'],  'required',  '6',  'text'  ); ?>
																	<?php  forminput(  'Stock Left',  'p_stock_left',  $row['p_stock_left'],  'required',  '6',  'text'  ); ?>
																	
																	</div>
																	
																	</div> <!-- end card-body-->
																	</div> <!-- end card-->
																	</div> <!-- end col-->	
																	
																	<div class="col-lg-12">
																	<div class="card">
																	<div class="card-body">
																	<h4>Details & Image</h4>
																	<div class="row">
																	
																	<?php  formhtml( 'Detail',  'p_detail',  $row['p_detail'],  'required',  '6',  'basic'  ); ?>
																	<?php  formhtml( 'Detail',  'p_detail_arab',  $row['p_detail_arab'],  'required',  '6',  'basictwo'  ); ?>
																	
																	<?php  
																	$menudata=Selectdata("SELECT * FROM lable ORDER BY l_name ASC");
																	formselect(  'Product Label',  'l_id', $menudata, 'required','6', $row['l_id'], 'l_id', 'l_name' ); ?>
																	
																	<div class="col-6">
																	<label for="validationCustom01"><?php mylan("Color ","اللون"); ?></label>
																	<div  class="colorPickSelector" id="colorPickSelector1" name="p_color"></div>
																	<input type="hidden" name="p_color" id="p_color" >
																	</div>
																	<?php foreach($colorlist as $c){ if($c['id'] == $rowp['p_color']){ $oldcolor = $c['lable'];}} ?>
																	<input type="hidden" id="oldcolor" value="<?=$oldcolor;?>">
																	
																	<?php  formimage(  'Image',  'image',  $row['p_image'],  '',  '12',  'oldimage',  '80',  '50',  'cover'  ); ?>
																	
																	
																	</div>
																	
																	
																	</div> <!-- end card-body-->
																	</div> <!-- end card-->
																	</div> <!-- end col-->	
																	
																	<div class="card">
																	<div class="ml-2 float-left">
																	<h4><?php mylan("Filters / Options ","مرشحات / خيارات"); ?></h4>
																	
																	</div>
																	<div class="card-body">
																	<div class="row">
																	
																	
																	<div class="col-6">
																	<div class="form-group mb-3">
																	<label for="validationCustom01"><?php 
																	
																	foreach($filterlist as $filt){
																	if($filt['id'] == 1){
																	echo $filt['lable']; 
																	}
																	}?> 
																	</label>
																	
																	<select class="select2 form-control" data-toggle="select2" name="f1" >
																	<option value="" selected required>No Filter</option>
																	<?php
																	$ret=mysqli_query($con,"SELECT * FROM filter1 ORDER BY f1_name ASC");
																	while($result=mysqli_fetch_array($ret))
																	{    ?>
																	<option value="<?=$result['f1_id'];?>"  <?php if(strpos($rowp['f_1'],$result['f1_id'])!==false)echo"selected";?>><?=$result['f1_name'];?></option>
																	<?php } ?>
																	</select>
																	</div>
																	</div>
																	
																	<div class="col-6">
																	<div class="form-group mb-3">
																	<label for="validationCustom01"><?php 
																	
																	foreach($filterlist as $filt){
																	if($filt['id'] == 2){
																	echo $filt['lable']; 
																	}
																	}?>  </label>
																	
																	<select class="select2 form-control" data-toggle="select2" name="f2" >
																	<option value="" selected required>No Filter</option>
																	<?php
																	$ret=mysqli_query($con,"SELECT * FROM filter2 ORDER BY f2_name ASC");
																	while($result=mysqli_fetch_array($ret))
																	{    ?>
																	<option value="<?=$result['f2_id'];?>"  <?php if(strpos($rowp['f_2'],$result['f2_id'])!==false)echo"selected";?>><?=$result['f2_name'];?></option>
																	<?php } ?>
																	</select>
																	</div>
																	</div>
																	
																	<div class="col-6">
																	<div class="form-group mb-3">
																	<label for="validationCustom01"><?php 
																	
																	foreach($filterlist as $filt){
																	if($filt['id'] == 3){
																	echo $filt['lable']; 
																	}
																	}?> </label>
																	
																	<select class="select2 form-control" data-toggle="select2" name="f3" >
																	<option value="" selected required>No Filter</option>
																	<?php
																	$ret=mysqli_query($con,"SELECT * FROM filter3 ORDER BY f3_name ASC");
																	while($result=mysqli_fetch_array($ret))
																	{    ?>
																	<option value="<?=$result['f3_id'];?>"  <?php if(strpos($rowp['f_3'],$result['f3_id'])!==false)echo"selected";?>><?=$result['f3_name'];?></option>
																	<?php } ?>
																	</select>
																	</div>
																	</div>
																	<div class="col-6">
																	<div class="form-group mb-3">
																	<label for="validationCustom01"><?php 
																	
																	foreach($filterlist as $filt){
																	if($filt['id'] == 4){
																	echo $filt['lable']; 
																	}
																	}?> </label>
																	
																	<select class="select2 form-control" data-toggle="select2" name="f4" >
																	<option value="" selected required>No Filter</option>
																	<?php
																	$ret=mysqli_query($con,"SELECT * FROM filter4 ORDER BY f4_name ASC");
																	while($result=mysqli_fetch_array($ret))
																	{    ?>
																	<option value="<?=$result['f4_id'];?>"  <?php if(strpos($rowp['f_4'],$result['f4_id'])!==false)echo"selected";?>><?=$result['f4_name'];?></option>
																	<?php } ?>
																	</select>
																	</div>
																	</div>
																	
																	<div class="col-6">
																	<div class="form-group mb-3">
																	<label for="validationCustom01"><?php 
																	
																	foreach($filterlist as $filt){
																	if($filt['id'] == 5){
																	echo $filt['lable']; 
																	}
																	}?>  </label>
																	
																	<select class="select2 form-control" data-toggle="select2" name="f5" >
																	<option value="" selected required>No Filter</option>
																	<?php
																	$ret=mysqli_query($con,"SELECT * FROM filter5 ORDER BY f5_name ASC");
																	while($result=mysqli_fetch_array($ret))
																	{    ?>
																	<option value="<?=$result['f5_id'];?>"  <?php if(strpos($rowp['f_5'],$result['f5_id'])!==false)echo"selected";?>><?=$result['f5_name'];?></option>
																	<?php } ?>
																	</select>
																	</div>
																	</div>
																	
																	<div class="col-6">
																	<div class="form-group mb-3">
																	<label for="validationCustom01"><?php 
																	
																	foreach($filterlist as $filt){
																	if($filt['id'] == 6){
																	echo $filt['lable']; 
																	}
																	}?>  </label>
																	
																	<select class="select2 form-control" data-toggle="select2" name="f6" >
																	<option value="" selected required>No Filter</option>
																	<?php
																	$ret=mysqli_query($con,"SELECT * FROM filter6 ORDER BY f6_name ASC");
																	while($result=mysqli_fetch_array($ret))
																	{    ?>
																	<option value="<?=$result['f6_id'];?>"  <?php if(strpos($rowp['f_6'],$result['f6_id'])!==false)echo"selected";?>><?=$result['f6_name'];?></option>
																	<?php } ?>
																	</select>
																	</div>
																	</div>
																	
																	
																	</div>
																	
																	</div> <!-- end card-body-->
																	</div> <!-- end card-->
																	
																	</div> <!-- end col-->		
																	
																	<div class="col-lg-12">
																	<div class="card">
																	<div class="ml-2 ml-2">
																	<div class="float-left">
																	<h4><?php mylan("Product Images ","صور المنتج  "); ?></h4>
																	<p><?php mylan("Click image to delete ","اضغط على الصورة لحذفها  "); ?></p>
																	</div>
																	<div class="float-right">
																	
																	<button type="button" class="btn btn-sm btn-primary m-2" data-toggle="modal" data-target="#signup-modal3"><?php mylan("Add Images ","إضافة الصور "); ?></button>
																	</div>
																	</div>
																	
																	<div class="card-body">
																	
																	<?php
																	$query = mysqli_query($con, "Select * from product_images WHERE p_id='$pid'");
																	$cnt = 1;
																	while ($row = mysqli_fetch_array($query)) {
																	?>
																	
																	<a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?scid=<?php echo htmlentities($pid); ?>&delid=<?php echo htmlentities($row['pi_id']); ?>&&action=delimg"
																	onclick="return confirm('Are you sure you want to delete?');"><img src="<?=$imgloc.$row['pi_image']; ?>"height="80" style="border-radius: 10%;"> </a> 
																	
																	<?php }?>
																	
																	
																	</div> <!-- end card-body-->
																	</div> <!-- end card-->
																	</div> <!-- end col-->	
																	
																	<div class="col-lg-12">
																	<div class="card">
																	<div class="card-body">
																	
																	<div class="float-left">
																	<h4><?php mylan("Variants ","المتغيرات  "); ?></h4>
																	</div>
																	
																	<div class="float-right">
																	
																	<button type="button" class="btn btn-sm btn-primary m-2" data-toggle="modal" data-target="#signup-modal"><?php mylan("Add New ","اضف جديد"); ?></button>
																	</div>
																	<table id="basic-datatable" class="table dt-responsive nowrap w-100">
																	<thead>
																	<tr>
																	<th>ID</th>
																	<th><?php mylan("Title ","عنوان"); ?></th>
																	<th><?php mylan("Color","اللون"); ?></th>
																	<th><?php mylan("Price ","السعر"); ?></th>
																	
																	<th><?php mylan("Active ","نشيط"); ?></th>
																	<th><?php mylan("Action ","عمل"); ?></th>
																	</tr>
																	</thead>
																	<tbody>
																	<?php
																	
																	$listdata=Selectdata("Select * FROM product_variant WHERE p_id=$eid");
																	
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
																	
																	?>
																	<tr>
																	
																	<td><?php text( $row['pv_id'], $strong=false, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																	
																	<td><strong><?php echo htmlentities($row['pv_title']); ?></strong><br>
																	
																	<small><?php echo mysqli_num_rows(mysqli_query($con,"SELECT * FROM product_images WHERE pi_var=$eid"))?> Images</small>
																	</td>
																	
																	<td><span  style="border-radius: 5px;  color: black; padding: 5px;text-align: center;text-decoration: none;display: inline-block;font-size: 12px;cursor: pointer;background-color: #<?php echo $row['pv_color']; ?>"><?=$row['pv_color']; ?></span></td>
																	
																	<td><?php text( $row['pv_mrp'].$currency, $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?>
																	<br>
																	<?php text( $row['pv_sell'].$currency, $strong=true, $small=false, $badge=false, $lighten=false, $outline=false, '' ); ?></td>
																	
																	
																	
																	<td><?php active( $row['pv_active'],$row['pv_id']  ); ?></td> 	
																	
																	<td><?php action($row['pv_id'] ,'D,E'); ?></td>
																	
																	</tr>
																	<?php } } ?>
																	</tbody>
																	</table> 
																	</div> <!-- end card-body-->
																	</div> <!-- end card-->
																	<div class="float-right">
																	<button name="updatee" class="btn btn-primary " type="submit"><?php mylan("Update Product ","تحديث المنتج"); ?></button>
																	</div>				
																	</div> <!-- end col-->		
																	
																	
																	</form>    
																	
																	<?php }  ?>
																	
																	<?php  } ?>
																	
																	<!--Edit end-->			
																	
																	
																	
																	
																	
																	
																	
																	<!-- ADD new-->		
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
																	
																	
																	<?php  forminput(  'Name',  'c_name',  '',  'required',  '6',  'text'  ); ?>
																	<?php  forminput(  'Arab',  'c_name_arab',  '',  'required',  '6',  'text'  ); ?>
																	<?php  formtextarea(  'Detail',  'c_detail',  '',  'required',  '6',  'text'  ); ?>
																	<?php  formtextarea(  'Detail Arab',  'c_detail_arab',  '',  'required',  '6',  'text'  ); ?>
																	
																	
																	<?php  formimage(  'Image',  'image', '',  'required',  '6',  '',  '',  '',  'cover'  ); ?>
																	<?php  formimage(  'Banner',  'image2', '',  'required',  '6',  '',  '',  '',  'cover'  ); ?>
																	
																	
																	
																	
																	
																	</div>
																	
																	<div class="form-group text-center">
																	<button class="btn btn-primary" type="submit" name="submit">Add</button>
																	</div>
																	
																	</form>
																	
																	</div>
																	</div>
																	</div>
																	</div>
																	
																	<!-- ADD new End-->		
																	
																	
																	
																	
																	
																	
																	<!-- --------------->							
																	<!-- container End-->							
																	<!------------------>							
																	</div> 
																	</div> 
																	
																	<script>
																	document.addEventListener("DOMContentLoaded", function(event) { 
																	var scrollpos = localStorage.getItem('scrollpos');
																	if (scrollpos) window.scrollTo(0, scrollpos);
																	});
																	
																	window.onbeforeunload = function(e) {
																	localStorage.setItem('scrollpos', window.scrollY);
																	};
																	</script>									
																	<script>
																	$(document).ready(function(){
																	
																	
																	var sell = document.getElementById("p_sell").value;
																	var mrp = document.getElementById("p_mrp").value;
																	
																	
																	var discount = ((mrp-sell)/mrp) * 100;
																	
																	if(isNaN(discount)){
																	
																	discount = '0';
																	}
																	
																	
																	if(discount > '0'){
																	document.getElementById("smsg").style.display = "block";
																	document.getElementById("smsg").innerHTML = Math.round(discount) + "% discount" ;
																	document.getElementById("msg").style.display = "none";
																	}else{
																	document.getElementById("msg").style.display = "block";
																	document.getElementById("msg").innerHTML = Math.round(discount) + "% discount" ;
																	document.getElementById("smsg").style.display = "none";
																	
																	}
																	
																	
																	
																	
																	
																	$('.cate').change(function(){  
																	var cate = $('.cate').val();
																	
																	
																	$.ajax({url: "show-subcategory.php?cate=" + cate, cache: true, success: function (result) {
																	$("#show").html(result);
																	}});
																	
																	});
																	
																	
																	});
																	
																	
																	
																	$('#p_sell').change(function(){  
																	var sell = document.getElementById("p_sell").value;
																	var mrp = document.getElementById("p_mrp").value;
																	var discount = ((mrp-sell)/mrp) * 100;	
																	if(isNaN(discount)){
																	
																	discount = '0';
																	}
																	if(discount > '0'){
																	document.getElementById("smsg").style.display = "block";
																	document.getElementById("smsg").innerHTML = Math.round(discount) + "% discount" ;
																	document.getElementById("msg").style.display = "none";
																	}else{
																	document.getElementById("msg").style.display = "block";
																	document.getElementById("msg").innerHTML = Math.round(discount) + "% discount" ;
																	document.getElementById("smsg").style.display = "none";
																	
																	}
																	
																	});
																	
																	$('#p_mrp').change(function(){  
																	var sell = document.getElementById("p_sell").value;
																	var mrp = document.getElementById("p_mrp").value;
																	var discount = ((mrp-sell)/mrp) * 100;	
																	if(isNaN(discount)){
																	
																	discount = '0';
																	}
																	
																	
																	if(discount > '0'){
																	document.getElementById("smsg").style.display = "block";
																	document.getElementById("msg").style.display = "none";
																	document.getElementById("smsg").innerHTML = Math.round(discount) + "% discount" ;
																	
																	}else{
																	document.getElementById("msg").style.display = "block";
																	document.getElementById("smsg").style.display = "none";
																	document.getElementById("msg").innerHTML = Math.round(discount) + "% discount" ;
																	
																	
																	}
																	
																	});
																	
																	</script>
																	
																	
																	
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
																	<!-- end demo js-->
																	<script src="assets/js/vendor/summernote-bs4.min.js"></script>
																	<!-- Summernote demo -->
																	<script src="assets/js/pages/demo.summernote.js"></script>
																	
																	<!-- Datatable Init js -->
																	<script src="assets/js/pages/demo.datatable-init.js"></script>
																	<!-- end demo js-->
																	</body>
																	</html>
																	<?php } ?>																																																																																																																																																																																																																																																																																																																																																																																																																																																									