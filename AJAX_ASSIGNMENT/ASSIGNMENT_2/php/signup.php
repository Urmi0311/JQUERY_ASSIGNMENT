<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    if (!(preg_match('/^[A-Za-z]+$/', $firstName))) {
        $result_arr[] = array("message" => "Invalid First Name");
        echo json_encode($result_arr);
        exit;
    }
    if (!(preg_match('/^[A-Za-z]+$/', $lastName))) {
        $result_arr[] = array("message" => "Invalid Last Name");
        echo json_encode($result_arr);
        exit;
    }

    if (!(preg_match('/^(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/', $password))) {
        $result_arr[] = array(
            "success" => false,
            "message" => "Password must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, one number and one special character"
        );
        echo json_encode($result_arr);
        exit;
    }


    $query = "SELECT `email` FROM Registrations";
    $result = $conn->query($query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["email"] == $email) {
                $return_arr[] = array(
                    "success" => false,
                    "message" => "email aready exists",
                );

                echo json_encode($return_arr);
                return;
            }
        }
    }

    // Insert the user data into the database
    $sql = "INSERT INTO Registrations (firstname, lastname, email, password) 
VALUES ('$firstName', '$lastName', '$email', '$password')";
    mysqli_query($conn, $sql);

    $return_arr[] = array(
        "success" => true,
        "message" => "Registered successfully",
    );

    echo json_encode($return_arr);

}