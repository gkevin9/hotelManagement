<html>
	<head>
		<title>New Reservation</title>
        <link href="../../public/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../../public/js/bootstrap.min.js"></script>
        <script src="../js/CheckAvaliability.js"></script>
	</head>
	<body>
        <div class="container">
			<br>
            <h1>New Reservation</h1>
            <hr>
            <h3>Check Avaliability</h3>
            <br>
            <div class="row">
                <div class="col-2">
                    <form id="checkAvaliability" method="post">
                        <div class="form-group">
                            <label>Check In</label>
                            <input type="date" class="form-control" required name="checkin">
                        </div>
                        <div class="form-group">
                            <label>Check Out</label>
                            <input type="date" class="form-control" required name="checkout">
                        </div>
                        <div class="form-group">
                            <label>Person Num</label>
                            <input type="number" class="form-control" required name="person">
                        </div>
                        <button type="submit" class="btn btn-primary">Check Avaliability</button>
                    </form>
                </div>
                <div class="col">
                    <div class="card-deck" id="listroom">
                        <!-- <div class="card">
                            <div class="card-body">
                                <table>
                                    <tr><td>Room Number :</td><td>1</td></tr>
                                    <tr><td>Price</td><td>100000</td></tr>
                                </table>
                            </div>                        
                        </div> -->
                    </div>
                </div>
            </div>
		</div>
	</body>
</html>