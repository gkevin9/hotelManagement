<html>
	<head>
		<title>New Reservation</title>
        <link href="../../public/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../css/NewReservation.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../../public/js/bootstrap.min.js"></script>
        <script src="../js/NewReservation.js"></script>
	</head>
	<body>
		<div class="container">
            <?php
            $datediff = abs(strtotime($_GET['checkin']) - strtotime($_GET['checkout']));
            $lengthOfStay = round($datediff / (60 * 60 * 24));
            ?>
			<br>
			<h1>Input Customer Info</h1>
            <br>
            <form autocomplete="off" method="post" id="newcustomer">
                <input type="hidden" name="checkin" value="<?php echo $_GET['checkin'] ?>">
                <input type="hidden" name="lama" value="<?php echo $lengthOfStay?>">
                <input type="hidden" name="person" value="<?php echo $_GET['person']?>">
                <input type="hidden" name="newdata" id="newdata" value="true">
                <input type="hidden" name="room" value="<?php echo $_GET['room']; ?>">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-3">
                        <input type="text" name="nama" required id="nama" autofocus class="form-control">
                    </div>
                    or
                    <div class="col-sm-4">
						<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#custModal">Choose Customer</button>
                        <button style="display: none;" class="btn btn-danger" name='submit' id="resetBtn">Reset</button>
					</div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">KTP</label>
                    <div class='col-sm-3'>
                        <input type="text" name="nomorIdentitas" required id="nomorIdentitas" class="form-control" maxlength="15">
                        <div class='invalid-feedback'>
                            There is duplicate KTP, please check again
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Vehicle Number</label>
                    <div class="col-sm-3">
                        <input type="text" name="nomorKendaraan" required value="-" id="nomorKendaraan" class='form-control'>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-3">
                        <input type="text" name="nomorTelepon" required id="nomorTelepon" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-1">
                        <button class="btn btn-primary mb-2" name='submit'>Submit</button>
                    </div>
                    <div class="col-sm-1">
                        <a href="ChooseRoom.php" class="btn btn-danger">Cancle</a>
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
                                    echo "<td><input class='form-check-input customer' name='check' type='radio'"; 
                                    echo "value='".$customer->getNomorIdentitas()."=".$customer->getNama()."=".$customer->getNomorTelepon()."=".$customer->getNomorKendaraan()."'></td>";
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
	</body>
</html>