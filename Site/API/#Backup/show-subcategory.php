<?php
	session_start();
	include('includes/config.php');
	error_reporting(0);
	include 'includes/language.php';
	
	
	$cat = $_GET['cate'];
?>

<div class="form-group mb-3">
	<label for="validationCustom01"><?php mylan("Sub Category ","تصنيف فرعي "); ?> </label>
	
	<select class="select2 form-control" data-toggle="select2" name="p_subcategory" id="p_subcategory">
		<option value="" ><?php mylan("Choose... ","Choose..."); ?></option>
		<?php
			
			$subquery=mysqli_query($con,"SELECT * FROM subcategory WHERE c_id=$cat ORDER BY sc_name ASC");
			
			while($result=mysqli_fetch_array($subquery))
			{    ?>
			<option value="<?=$result['sc_id'];?>"  <?php if(strpos($rowp['sc_id'],$result['sc_id'])!==false)echo"selected";?>><?=$result['sc_name'];?></option>
		<?php } ?>
	</select>
	
	
</div>