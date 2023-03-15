$(document).ready(function(){
    $("#btn").click(function(){
        var txt = $("#txt").val();
        $.ajax({
            type: "POST",
            url: "Question1.php",
            data: {txt: txt},
            success: function(result){
                $("#para").html(result);
            }
        });
    });
});