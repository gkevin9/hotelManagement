$( document ).ready(function() {
  
    // SUBMIT FORM
      $("#roleStaff").on('change', function() {
        // Prevent the form from submitting via the browser.
        
        fetchRecordsfromDB(this.value);
      });
      
      function fetchRecordsfromDB(role) {
        $.ajax( {
          type : "POST",
          url : "../controller/StaffTaskController.php",
          data : {Role:role},
          success : function(param) {
            var count = param.length;
            var nama = "";
            $("#jadwal").empty();
            $("#namaStaff").empty();
            console.log(param);
            if (count>3) {
                var data=$.parseJSON(param);
                jQuery.each(data, function(index, value){
                  var str=("<tr>");  
                  jQuery.each(value, function(index_data, value_data){
                      str+=("<td>"+value_data+"</td>");
                  });
                  str+=("</tr>");
                  $("#jadwal").append(str);
                });

                $("#namaStaff").append("Penugasan untuk staff "+role+" yang sudah ada");
            }else {
              $("#namaStaff").append("Belum ada penugasan untuk role ini");
            }
          },
          error : function(e) {
            alert("ERROR: ", e);
          }
        });
      }
  })