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
		        		<a class="nav-link" href="/receptionist/customer">Customer</a>
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
			<!-- <div class="card-deck">
				{{#reservationList}}
				<div class="card">
					<div class="card-body">
				    	<h5 class="card-title">Id : {{id}}</h5>
				    	<p class="card-text">
				    		Name : {{nama}}<br>
				    		Kamar :<br>
				    		Tgl Checkin : {{tanggalCheckin}}<br>
				    		Lama : {{lama}}<br>
				    		Nama : {{nama}}<br>
				    		No Hp : {{nomorTelepon}}<br>
				    		Nama Pemesan : {{namaPemesan}}<br>
				    		nomorTelepon : {{nomorTelepon}}<br>
				    		
				    	</p>
				  	</div>
				  	<div class="card-footer">{{status}}</div>
				</div>	
				{{/reservationList}}
			</div> -->
		</div>	
	</body>
</html>