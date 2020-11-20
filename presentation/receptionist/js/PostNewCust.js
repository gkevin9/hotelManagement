$( document ).ready(function() {
  
    // SUBMIT FORM
      $("#newcustomer").submit(function(event) {
        // Prevent the form from submitting via the browser.
        event.preventDefault();
        ajaxPost();
      });
      
      function ajaxPost(){
        
        // PREPARE FORM DATA
        var formData = $('#newcustomer').serialize();
        
        // DO POST
        $.ajax({
          type : "POST",
          url : "../controller/NewCustomerController.php",
          data : formData,
          success : function(param) {
            console.log(param);
            if (param == "failed") {
              //$("#errorMsg").html('<div class="alert alert-danger" role="alert">Email or Password Incorrect</div>'); 
              $("#nomorIdentitas").addClass("is-invalid");
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