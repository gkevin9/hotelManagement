<html>
	<head>
		<title>New Reservation</title>
        <link href="../../public/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../../public/js/bootstrap.min.js"></script>
        <script src="../js/CheckAvaliability.js"></script>
        <style>
            .card-hover:hover {
                /* background-color: #03fcf4; */
                color: white;
            }
        </style>
        <script>
            function test(key) {
                var checkin = document.getElementById('checkin').value;
                var checkout = document.getElementById('checkout').value;
                var person = document.getElementById('person').value;
                var url = 'NewReservation.php?room=' + key 
                            + '&checkin=' + checkin
                            + '&checkout=' + checkout
                            + '&person=' + person;
                window.location.replace(url);
            }
        </script>
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
                            <input type="date" class="form-control" required name="checkin" id="checkin">
                            <div class="invalid-feedback">
                                Checkin date must smaller than checkout date
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Check Out</label>
                            <input type="date" class="form-control" required name="checkout" id="checkout">
                        </div>
                        <div class="form-group">
                            <label>Person Num</label>
                            <input type="number" class="form-control" required name="person" value="1" id="person">
                        </div>
                        <button type="submit" class="btn btn-primary">Check Avaliability</button>
                    </form>
                </div>
                <div class="col">
                    <div id="alert" class="alert alert-danger" role="alert" style="display: none;">
                        No room avaliable
                    </div>
                    <div class="card-deck" id="listroom">
                        <!--card in javascrip ajax-->
                    </div>
                </div>
            </div>
		</div>
	</body>
</html>