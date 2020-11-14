<html>
	<head>
		<title>New Reservation</title>
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../../public/js/bootstrap.min.js"></script>
        <script src="../../public/js/ChooseCustomer.js"></script>
		
	</head>
	<body>
		<div class="container">
			<br>
			<h1>New Reservation</h1>
			<br>
			<form autocomplete="off">
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label">Customer</label>
				    <div class="col-sm-">
                        <input type="text" class="form-control" name="custName" required disabled id='name'>
                        <input type="hidden" id="hidden-id" name="id">
					</div>
					<div class="col-sm-4">
						<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#custModal">Choose Customer</button>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Person Quantity</label>
					<div class="col-sm-">
						<input type="number" name="bykOrang" required class="form-control" value="1">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Room</label>
					<div class="col-sm-">
						<input type="text" name="kamar" class="form-control" disabled>
					</div>
					<div class="col-sm-4">
						<a href="" class="btn btn-primary mb-2">Choose Room</a>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Length of Stay</label>
					<input type="number" name="lama" value="1" required>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Order Name</label>
					<input type="text" name="namaPemesan" required>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Phone Number</label>
					<input type="text" name="nomorTelepon" required>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Check In Date</label>
					<input type="date" name="tanggalCheckin" required>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
					<button class="btn btn-primary mb-2">Submit</button>
				</div>
			</form>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="custModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Choose Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- <form id="chooseCustomerForm"> -->
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">KTP</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once('../controller/CustomerController.php');
                                use presentation\receptionist\controller as Ctrl;
                                
                                $ctrl = new Ctrl\CustomerController();
                                $listCustomer = $ctrl->getAll();
                                
                                foreach ($listCustomer as $customer) {
                                    echo "<tr>";
                                    echo "<td>".$customer->getNama()."</td>";
                                    echo "<td>".$customer->getNomorIdentitas()."</td>";
                                    echo "<td><input class='form-check-input customer' name='check' type='radio' value='".$customer->getId()."-".$customer->getNama()."'></td>";
                                    // echo "<td><button class='btn btn-primary' value='".$customer->getId()."-".$customer->getNama()."'>Choose</button></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" id="chooseCustomer">Choose</button>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
		</div>
	</body>
</html>