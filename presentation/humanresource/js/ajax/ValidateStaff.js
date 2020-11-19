$( document ).ready(function() {
  
    // SUBMIT FORM
      $("#newstaff").submit(function(event) {
        // Prevent the form from submitting via the browser.
        console.log('aaa');
        event.preventDefault();
        ajaxPost();
      });
      
      function ajaxPost(){
        
        // PREPARE FORM DATA
        var formData = $('#newstaff').serialize();
        console.log('bbbb');
        // DO POST
        $.ajax({
          type : "POST",
          url : "../controller/NewStaffController.php",
          data : formData,
          success : function(param) {
            if (param == "failed") {
              $("#cek_email").html('<div class="alert alert-danger" role="alert">Email sudah dipakai</div>'); 
            }else {
                // console.log(param);
                window.location.replace(param);
            }
          },
          error : function(e) {
            alert("ERROR: ", e);
          }
        });
      }
  })