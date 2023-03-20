$(document).ready(function () {

    $("form").submit(function (event) {
        var id = sessionStorage.getItem("id");

        var formData = {
            id:id,
            userid: $('#user').val(),
            postname: $('#postname').val(),
            postdescription: $('#postdescription').val(),
        }

        $.ajax({
           
            url: "edit.php",
            type: "POST",
            data: formData,
            dataType: "JSON",
            encode: true,
            success: function (response) {
                if (response[0]['message']) {
                    alert(response[0]['message']);
                    window.location.href = 'modify.html';

                }
            }
            // error: function (xhr, status, error) {
            //     alert("failed" + xhr + status + error);
            // }

        });

        event.preventDefault();
    });
});