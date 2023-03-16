<?php

// Connect to the database
$db_host = 'localhost'; // Change this to your database host
$db_user = 'username'; // Change this to your database username
$db_pass = 'password'; // Change this to your database password
$db_name = 'myDB'; // Change this to your database name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
  die('Error connecting to database: ' . mysqli_connect_error());
}

$createtb = "CREATE TABLE IF NOT EXISTS list_table (   id INT AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(255),
name VARCHAR(255),
description TEXT,
rating INT )";

if ($conn->query($createtb) === TRUE) {
} else {
  echo "Error creating table: " . $conn->error;
}
// $conn->close();

// Get the data from the form
$category = $_POST['category'];
$name = $_POST['name'];
$description = $_POST['description'];
$rating = $_POST['rating'];



// Prepare the SQL statement
$sql = "INSERT INTO list_table (category, name, description, rating) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'sssi', $category, $name, $description, $rating);

// Execute the SQL statement
if (mysqli_stmt_execute($stmt)) {
  $response = array('status' => 'success');
} else {
  $response = array('status' => 'error', 'message' => 'Error adding item to database');
}

// Close the database connection and return the response
mysqli_stmt_close($stmt);
mysqli_close($conn);
echo json_encode($response);

?>
