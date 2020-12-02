<html>
	<head>
		<title>Staff</title>
        <link href="../../public/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../js/ajax/DoneTask.js"></script>
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
		        		<a class="nav-link" href="../../task/view/ListSchedule.php">Schedule</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="../../task/view/ListTask.php">Task Seluruh Staff</a>
		      		</li>
					<li class="nav-item active">
		        		<a class="nav-link" href="ListTaskPerStaff.php">Task Individu<span class="sr-only">(current)</span></a>
		      		</li>
		    	</ul>
		  	</div>
		</nav>
		<div class="container-fluid">
            <br>
            <h3>Tugas staff yang belum dikerjakan</h3>
            <br>
            <br>
            <table class="table table-hover">
				<thead class="thead-dark">
					<tr>
                        <th scope="col">Nomor</th>
						<th scope="col">Keterangan</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php
					//tadinya mau lewat customer controller, trus datanya disimpen di session
					//ternyata pas dikeluarin dari session, gabisa diambil object nya
					require_once('../controller/TaskController.php');
					require_once('../../../domain/task/model/NewTaskModel.php');

					use presentation\operationsupervisor\controller as Ctrl;
                    $controller = new Ctrl\TaskController();
                    session_start();
                    $email = $_SESSION["email"];
					$list = $controller->getAll($email);
					$pos = 1;

					foreach ($list as $task) {
						echo "<tr>";
						echo "<td>".$pos."</td>";
						echo "<td>".$task->getKeterangan()."</td>";
                        echo "<td>".$task->getTanggal()."</td>";
                        echo "<td><input type='button' value='Selesai' class='remove' name='remove' id='".$task->getId()."'/></td>";
						echo "</tr>";
						$pos+=1;
					}

					?>
				</tbody>
			</table>
		</div>	
	</body>
</html>