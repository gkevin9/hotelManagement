$( document ).ready(function() {
  
    // SUBMIT FORM
      $("#checkmenu").submit(function(event) {
        console.log("aaa");
        // Prevent the form from submitting via the browser.
        event.preventDefault();
        ajaxPost();
      });
      
      function ajaxPost(){
        
        // PREPARE FORM DATA
        var formData = $('#checkmenu').serialize();
        // DO POST
        $.ajax({
          type : "POST",
          url : "../controller/NewMenuController.php",
          data : formData,
          success : function(param) {
            console.log(param);
            if (param == "failed") {
              $("#name").addClass("is-invalid"); 
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