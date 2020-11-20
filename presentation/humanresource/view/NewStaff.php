<!DOCTYPE html>
<html>
<head>
	<title>New Staff</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="../js/ajax/ValidateStaff.js"></script>
</head>
<body>
	<div class="container">
		<br>
		<h1>New Staff</h1>
		<br>
		<form autocomplete="off" method="post" action="" id="newstaff">
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-3">
					<input type="email" name="email" required id="email" autofocus class="form-control">
					<div class="invalid-feedback">Email sudah ada</div>
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