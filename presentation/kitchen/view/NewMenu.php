<?php
namespace presentation\kitchen\view;
use domain\kitchen\model as Model;
use presentation\kitchen\controller as Ctrl;

if (isset($_POST['submit'])){
	require_once('../controller/MenuController.php');
	require_once('../../../domain/kitchen/model/NewMenuModel.php');
	
	$newMenu = new Model\NewMenuModel();
	$newMenu->setId($_POST['id']);
	$newMenu->setNama($_POST['name']);
	$newMenu->setJenis($_POST['jenis']);
	$newMenu->setHarga($_POST['harga']);

	$ctrl = new Ctrl\MenuController();
	$ctrl->createNew($newMenu);

	header("Location: ListMenu.php");
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
		<h1>New Menu</h1>
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
				<label class="col-sm-2 col-form-label">Type</label>
				<div class="col-sm-3">
					<input type="text" name="jenis" required id="jenis" class='form-control'>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Price</label>
				<div class="col-sm-3">
					<input type="text" name="harga" required id="harga" class="form-control">
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