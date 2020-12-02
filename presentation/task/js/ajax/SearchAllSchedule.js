$( document ).ready(function() {
  
    // SUBMIT FORM
      $("#searchschedule").submit(function(event) {
        // Prevent the form from submitting via the browser.
        console.log('aaa');
        event.preventDefault();
        ajaxPost();
      });
      
      function ajaxPost(){
        
        // PREPARE FORM DATA
        var formData = $('#searchschedule').serialize();
        console.log('bbbb');
        // DO POST
        $.ajax({
          type : "POST",
          url : "../controller/ScheduleController.php",
          data : formData,
          success : function(param) {
            var count = param.length;
            var role = "";
            var hari = "";
            $("#jadwalstaff").empty();
            $("#namaStaff").empty();
            if(count>3) {
                var data=$.parseJSON(param);
                jQuery.each(data, function(index, value){
                  var str=("<tr>");  
                  jQuery.each(value, function(index_data, value_data){
                      if(index_data !="role" && index_data != "day" && index_data != "id")
                        str+=("<td>"+value_data+"</td>");
                      else if(index_data == "role")
                        role=value_data;
                      else if(index_data == "day")
                        hari=value_data;
                      else if(index_data == "id")
                        str+=("<td><input type='button' value='Hapus' class='hapus' name='hapus' id='"+value_data+"'/></td>");
                  });
                  str+=("</tr>");
                  $("#jadwalstaff").append(str);
                });

                $("#namaStaff").append("Jadwal untuk staff "+role+" pada hari "+hari);
            }else {
                $("#namaStaff").append("Belum ada jadwal untuk role ini");
            }
          },
          error : function(e) {
            alert("ERROR: ", e);
          }
        });
      }
  })