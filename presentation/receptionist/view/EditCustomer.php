<?php
namespace presentation\receptionist\view;
session_start();
if($_SESSION["role"] != "Receptionist"){
	$loginError = "You are not logged in or not OperationSupervisor";
    echo "<script type='text/javascript'>alert('$loginError');window.location.href='../../../index.html'</script>";
}	
require_once('../controller/CustomerController.php');
use domain\guest\model as Model;
use presentation\receptionist\controller as Ctrl;

if (isset($_POST['submit'])){
	require_once('../controller/CustomerController.php');
	require_once('../../../domain/guest/model/NewCustomerModel.php');
	require_once('../../../showErr.php');
	$newCust = new Model\NewCustomerModel();
	$newCust->setNama($_POST['nama']);
	$newCust->setNomorIdentitas($_GET['id']);
	$newCust->setNomorKendaraan($_POST['nomorKendaraan']);
	$newCust->setNomorTelepon($_POST['nomorTelepon']);

	$ctrl = new Ctrl\CustomerController();
	$ctrl->update($newCust);

	header("Location: ListCustomer.php");
}

$ctrl = new Ctrl\CustomerController();
$custData = $ctrl->getSelected($_GET['id']);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Customer</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="../../public/js/postrequestcustomer.js"></script>
</head>
<body>
	<div class="container">
		<br>
		<h1>Edit Customer</h1>
		<br>
		<form autocomplete="off" method="post" action="" id="newcustomer">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-3">
					<input type="text" name="nama" required id="nama" autofocus class="form-control" value="<?php echo $custData->getNama();?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">KTP</label>
				<div class='col-sm-3'>
					<input type="text" name="nomorIdentitas" required id="nomorIdentitas" class="form-control" value="<?php echo $custData->getNomorIdentitas(); ?>" disabled>
					<div class='invalid-feedback'>
						There is duplicate KTP, please check again
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Vehicle Number</label>
				<div class="col-sm-3">
					<input type="text" name="nomorKendaraan" required value="<?php echo $custData->getNomorKendaraan(); ?>" id="nomorKendaraan" class='form-control'>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Phone Number</label>
				<div class="col-sm-3">
					<input type="text" name="nomorTelepon" required id="nomorTelepon" class="form-control" value="<?php echo $custData->getNomorTelepon(); ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label"></label>
				<div class="col-sm-3">
					<button class="btn btn-primary mb-2" name='submit'>Save Edit</button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>