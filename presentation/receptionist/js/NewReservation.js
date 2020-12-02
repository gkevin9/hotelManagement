$(document).ready(function() {
    //submit form
    $('#chooseCustomer').click(function() {
        var name = $('input:radio[name="check"]:checked').val();
        var temp = name.split("=");
        
        $('#nama').val(temp[1]);
        $('#nama').prop('readonly', true);

        $('#nomorIdentitas').val(temp[0]);
        $('#nomorIdentitas').prop('readonly', true);

        $('#nomorKendaraan').val(temp[3]);
        $('#nomorKendaraan').prop('readonly', true);

        $('#nomorTelepon').val(temp[2]);
        $('#nomorTelepon').prop('readonly', true);

        $('#newdata').val('false');
        $('#custModal').modal('hide');
        $('#resetBtn').show();
    })

    $('#resetBtn').click(function() {
        $('#nama').val('');
        $('#nama').prop('readonly', false);

        $('#nomorIdentitas').val('');
        $('#nomorIdentitas').prop('readonly', false);

        $('#nomorKendaraan').val('-');
        $('#nomorKendaraan').prop('readonly', false);

        $('#nomorTelepon').val('');
        $('#nomorTelepon').prop('readonly', false);

        $('#newdata').val('true');
        $('#resetBtn').hide();
    })

    $('#newcustomer').submit(function(event) {
        event.preventDefault();
        var newData = $('#newdata').val();
        
        if(newData == 'true') {
            var formData = $('#newcustomer').serialize();
            $.ajax({
                type: 'POST',
                url: '../controller/NewCustomerController.php',
                data: formData,
                success : function(param) {
                    if(param == "failed") {
                        $("#nomorIdentitas").addClass("is-invalid");
                    }else{
                        saveNewReservation();
                    }
                },
                error : function(e) {
                    alert("ERROR: ", e);
                }
            })
        }else{
            var inputData = $('#newcustomer').serialize();
            
            $.ajax({
                type: 'POST',
                url: '../controller/NewReservationController.php',
                data: inputData,
                success: function(param) {
                    console.log('beres');
                    window.location.replace('ListReservation.php');
                },
                error: function(e) {
                    alert("ERROR: ", e);
                }
            })
        }
    })

    function saveNewReservation() {
        
        var inputData = $('newcustomer').serialize();

        $.ajax({
            type: 'POST',
            url: '../controller/NewReservationController.php',
            data: inputData,
            success: function(param) {
                window.location.replace('ListReservation.php');
            },
            error: function(e) {
                alert("ERROR: ", e);
            }
        })
    }

})