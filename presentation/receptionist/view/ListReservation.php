<html>
	<head>
		<title>Reservation</title>
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Receptionist</a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>
		  	<div class="collapse navbar-collapse" id="navbarNav">
		    	<ul class="navbar-nav">
		      		<li class="nav-item active">
		        		<a class="nav-link" href="#">Reservation <span class="sr-only">(current)</span></a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="ListCustomer.php">Customer</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="ListTaskPerStaff.php">Task</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="ListCheckOut.php">Check Out</a>
					</li>
				</ul>	
			</div>
			<div class="d-flex flex-row-reverse bd-highlight">
					<a class="btn btn-danger" href="../../LogoutController.php">Log Out</a>
			</div>
		</nav>
		<div class="container-fluid">
			<br>
				<a href="ChooseRoom.php" class="btn btn-primary">+ New Reservation</a>
			<br><br>
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Cust Id</th>
						<th scope="col">Cust Name</th>
						<th scope="col">Total Person</th>
						<th scope="col">Check In Date</th>
						<th scope="col">Day Staying</th>
						<th scope="col">Room</th>
						<th scope="col">Phone Num</th>
						<th scope="col">Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php
				require_once('../controller/ReservationController.php');

				use presentation\receptionist\controller as Ctrl;
				$controller = new Ctrl\ReserevationController();
				$list = $controller->getAll();
				
				foreach ($list as $reservation) {
					echo "<tr>";
					echo "<td>".$reservation->getId()."</td>";
					echo "<td>".$reservation->getNama()."</td>";
					echo "<td>".$reservation->getNamaPemesan()."</td>";
					echo "<td>".$reservation->getBykOrang()."</td>";
					echo "<td>".$reservation->getTanggalCheckin()."</td>";
					echo "<td>".$reservation->getLama()."</td>";
					echo "<td>".$reservation->getKamar()."</td>";
					echo "<td>".$reservation->getNomorTelepon()."</td>";
					echo "<td>".$reservation->getStatus()."</td>";
					if($reservation->getStatus() == "ACTIVE") {
						echo "<td><a href='../controller/CustomerCheckinController.php?id=".$reservation->getId()."'><button class='btn btn-warning'>Checkin</button></a></td>";
					}else {
						echo "<td><button class='btn btn-warning' disabled>Checkin</button></td>";
					}
					echo "</tr>";
				}
				?>
				</tbody>
			</table>
		</div>	
	</body>
</html>