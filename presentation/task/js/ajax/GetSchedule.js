$( document ).ready(function() {
  
    // SUBMIT FORM
      $("#dropDownStaffName").on('change', function() {
        // Prevent the form from submitting via the browser.
        
        fetchRecordsfromDB(this.value);
      });
      
      function fetchRecordsfromDB(email) {
        $.ajax( {
          type : "POST",
          url : "../controller/StaffScheduleController.php",
          data : {Email:email},
          success : function(param) {
            var count = param.length;
            var nama = "";
            $("#jadwal").empty();
            $("#namaStaff").empty();
            if (count>3) {
                var data=$.parseJSON(param);
                jQuery.each(data, function(index, value){
                  var str=("<tr>");  
                  jQuery.each(value, function(index_data, value_data){
                    if(index_data!="nama")
                      str+=("<td>"+value_data+"</td>");
                    else
                      nama=value_data;
                  });
                  str+=("</tr>");
                  $("#jadwal").append(str);
                });

                $("#namaStaff").append("Jadwal untuk staff "+nama+" yang sudah ada");
            }else {
              $("#namaStaff").append("Belum ada jadwal untuk staff ini");
            }
          },
          error : function(e) {
            alert("ERROR: ", e);
          }
        });
      }
  })