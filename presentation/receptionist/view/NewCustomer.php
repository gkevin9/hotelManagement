<?php
namespace presentation\receptionist\view;
use domain\guest\model as Model;
use presentation\receptionist\controller as Ctrl;

if (isset($_POST['submit'])){
	require_once('../controller/CustomerController.php');
	require_once('../../../domain/guest/model/NewCustomerModel.php');
	
	$id = $_POST['nama'][0].$_POST['nomorIdentitas'];
	
	$newCust = new Model\NewCustomerModel();
	$newCust->setId($id);
	$newCust->setNama($_POST['nama']);
	$newCust->setNomorIdentitas($_POST['nomorIdentitas']);
	$newCust->setNomorKendaraan($_POST['nomorKendaraan']);
	$newCust->setNomorTelepon($_POST['nomorTelepon']);

	$ctrl = new Ctrl\CustomerController();
	$ctrl->createNew($newCust);

	header("Location: ListCustomer.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>New Customer</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="../../public/js/postrequestcustomer.js"></script>
</head>
<body>
	<div class="container">
		<br>
		<h1>New Customer</h1>
		<br>
		<form autocomplete="off" method="post" action="" id="newcustomer">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-3">
					<input type="text" name="nama" required id="nama" autofocus class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KTP</label>
				<div class='col-sm-3'>
					<input type="text" name="nomorIdentitas" required id="nomorIdentitas" class="form-control">
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