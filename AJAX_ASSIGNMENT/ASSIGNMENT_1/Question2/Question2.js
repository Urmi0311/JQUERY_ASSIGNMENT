$(document).ready(function () {
    $("#sort-btn").click(function () {
        $.ajax({
            type: "POST",
            url: "Question2.php",
            dataType: "html",
            success: function (data) {
                $("#result").html(data);
            }
        });
    });
});