$( document ).ready(function() {
  
    // SUBMIT FORM
      $("#logincheck").submit(function(event) {
        // Prevent the form from submitting via the browser.
        event.preventDefault();
        ajaxPost();
      });
      
      function ajaxPost(){
        
        // PREPARE FORM DATA
        var formData = $('#logincheck').serialize();
        
        // DO POST
        $.ajax({
          type : "POST",
          url : "/presentation/StaffController.php",
          data : formData,
          success : function(param) {
            if (param == "failed") {
              $("#errorMsg").html('<div class="alert alert-danger" role="alert">Email or Password Incorrect</div>'); 
            }else {
                window.location.replace(param);
            }
          },
          error : function(e) {
            alert("ERROR: ", e);
          }
        });
      }
  })