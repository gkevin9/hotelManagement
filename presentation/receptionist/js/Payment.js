$( document ).ready(function() {
  
    // SUBMIT FORM
      $("#payment").submit(function(event) {
        // Prevent the form from submitting via the browser.
        event.preventDefault();
        ajaxPost();
      });
      
      function ajaxPost(){
        
        // PREPARE FORM DATA
        var formData = $('#payment').serialize();
        
        // DO POST
        $.ajax({
          type : "POST",
          url : "../controller/PaymentController.php",
          data : formData,
          success : function(param) {
            console.log(param);
            if (param == "failed") {
              $("#errorMessage").html('<div class="alert alert-danger" role="alert">Jumlah tidak sesuai!</div>');
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