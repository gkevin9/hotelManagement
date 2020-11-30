<html>
	<head>
		<title>Staff</title>
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Operation Supervisor</a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>
		  	<div class="collapse navbar-collapse" id="navbarNav">
		    	<ul class="navbar-nav">
					<li class="nav-item  active">
		        		<a class="nav-link" href="ListStaff.php">Staff<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
		        		<a class="nav-link" href="../../task/view/ListSchedule.php">Schedule</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="../../task/view/ListTask.php">Task Seluruh Staff</a>
		      		</li>
					<li class="nav-item">
		        		<a class="nav-link" href="../../operationsupervisor/view/ListTaskPerStaff.php">Task Individu</a>
		      		</li>
		    	</ul>
		  	</div>
		</nav>
		<div class="container-fluid">
			<br>
			<a href="NewStaff.php" class="btn btn-primary">+ New Staff</a>
			<br><br>
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Email</th>
						<th scope="col">Name</th>
						<th scope="col">Role</th>
						<th scope="col">Phone Num</th>
						<th scope="col">Status</th>
						<th scope="col">Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php
					//tadinya mau lewat customer controller, trus datanya disimpen di session
					//ternyata pas dikeluarin dari session, gabisa diambil object nya
					require_once('../controller/OperationController.php');
					require_once('../../../domain/humanresource/model/NewStaffModel.php');

					use presentation\humanresource\controller as Ctrl;
					$controller = new Ctrl\OperationController();
					$list = $controller->getAll();
					$pos = 0;

					foreach ($list as $staff) {
						echo "<tr>";
						echo "<td>".$staff->getEmail()."</td>";
						echo "<td>".$staff->getNama()."</td>";
						echo "<td>".$staff->getPekerjaan()."</td>";
                        echo "<td>".$staff->getNomorHp()."</td>";
						echo "<td>".$staff->getStatus()."</td>";
						echo "<form autocomplete='off' method='post' action='' id='editstaff'>";
						echo "<td><button class='btn btn-primary' type='submit' name='edit'>Edit</button></td>";
						echo "<input type='hidden' name='id' value='".$pos."'/>";
						echo "</form>";
						echo "</tr>";
						$pos+=1;
					}

					if (isset($_POST['edit'])) {
						$id = $_POST['id'];
						session_start();
						$staff_update = $list[$id];
						$_SESSION['staff'] = serialize($staff_update);
						header("Location: UpdateStaff.php");
					}
					?>
				</tbody>
			</table>
		</div>	
	</body>
</html>