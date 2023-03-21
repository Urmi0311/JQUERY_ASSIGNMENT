$(document).ready(function () {
    $('#form').submit(function (event) {

        var formData = {
            fname: $('#fname').val(),
            lname: $('#lname').val(),
            email: $('#email').val(),
            password: $('#password').val()
        };

        $.ajax({
            type: 'POST',
            url: 'php/signup.php',
            data: formData,
            dataType: 'json',
            encode: true,
            success: function (response) {

                console.log(response);
                alert(response[0].message);
                if (response[0]["success"]) {
                    window.location.href = "login.html";
                }
            },
            error: function (xhr, status, error) {
                console.log("Error:", error);
            }
        });
        event.preventDefault();
    });
});


