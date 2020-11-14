$(document).ready(function() {
    //submit form
    $('#chooseCustomer').click(function() {
        var name = $('input:radio[name="check"]:checked').val();
        var temp = name.split("-");
        
        $('#name').val(temp[1]);
        $('#hidden-id').val(temp[0]);
        $('#custModal').modal('hide');
    })
})