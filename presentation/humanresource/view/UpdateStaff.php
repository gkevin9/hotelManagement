<?php
    session_start();
    require_once('../../../domain/humanresource/entity/Staff.php');
    $staff = unserialize($_SESSION['staff']);

    use domain\humanresource\model as Model;
    use presentation\humanresource\controller as Ctrl;
    if (isset($_POST['submit'])) {
        require_once('../controller/OperationController.php');
        require_once('../../../domain/humanresource/model/NewStaffModel.php');
        
        $newStaff = new Model\NewStaffModel();
        $newStaff->setId($staff->getId());
        $newStaff->setEmail($_POST['email']);
        $newStaff->setNama($_POST['nama']);
        $newStaff->setNomorHp($_POST['nomorHp']);
        $newStaff->setPassword($_POST['password']);
        $newStaff->setPekerjaan($staff->getPekerjaan());
        $newStaff->setStatus($_POST['status']);

        $ctrl = new Ctrl\OperationController();
        $ctrl->updateStaff($newStaff);

        header("Location: ListStaff.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Staff</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="../../public/js/postrequestcustomer.js"></script>
</head>
<body>
	<div class="container">
		<br>
		<h1>Update Staff</h1>
		<br>
		<form autocomplete="off" method="post" action="" id="newcustomer">
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">ID</label>
				<div class='col-sm-3'>
					<input type="text" name="id" required id="id" class="form-control" readonly="readonly" value="<?php echo $staff->getId()?>">
				</div>
            </div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-3">
					<input type="email" name="email" required id="email" autofocus class="form-control" value="<?php echo $staff->getEmail()?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Name</label>
				<div class="col-sm-3">
					<input type="text" name="nama" required id="nama" autofocus class="form-control" value="<?php echo $staff->getNama()?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Phone Number</label>
				<div class="col-sm-3">
					<input type="text" name="nomorHp" required id="nomorHp" class="form-control" value="<?php echo $staff->getNomorHp()?>">
				</div>
            </div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-3">
					<input type="password" name="password" required id="password" autofocus class="form-control" value="<?php echo $staff->getPassword()?>">
				</div>
            </div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Role</label>
				<div class='col-sm-3'>
					<input type="text" name="role" required id="role" class="form-control" readonly="readonly" value="<?php echo $staff->getPekerjaan()?>">
				</div>
            </div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-3">
                
                <select class="form-control" name="status">
                    <?php 
                        if ($staff->getStatus()=="Active") {
                            echo "<option value='Active' selected>Active</option>";
                            echo "<option value='Inactive'>Inactive</option>";
                        }else {
                            echo "<option value='Active'>Active</option>";
                            echo "<option value='Inactive' selected>Inactive</option>";
                        }
                    ?>
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