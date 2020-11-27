<!DOCTYPE html>
<html>
<head>
	<title>Tugas Baru</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/ajax/SearchStaffName.js"></script>
    <script src="../js/ajax/GetListTask.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container">
		<br>
		<h1>Tugas Baru</h1>
		<br>
		<form autocomplete="off" method="post" action="" id="searchstaff">
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-3">
                <select class="form-control" name="role" id="roleStaff">
                    <option value="" disabled selected>Pilih salah satu pekerjaan</option>
                    <option value="Receptionist">Receptionist</option>
                    <option value="Chef">Chef</option>
                    <option value="OperationSupervisor">Operation Supervisor</option>
                    <option value="RoomService">Room Service</option>
                    <option value="Cashier">Cashier</option>
                    <option value="Housekeeper">Housekeeper</option>
                </select>
            	</div>
            </div>

            <script>
                $(document).ready(function () {
                    $("#roleStaff").change(function () {
                        var el = $(this);
                        $("#dropDownLocation").empty();
                        $("#dropDownLocation").append("<option value='' disabled selected>Pilih salah satu lokasi</option>");
                        if (el.val() === "Receptionist") {
                            $("#dropDownLocation").append("<option value='Lantai 1'>Lantai 1</option>");
                        } else if (el.val() === "Chef") {
                            $("#dropDownLocation").append("<option value='Kitchen'>Kitchen</option>");
                        } else if (el.val() === "Cashier") {
                            $("#dropDownLocation").append("<option value='Lantai 1'>Lantai 1</option>");
                        } else if (el.val() === "OperationSupervisor") {
                            $("#dropDownLocation").append("<option value='Operation Room'>Operation Room</option>");
                        }else {
                            $("#dropDownLocation").append("<option value='Lantai 1'>Lantai 1</option>");
                            $("#dropDownLocation").append("<option value='Lantai 2'>Lantai 2</option>");
                            $("#dropDownLocation").append("<option value='Lantai 3'>Lantai 3</option>");
                            $("#dropDownLocation").append("<option value='Lantai 4'>Lantai 4</option>");
                            $("#dropDownLocation").append("<option value='Lantai 5'>Lantai 5</option>");
                            $("#dropDownLocation").append("<option value='Lantai 6'>Lantai 6</option>");
                            $("#dropDownLocation").append("<option value='Ruang serbaguna'>Ruang serbaguna</option>");
                        }
                    });
                });
            </script>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Lokasi</label>
				<div class="col-sm-3">
                <select class="form-control" name="location" id="dropDownLocation">
                </select>
            	</div>
            </div>
            
            
			<div class="form-group row">
				<label class="col-sm-2 col-form-label"></label>
				<div class="col-sm-3">
					<button class="btn btn-primary mb-2" name='submit'>Cari Staff</button>
				</div>
            </div>
        
        </form>
        <form autocomplete="off" method="post" action="../controller/TaskController.php" id="newtask">
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Staff yang tersedia</label>
				<div class="col-sm-3">
                <select class="form-control" name="staff" id="dropDownStaffName">
                </select>
            	</div>
            </div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-3">
					<input type="textarea" name="keterangan" required id="keterangan" autofocus class="form-control">
				</div>
            </div>
            
            <div class="form-group row">
				<label class="col-sm-2 col-form-label"></label>
				<div class="col-sm-3">
					<button class="btn btn-primary mb-2" name='submit'>Input tugas</button>
				</div>
            </div>
        </form>
        <h3 id="namaStaff">List Penugasan Staff</h3>
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody id="jadwal">
                </tbody>
        </table>
	</div>
</body>
</html>