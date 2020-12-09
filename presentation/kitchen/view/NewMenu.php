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
	<title>New Menu</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="../js/ajax/CekMenu.js"></script>

</head>
<body>
	<div class="container">
		<br>
		<h1>New Menu</h1>
		<br>
		<form autocomplete="off" method="post" action="" id="checkmenu">
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
					<input type="text" name="name" required id="name" class="form-control" maxlength="20">
					<div class ="invalid-feedback">
						Menu udh ada
					</div>
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
				<label class="col-sm-2 col-form-label">Ingredients</label>
				<div class="col-sm-3">
					<?php
					include_once('../controller/BahanController.php');
					use presentation\kitchen\controller as Ctrl;
					
					$ctrl = new Ctrl\BahanController();
					$listBahan = $ctrl->getAll();
					
					foreach ($listBahan as $bahan) {
						echo "<input type='checkbox' name='bahan[]' value='".$bahan->getId()."' />".$bahan->getNama()."<br>";
					}
					
					?>
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
	<script type="text/javascript">
		var harga = document.getElementById("harga");
        harga.defaultValue = '0';

        harga.addEventListener('keyup', function(evt){
            var n = parseInt(this.value.replace(/\D/g,''),10);
            harga.value = n.toLocaleString();
        }, false);

    </script>
</body>
</html>