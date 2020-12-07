<?php
session_start();
if($_SESSION["role"] != "OperationSupervisor"){
	$loginError = "You are not logged in or not OperationSupervisor";
    echo "<script type='text/javascript'>alert('$loginError');window.location.href='../../../index.html'</script>";
}	
?>
<html>
	<head>
		<title>Staff</title>
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../js/ajax/SearchAllSchedule.js"></script>
        <script src="../js/ajax/DeleteSchedule.js"></script>
    </head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Operation Supervisor</a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>
		  	<div class="collapse navbar-collapse" id="navbarNav">
		    	<ul class="navbar-nav">
					<li class="nav-item">
		        		<a class="nav-link" href="../../humanresource/view/ListStaff.php">Staff</a>
					</li>
					<li class="nav-item active">
		        		<a class="nav-link" href="ListSchedule.php">Schedule<span class="sr-only">(current)</span></a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="ListTask.php">Task Seluruh Staff</a>
		      		</li>
                    <li class="nav-item">
		        		<a class="nav-link" href="../../operationsupervisor/view/ListTaskPerStaff.php">Task Individu</a>
		      		</li>  
		    	</ul>
              </div>
            <div class="d-flex flex-row-reverse bd-highlight">
					<a class="btn btn-danger" href="../../LogoutController.php">Log Out</a>
			</div>
		</nav>
		<div class="container-fluid">
			<br>
			<a href="NewSchedule.php" class="btn btn-primary">+ Jadwal Baru</a>
            <br><br>
            <form autocomplete="off" method="post" action="" id="searchschedule">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-3">
                    <select class="form-control" name="role">
                        <option value="" disabled selected>Pilih salah satu pekerjaan</option>
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
                    <label class="col-sm-2 col-form-label">Hari</label>
                    <div class="col-sm-3">
                    <select class="form-control" name="day">
                        <option value="" disabled selected>Pilih salah satu hari</option>
                        <option value="1">Senin</option>
                        <option value="2">Selasa</option>
                        <option value="3">Rabu</option>
                        <option value="4">Kamis</option>
                        <option value="5">Jumat</option>
                        <option value="6">Sabtu</option>
                        <option value="7">Minggu</option>
                    </select>
                    </div>
                </div>
                
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-3">
                        <button class="btn btn-primary mb-2" name='submit'>Search</button>
                    </div>
                </div>
            </form>
            
            <h3 id="namaStaff">Jadwal Staff</h3>

			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Jam Awal</th>
						<th scope="col">Jam Akhir</th>
						<th scope="col">Lokasi</th>
						<th scope="col">Nama Staff</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody id="jadwalstaff">
				</tbody>
			</table>
		</div>	
	</body>
</html>