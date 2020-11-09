<html>
	<head>
		<title>Customer</title>
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
		      		<li class="nav-item">
		        		<a class="nav-link" href="ListReservation.php">Reservation</a>
		      		</li>
		      		<li class="nav-item  active">
		        		<a class="nav-link" href="">Customer<span class="sr-only">(current)</span></a>
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
			<a href="/receptionist/customer/newcustomer" class="btn btn-primary">+ New Customer</a>
			<br><br>
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Name</th>
						<th scope="col">KTP</th>
						<th scope="col">Vehicle Num</th>
						<th scope="col">Phone Num</th>
					</tr>
				</thead>
				<tbody>
					<?php

					session_start();
					$list = $_SESSION['listCustomer'];
					print_r($list);
					foreach ($list as $cust) {
						// var_dump($cust);

						echo "<tr>";
						echo "<td>".$cust['id']."</td>";
						echo "<td>".$cust['nama']."</td>";
						echo "<td>".$cust['nomorIdentitas']."</td>";
						echo "<td>".$cust['nomorKendaraan']."</td>";
						echo "<td>".$cust['nomorTelepon']."</td>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</div>	
	</body>
</html>