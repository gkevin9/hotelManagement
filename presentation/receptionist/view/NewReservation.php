<html>
	<head>
		<title>New Reservation</title>
		<link href="../../public/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../../public/js/bootstrap.min.js"></script>
        <script src="../../public/js/ChooseCustomerRoom.js"></script>
		
	</head>
	<body>
		<div class="container">
			<br>
			<h1>New Reservation</h1>
			<br>
			<form autocomplete="off">
				<div class="form-group row">
				    <label class="col-sm-2 col-form-label">Customer</label>
				    <div class="col-sm-3">
                        <input type="text" class="form-control" name="custName" required disabled id='name'>
                        <input type="hidden" id="hidden-id" name="id">
					</div>
					<div class="col-sm-4">
						<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#custModal">Choose Customer</button>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Person Quantity</label>
					<div class="col-sm-3">
						<input type="number" name="bykOrang" required class="form-control" value="1">
					</div>
                </div>
                <div class="form-group row">
					<label class="col-sm-2 col-form-label">Check In Date</label>
					<div class="col-sm-3">
                        <input type="date" name="tanggalCheckin" class="form-control" required>
                    </div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Room</label>
					<div class="col-sm-3">
						<input type="text" name="kamar" id="kamar" class="form-control" disabled>
					</div>
					<div class="col-sm-4">
                    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#roomModal">Choose Room</button>
					</div>
				</div>
				<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Length of Stay</label>
                    <div class="col-sm-3">
                        <input type="number" name="lama" class="form-control" value="1" required>
                    </div>
				</div>
				<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Order Name</label>
                    <div class="col-sm-3">
                        <input type="text" name="namaPemesan" class="form-control" required>
                    </div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Phone Number</label>
					<div class="col-sm-3">
                        <input type="text" name="nomorTelepon" class="form-control" required>
                    </div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
					<div class="col-sm-3">
                        <button class="btn btn-primary mb-2">Submit</button>
                    </div>
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
                                    echo "<td><input class='form-check-input customer' name='check' type='radio' value='".$customer->getNomorIdentitas()."-".$customer->getNama()."'></td>";
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
                </div>
            </div>
		</div>
        <?php
        include 'modal/RoomModal.php';
        ?>
	</body>
</html>