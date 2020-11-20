<!DOCTYPE html>
<html>
<head>
	<title>Jadwal Baru</title>
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/ajax/GetListStaffName.js"></script>
    <script src="../js/ajax/ValidateSchedule.js"></script>
    <script src="../js/ajax/GetSchedule.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container">
		<br>
		<h1>Jadwal Baru</h1>
		<br>
		<form autocomplete="off" method="post" action="" id="newschedule">
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

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Staff</label>
				<div class="col-sm-3">
                <select class="form-control" name="staff" id="dropDownStaffName">
                </select>
            	</div>
            </div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Hari</label>
				<div class="col-sm-3">
                <select class="form-control" name="day">
                    <option value="" disabled selected>Pilih salah satu hari</option>
                    <option value="1">Senin</option>
                    <option value="2">Selasa</option>
                    <option value="3">Rabu</option>
                    <option value="4">Kamis</option>
                    <option value="5">Jumat</option>
                    <option value="6">Sabtu</option>
                    <option value="7">Minggu</option>
                </select>
            	</div>
            </div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Awal</label>
                <div class="col-sm-3">
                    <input id="starttimepicker" name="starttimepicker" width="256" />
                    <script>
                        $('#starttimepicker').timepicker({
                            use24hours: true,
                            uiLibrary: 'bootstrap4'
                        });
                    </script>
                </div>
                
                <label class="col-sm-2 col-form-label">Akhir</label>
                <div class="col-sm-3">
                    <input id="endtimepicker" name="endtimepicker" width="256" />
                    <script>
                        $('#endtimepicker').timepicker({
                            use24hours: true,
                            uiLibrary: 'bootstrap4'
                        });
                    </script>
                </div>
            </div>

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Lokasi</label>
				<div class="col-sm-3">
                <select class="form-control" name="location">
                    <option value="" disabled selected>Pilih salah satu lokasi</option>
                    <option value="Lantai 1">Lantai 1</option>
                    <option value="Lantai 2">Lantai 2</option>
                    <option value="Lantai 3">Lantai 3</option>
                    <option value="Lantai 4">Lantai 4</option>
                    <option value="Lantai 5">Lantai 5</option>
                    <option value="Lantai 6">Lantai 6</option>
                    <option value="Ruang serbaguna">Ruang serbaguna</option>
                </select>
            	</div>
            </div>
            
            
			<div class="form-group row">
				<label class="col-sm-2 col-form-label"></label>
				<div class="col-sm-3">
					<button class="btn btn-primary mb-2" name='submit'>Save</button>
				</div>
            </div>
            
            <div id="cek_schedule"></div>
        </form>
        
        <h3 id="namaStaff">Jadwal Staff</h3>
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Hari</th>
                    <th scope="col">Jam Awal</th>
                    <th scope="col">Jam Akhir</th>
                    <th scope="col">Lokasi</th>
                    </tr>
                </thead>
                <tbody id="jadwal">
                </tbody>
        </table>
	</div>
</body>
</html>