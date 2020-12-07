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
		      		<li class="nav-item">
		        		<a class="nav-link" href="ListReservation.php">Reservation</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="ListCustomer.php">Customer</a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="#">Task</a>
		      		</li>
		      		<li class="nav-item  active">
		        		<a class="nav-link" href="#">Check Out</a>
					</li>
				</ul>	
			</div>
			<div class="d-flex flex-row-reverse bd-highlight">
				<button class="btn btn-danger">Log Out</button>
			</div>
		</nav>
		<div class="container-fluid">
			<br>
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
				$list = $controller->getAllWithCustStay();
				
				foreach ($list as $reservation) {
                    if($reservation['waktuCheckOut'] == '0000-00-00 00:00:00' && $reservation['status'] == 'DONE') {
                        echo "<tr>";
                        echo "<td>".$reservation['id']."</td>";
                        echo "<td>".$reservation['custId']."</td>";
                        echo "<td>".$reservation['custName']."</td>";
                        echo "<td>".$reservation['orang']."</td>";
                        echo "<td>".$reservation['checkin']."</td>";
                        echo "<td>".$reservation['lama']."</td>";
                        echo "<td>".$reservation['room']."</td>";
                        echo "<td>".$reservation['hp']."</td>";
                        echo "<td>".$reservation['status']."</td>";
                        
                        echo "<td><a class='btn btn-danger' href='Payment.php?id=".$reservation['id']."'>Checkout</a></td>";
                        echo "</tr>";
                    }
				}
				?>
				</tbody>
			</table>
		</div>	
	</body>
</html>