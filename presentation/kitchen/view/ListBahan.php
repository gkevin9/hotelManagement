<html>
	<head>
		<title>Bahan</title>
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Kitchen</a>
		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>
		  	<div class="collapse navbar-collapse" id="navbarNav">
		    	<ul class="navbar-nav">
		      		<li class="nav-item">
		        		<a class="nav-link" href="ListMenu.php">Menu</a>
		      		</li>
		      		<li class="nav-item  active">
		        		<a class="nav-link" href="ListBahan.php">Bahan<span class="sr-only">(current)</span></a>
		      		</li>
		    	</ul>
		  	</div>
		</nav>
		<div class="container-fluid">
			<br>
			<a href="NewBahan.php" class="btn btn-primary">+ New Bahan</a>
			<br><br>
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Name</th>
						<th scope="col">Harga</th>
						<th scope="col">Jumlah</th>
						<th scope="col">Expired Date</th>
					</tr>
				</thead>
				<tbody>
					<?php
					//tadinya mau lewat customer controller, trus datanya disimpen di session
					//ternyata pas dikeluarin dari session, gabisa diambil object nya
					require_once('../controller/BahanController.php');

					use presentation\kitchen\controller as Ctrl;
					$controller = new Ctrl\BahanController();
					$list = $controller->getAll();

					foreach ($list as $bahan) {
						echo "<tr>";
						echo "<td>".$bahan->getId()."</td>";
						echo "<td>".$bahan->getNama()."</td>";
						echo "<td>".$bahan->getJumlah()."</td>";
						echo "<td>".$bahan->getHarga()."</td>";
						echo "<td>".$bahan->getExpDate()."</td>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</div>	
	</body>
</html>