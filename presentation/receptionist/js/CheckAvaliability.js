$(document).ready(function() {
    //submit form
    $('#checkAvaliability').submit(function(event) {
      event.preventDefault();
      var formData = $('#checkAvaliability').serialize();
      var checkin = $('#checking').val();
      var checkout = $('#checkout').val();
      var person = $('#person').val();

      $.ajax({
        type : "POST",
        url : "../controller/AvaliableRoomController.php",
        data : formData,
        dataType : "json",
        success : function(param) {
          // console.log(param);
          var temp = '';
          $.each(param, function(key, value) {
            temp += '<div class="card card-hover"><div class="card-body"><table>'
            + '<tr><td>Room Number :</td><td>'+key+'</td></tr>'
            + '<tr><td>Price</td><td>'+value['harga']+'</td></tr>'
            + '<tr><td>Capacity</td><td>'+value['jmlh_org']+'</td></tr>'
            + '</table></div>'
            + '<button class="btn btn-warning" onclick="test('+key+')"'
            + '>Select</button></div>';
          })
          // console.log(temp);
          $('#listroom').html(temp);
        },
        error : function(e) {
          alert("ERROR: ", e);
        }
      });
    })

    $('.btn btn-warning').on("click", function() {
      console.log("aaa");
    });

})