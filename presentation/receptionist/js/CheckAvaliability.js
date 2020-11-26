$(document).ready(function() {
    //submit form
    $('#checkAvaliability').submit(function(event) {
      event.preventDefault();
      var formData = $('#checkAvaliability').serialize();
      console.log("jalam");

      $.ajax({
        type : "POST",
        url : "../controller/AvaliableRoomController.php",
        data : formData,
        dataType : "json",
        success : function(param) {
          // console.log(param);
          var temp = '';
          $.each(param, function(key, value) {
            temp += '<div class="card"><div class="card-body"><table>'
            + '<tr><td>Room Number :</td><td>'+key+'</td></tr>'
            + '<tr><td>Price</td><td>'+value['harga']+'</td></tr>'
            + '<tr><td>Capacity</td><td>'+value['jmlh_org']+'</td></tr>'
            + '</table></div></div>';
          })
          // console.log(temp);
          $('#listroom').html(temp);
        },
        error : function(e) {
          alert("ERROR: ", e);
        }
      });
    })

})