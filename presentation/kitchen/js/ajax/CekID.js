$( document ).ready(function() {
  
    // SUBMIT FORM
      $("#checkid").submit(function(event) {
        // Prevent the form from submitting via the browser.
        event.preventDefault();
        ajaxPost();
      });
      
      function ajaxPost(){
        
        // PREPARE FORM DATA
        var formData = $('#checkid').serialize();
        console.log('aaa');
        // DO POST
        $.ajax({
          type : "POST",
          url : "../controller/NewBahanController.php",
          data : formData,
          success : function(param) {
            console.log(param);
            if (param == "failed") {
              $("#errorMsg").html('<div class="alert alert-danger" role="alert">Name Incorrect</div>'); 
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