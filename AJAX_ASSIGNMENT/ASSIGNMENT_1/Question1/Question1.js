$(document).ready(function(){
    $("#update_btn").click(function(){
        var new_text = $("#new_text").val();
        $.ajax({
            type: "POST",
            url: "Question1.php",
            data: {new_text: new_text},
            success: function(result){
                $("#my_paragraph").html(result);
            }
        });
    });
});