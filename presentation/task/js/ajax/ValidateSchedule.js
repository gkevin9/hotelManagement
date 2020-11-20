$( document ).ready(function() {
  
    // SUBMIT FORM
      $("#newschedule").submit(function(event) {
        // Prevent the form from submitting via the browser.
        console.log('aaa');
        event.preventDefault();
        ajaxPost();
      });
      
      function ajaxPost(){
        
        // PREPARE FORM DATA
        var formData = $('#newschedule').serialize();
        console.log('bbbb');
        // DO POST
        $.ajax({
          type : "POST",
          url : "../controller/NewScheduleController.php",
          data : formData,
          success : function(param) {
            if (param == "failed") {
              $("#cek_schedule").html('<div class="alert alert-danger" role="alert">Jadwal sudah ada</div>'); 
            }else {
                console.log(param);
                // window.location.replace(param);
            }
          },
          error : function(e) {
            alert("ERROR: ", e);
          }
        });
      }
  })