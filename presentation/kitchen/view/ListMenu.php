<html>
	<head>
		<title>Menu</title>
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
		        		<a class="nav-link" href="ListBahan.php">List Bahan</a>
		      		</li>
		      		<li class="nav-item  active">
		        		<a class="nav-link" href="">Nama<span class="sr-only">(current)</span></a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="#">Add Bahan</a>
		      		</li>
		    	</ul>
		  	</div>
		</nav>
		<div class="container-fluid">
			<br>
			<a href="NewMenu.php" class="btn btn-primary">+ New Menu</a>
			<br><br>
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Name</th>
						<th scope="col">Jenis</th>
						<th scope="col">Harga</th>
					</tr>
				</thead>
				<tbody>
					<?php
					//tadinya mau lewat customer controller, trus datanya disimpen di session
					//ternyata pas dikeluarin dari session, gabisa diambil object nya
					require_once('../controller/MenuController.php');

					use presentation\kitchen\controller as Ctrl;
					$controller = new Ctrl\MenuController();
					$list = $controller->getAll();

					foreach ($list as $menu) {
						echo "<tr>";
						echo "<td>".$menu->getId()."</td>";
						echo "<td>".$menu->getNama()."</td>";
						echo "<td>".$menu->getJenis()."</td>";
						echo "<td>".$menu->getHarga()."</td>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</div>	
	</body>
</html>