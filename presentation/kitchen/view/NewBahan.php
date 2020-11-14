<?php
namespace presentation\kitchen\view;
use domain\kitchen\model as Model;
use presentation\kitchen\controller as Ctrl;

if (isset($_POST['submit'])){
	require_once('../controller/BahanController.php');
	require_once('../../../domain/kitchen/model/NewBahanModel.php');
	
	$newCust = new Model\NewBahanModel();
	$newCust->setId($_POST['id']);
	$newCust->setNama($_POST['name']);
	$newCust->setJumlah($_POST['jumlah']);
	$newCust->setHarga($_POST['harga']);
	$newCust->setExpDate($_POST['exp_date']);

	$ctrl = new Ctrl\BahanController();
	$ctrl->createNew($newCust);

	header("Location: ListBahan.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>New Bahan</title>
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
				<label class="col-sm-2 col-form-label">Id</label>
				<div class="col-sm-3">
					<input type="text" name="id" required id="id" autofocus class="form-control">
					<div class='invalid-feedback'>
						There is duplicate Id, please enter new id for Ingredients
					</div>
				</div>
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