<html>
	<head>
		<title>Menu</title>
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
		      		<li class="nav-item active">
		        		<a class="nav-link" href="ListMenu.php">Menu<span class="sr-only">(current)</span></a>
		      		</li>
		      		<li class="nav-item">
		        		<a class="nav-link" href="ListBahan.php">Bahan</a>
					</li>
					<li class="nav-item">
		        		<a class="nav-link" href="ListTaskPerStaff.php">Task</a>
		      		</li>
		    	</ul>
			</div>
			<div class="d-flex flex-row-reverse bd-highlight">
					<a class="btn btn-danger" href="../../LogoutController.php">Log Out</a>
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
						<th scope="col">Bahan</th>
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
						$str = "<td>";
						foreach($menu->getBahan() as $bahan){
							$str.=$bahan." , ";
						}
						$str .= "</td>";
						echo $str;
						echo "</tr>";

					}


					?>

				</tbody>
			</table>
		</div>	
	</body>
</html>