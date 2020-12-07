<!DOCTYPE html>
<html>
<head>
	<title>New Customer</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="../js/Payment.js"></script>
</head>
<body>
<body>
        <div class="container">
			<br>
            <h1>Check Out</h1>
            <hr>
            
            <div class="row">
                <div class="col-5">
                    <h3>Bill</h3>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Desc</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        ini_set('display_errors', '1');
                        ini_set('display_startup_errors', '1');
                        error_reporting(E_ALL);
                        require_once($_SERVER['DOCUMENT_ROOT']."/presentation/receptionist/controller/BillController.php");
                        use presentation\receptionist\controller as Ctrl;

                        $ctrl = new Ctrl\BillController();
                        $arrayBill = $ctrl->getBill($_GET['id']);
                        $tempNo = 1;
                        $tempTotal = 0;
                        $tempBillId = '';
                        foreach($arrayBill as $bill) {
                            $tempBillId = $bill->getDocno();
                            echo "<tr>";
                            echo "<td>".$tempNo."</td>";
                            echo "<td>".$bill->getDeskripsi()."</td>";
                            echo "<td>".$bill->getAmount()."</td>";
                            echo "<td>".$bill->getQuantity()."</td>";
                            echo "<td>".$bill->getQuantity() * $bill->getAmount()."</td>";
                            echo "</tr>";

                            $tempNo++;
                            $tempTotal += $bill->getQuantity() * $bill->getAmount();
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <h3>Payment Method</h3>
                    <br>
                    <form id="payment" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cash</label>
                            <input type="number" name="cash" class="form-control" value="0" id="cash">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Debit</label>
                            <input type="number" name="debit" class="form-control" value="0" id="debit">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Credit</label>
                            <input type="number" name="credit" class="form-control" value="0" id="credit">
                        </div>
                        <input type="hidden" name="total" value="<?php echo $tempTotal ?>">
                        <input type="hidden" name="billId" value="<?php echo $tempBillId ?>">
                        <input type="hidden" name="custStayId" value="<?php echo $_GET['id'] ?>">
                        <div id="errorMessage"></div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
		</div>
	</body>
</body>
</html>