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
            if (count>3) {
                var data=$.parseJSON(param);
                $("#dropDownStaffName").append("<option value='' disabled selected>Pilih salah satu staff</option>");
                jQuery.each(data, function(index, value){
                    $("#dropDownStaffName").append("<option value='"+index+"'>" + value + "</option>");
                });
            }else {
              $("#dropDownStaffName").append("<option value='' disabled selected>Tidak ada staff</option>");
            }
          },
          error : function(e) {
            alert("ERROR: ", e);
          }
        });
      }
  })