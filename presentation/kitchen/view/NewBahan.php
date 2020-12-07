<?php
session_start();
if($_SESSION["role"] != "Chef"){
	$loginError = "You are not logged in or not OperationSupervisor";
    echo "<script type='text/javascript'>alert('$loginError');window.location.href='../../../index.html'</script>";
}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Bahan</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="../js/ajax/CekID.js"></script>
	
</head>
<body>
	<div class="container">
		<br>
		<h1>New Bahan</h1>
		<br>
		<form autocomplete="off" method="post" action="" id="checkid">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Id</label>
				<div class="col-sm-3">
					<input type="text" name="id" required id="id" autofocus class="form-control">
					<div class='invalid-feedback'>
						There is duplicate Id, please enter new id for Ingredients
					</div>
				</div>
				<div id = "errorMsg"></div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Name</label>
				<div class='col-sm-3'>
					<input type="text" name="name" required id="name" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Quantity</label>
				<div class="col-sm-3">
					<input type="number" name="jumlah" required value="-" id="jumlah" class='form-control'>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Price</label>
				<div class="col-sm-3">
					<input type="text" name="harga" required id="harga" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Expired Date</label>
				<div class="col-sm-3">
					<input type="date" name="exp_date" required id="exp_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label"></label>
				<div class="col-sm-3">
					<button class="btn btn-primary mb-2" name='submit'>Save</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>