<html>
	<head>
		<title>Staff</title>
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../js/ajax/GetListTask.js"></script>
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
					<li class="nav-item">
		        		<a class="nav-link" href="ListSchedule.php">Schedule</a>
		      		</li>
		      		<li class="nav-item active">
		        		<a class="nav-link" href="ListTask.php">Task Seluruh Staff<span class="sr-only">(current)</span></a>
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
			<a href="NewTask.php" class="btn btn-primary">+ Tugas Baru</a>
            <br><br>
            <form autocomplete="off" method="post" action="" id="searchtask">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-3">
                    <select class="form-control" name="role" id="roleStaff">
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
            </form>
            
            <h3 id="namaStaff">Tugas Staff</h3>

			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Nama Staff</th>
						<th scope="col">Keterangan</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Status</th>
					</tr>
				</thead>
				<tbody id="task">
				</tbody>
			</table>
		</div>	
	</body>
</html>