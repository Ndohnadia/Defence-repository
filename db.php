<?php
$servername = "localhost";
$username =  "root";
$password =  "";
$dbname   =  "menu_listing_system";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// get  form data

$username = $_POST['username'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];

// prepare and bind
$stmt = $conn->prepare("INSERT INTO users VALUES (?,?,?)");
$stmt->bind_param("sss", $username,$password, $user_type);

// Execute query
if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error:" . $stmt->error;
}

$stmt->close();
$conn->close();
?>