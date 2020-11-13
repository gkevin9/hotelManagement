<html>
	<head>
		<title>Reservation</title>
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Navbar</a>
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
		        		<a class="nav-link" href="#">Task</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="#">Check Out</a>
		      		</li>
		    	</ul>
		  	</div>
		</nav>
		<div class="container-fluid">
			<br>
				<a href="reservation/newreservation" class="btn btn-primary">+ New Reservation</a>
			<br><br>
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Order Name</th>
						<th scope="col">Person Name</th>
						<th scope="col">Total Person</th>
						<th scope="col">Check In Date</th>
						<th scope="col">Day Staying</th>
						<th scope="col">Room</th>
						<th scope="col">Phone Num</th>
						<th scope="col">Status</th>
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
					echo "<td>".$reservation->getNamaPemesan()."</td>";
					echo "<td>".$reservation->getIdCust()."</td>";
					echo "<td>".$reservation->getBykOrang()."</td>";
					echo "<td>".$reservation->getTanggalCheckin()."</td>";
					echo "<td>".$reservation->getLama()."</td>";
					echo "<td>".$reservation->getIdKamar()."</td>";
					echo "<td>".$reservation->getNomorTelepon()."</td>";
					echo "<td>".$reservation->getStatus()."</td>";
					echo "</tr>";
				}
				?>
				</tbody>
			</table>
		</div>	
	</body>
</html>