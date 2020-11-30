$(document).ready(function(){
    $(".remove").click(function(){
        var tr = $(this).closest('tr'),
        taskID = $(this).attr('id');
         
         $.ajax({
                type : "POST",
                url : "../controller/UpdateTaskController.php",
                data : {TaskID:taskID},
                cache: false,
                success:function(data){
                    if(data=="OK") {
                        console.log(data);
                        tr.fadeOut(100, function (){
                            $(this).remove();
                        });
                    }
                }
            });
         
    });
});