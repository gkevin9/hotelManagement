<?php
session_start();
if($_SESSION["role"] != "Receptionist"){
	$loginError = "You are not logged in or not OperationSupervisor";
    echo "<script type='text/javascript'>alert('$loginError');window.location.href='../../../index.html'</script>";
}	
?>
<html>
	<head>
		<title>Reservation</title>
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../../public/js/bootstrap.min.js"></script>
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
					if($reservation->getStatus() != "DONE") {
						echo "<tr>";
						echo "<td class='align-middle'>".$reservation->getId()."</td>";
						echo "<td class='align-middle'>".$reservation->getNama()."</td>";
						echo "<td class='align-middle'>".$reservation->getNamaPemesan()."</td>";
						echo "<td class='align-middle'>".$reservation->getBykOrang()."</td>";
						echo "<td class='align-middle'>".$reservation->getTanggalCheckin()."</td>";
						echo "<td class='align-middle'>".$reservation->getLama()."</td>";
						echo "<td class='align-middle'>".$reservation->getKamar()."</td>";
						echo "<td class='align-middle'>".$reservation->getNomorTelepon()."</td>";
						echo "<td class='align-middle'>".$reservation->getStatus()."</td>";
						if($reservation->getStatus() == "ACTIVE") {
							echo "<td><a href='../controller/CustomerCheckinController.php?id=".$reservation->getId()."'><button class='btn btn-warning'>Checkin</button></a>&nbsp";
							echo "<button type='button' class='btn btn-danger' onclick='openModal(".$reservation->getId().")'>X</button></td>";
						}else {
							echo "<td><button class='btn btn-warning' disabled>Checkin</button></td>";
						}
						echo "</tr>";
					}
				}
				?>
				</tbody>
			</table>
		</div>
		<div class="modal fade" id="cancleModal" tabindex="-1" aria-labelledby="cancleModal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body">
						<div class="alert alert-danger" role="alert">
							Membatalkan reservasi tidak dapat dikembalikan! Anda yakin?
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" value="0" id="idReservation">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
						<button type="button" class="btn btn-danger" onclick="cancleReservation()">Ya</button>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script>
		function cancleReservation() {
			var id = $('#idReservation').val();
			window.location.replace('../controller/ReservationCancleController.php?id=' + id);
		}

		function openModal(id) {
			var modal = new bootstrap.Modal(document.getElementById('cancleModal'), {keyboard: false});
			modal.toggle();
			$('#idReservation').val(id);
		}
	</script>
</html>