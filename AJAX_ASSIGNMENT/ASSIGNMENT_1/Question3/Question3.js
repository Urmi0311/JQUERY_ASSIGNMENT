$(document).ready(function () {
    $('#myform').submit(function (event) {
        event.preventDefault();
        $('tbody').empty();
        $.ajax({
            type: 'POST',
            url: 'insert.php',
            data: $('#myform').serialize(),
            success: function (response) {
                $('#mytable tbody').append(response)
            },

            
            error: function (xhr, status, error) {
                alert("failed" + xhr + status + error);
            }
        });
    });
});