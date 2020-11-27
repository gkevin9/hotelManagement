$( document ).ready(function() {
  
    // SUBMIT FORM
      $("#searchstaff").submit(function(event) {
        // Prevent the form from submitting via the browser.
        event.preventDefault();
        ajaxPost();
      });
      
      function ajaxPost(){
        
        // PREPARE FORM DATA
        var formData = $('#searchstaff').serialize();
        // DO POST
        $.ajax({
          type : "POST",
          url : "../controller/StaffSearchController.php",
          data : formData,
          success : function(param) {
            var count = param.length;
            $("#dropDownStaffName").empty();
            if(count>3) {
              $("#dropDownStaffName").append("<option value='' disabled selected>Pilih salah satu staff</option>");
                var data=$.parseJSON(param);
                jQuery.each(data, function(index, value){
                    console.log(index);
                    $("#dropDownStaffName").append("<option value='"+index+"'>"+value+"</option>");
                });

            }else {
                $("#dropDownStaffName").append("<option value='' disabled selected>Tidak ada staff yang tersedia</option>");
            }
          },
          error : function(e) {
            alert("ERROR: ", e);
          }
        });
      }
  })