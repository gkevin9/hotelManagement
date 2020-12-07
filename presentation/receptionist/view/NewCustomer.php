<?php
session_start();
if($_SESSION["role"] != "Receptionist"){
	$loginError = "You are not logged in or not OperationSupervisor";
    echo "<script type='text/javascript'>alert('$loginError');window.location.href='../../../index.html'</script>";
}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Customer</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="../js/PostNewCust.js"></script>
</head>
<body>
	<div class="container">
		<br>
		<h1>New Customer</h1>
		<br>
		<form autocomplete="off" method="post" id="newcustomer">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-3">
					<input type="text" name="nama" required id="nama" autofocus class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KTP</label>
				<div class='col-sm-3'>
					<input type="text" name="nomorIdentitas" required id="nomorIdentitas" class="form-control" maxlength="15">
					<div class='invalid-feedback'>
						There is duplicate KTP, please check again
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Vehicle Number</label>
				<div class="col-sm-3">
					<input type="text" name="nomorKendaraan" required value="-" id="nomorKendaraan" class='form-control'>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Phone Number</label>
				<div class="col-sm-3">
					<input type="text" name="nomorTelepon" required id="nomorTelepon" class="form-control">
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