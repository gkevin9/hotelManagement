$( document ).ready(function() {
  
    // SUBMIT FORM
      $("#roleStaff").on('change', function() {
        // Prevent the form from submitting via the browser.
        
        fetchRecordsfromDB(this.value);
      });
      
      function fetchRecordsfromDB(roleStaff) {
        $.ajax( {
          type : "POST",
          url : "../controller/StaffNameController.php",
          data : {Role:roleStaff},
          success : function(param) {
            var count = param.length;
            $("#dropDownStaffName").empty();
            $("#dropDownLocation").empty();
            if (count>2) {
                var data=$.parseJSON(param);
                $("#dropDownStaffName").append("<option value='' disabled selected>Pilih salah satu staff</option>");
                jQuery.each(data, function(index, value){
                    $("#dropDownStaffName").append("<option value='"+index+"'>" + value + "</option>");
                });
            }else {
              $("#dropDownStaffName").append("<option value='' disabled selected>Tidak ada staff</option>");
            }

            $("#dropDownLocation").append("<option value='' disabled selected>Pilih salah satu lokasi</option>");
            if(roleStaff=="Receptionist") {
              $("#dropDownLocation").append("<option value='Lantai 1'>Lantai 1</option>");
            }else if(roleStaff=="Chef") {
              $("#dropDownLocation").append("<option value='Kitchen'>Kitchen</option>");
            }else if(roleStaff=="Cashier") {
              $("#dropDownLocation").append("<option value='Lantai 1'>Lantai 1</option>");
            }else if(roleStaff=="OperationSupervisor") {
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
          },
          error : function(e) {
            alert("ERROR: ", e);
          }
        });
      }
  })