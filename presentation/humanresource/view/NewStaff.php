<?php
namespace presentation\receptionist\view;
use domain\humanresource\model as Model;
use presentation\humanresource\controller as Ctrl;

if (isset($_POST['submit'])){
	require_once('../controller/OperationController.php');
	require_once('../../../domain/humanresource/model/NewStaffModel.php');
	
	$id = $_POST['nama'][0].$_POST['nomorIdentitas'];
	
	$newStaff = new Model\NewStaffModel();
    $newStaff->setId($_POST['id']);
    $newStaff->setEmail($_POST['email']);
	$newStaff->setNama($_POST['nama']);
	$newStaff->setNomorHp($_POST['nomorHp']);
	$newStaff->setPassword($_POST['password']);
    $newStaff->setPekerjaan($_POST['role']);
    $newStaff->setStatus("Active");

	$ctrl = new Ctrl\OperationController();
	$ctrl->createNew($newStaff);

	header("Location: ListStaff.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>New Staff</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="../../public/js/postrequestcustomer.js"></script>
</head>
<body>
	<div class="container">
		<br>
		<h1>New Staff</h1>
		<br>
		<form autocomplete="off" method="post" action="" id="newcustomer">
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">ID</label>
				<div class='col-sm-3'>
					<input type="text" name="id" required id="id" class="form-control">
					<div class='invalid-feedback'>
						There is duplicate ID, please check again
					</div>
				</div>
            </div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-3">
					<input type="email" name="email" required id="email" autofocus class="form-control">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-3">
					<input type="text" name="nama" required id="nama" autofocus class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Phone Number</label>
				<div class="col-sm-3">
					<input type="text" name="nomorHp" required id="nomorHp" class="form-control">
				</div>
            </div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-3">
					<input type="password" name="password" required id="password" autofocus class="form-control">
				</div>
            </div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Role</label>
				<div class="col-sm-3">
                <select class="form-control" name="role">
                    <option value="Receptionist">Receptionist</option>
                    <option value="Chef">Chef</option>
                    <option value="OperationSupervisor">Operation Supervisor</option>
                    <option value="RoomService">Room Service</option>
                    <option value="Cashier">Cashier</option>
                    <option value="Housekeeper">Housekeeper</option>
                </select>
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