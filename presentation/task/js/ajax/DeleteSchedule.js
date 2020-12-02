$(document).ready(function(){
    $(".hapus").click(function(){
        var tr = $(this).closest('tr'),
        schedID = $(this).attr('id');
        console.log("fksajdlka");
         $.ajax({
                type : "POST",
                url : "../controller/DeleteScheduleController.php",
                data : {SchedID:schedID},
                cache: false,
                success:function(data){
                    // if(data=="OK") {
                    //     console.log(data);
                    //     tr.fadeOut(100, function (){
                    //         $(this).remove();
                    //     });
                    // }
                    console.log("halo");
                }
            });
         
    });
});