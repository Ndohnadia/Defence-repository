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
// process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $username =
trim($conn->real_escape_string($_POST['username']));
    $email =
trim($conn->real_escape_string($_POST['email']));
    $user_type =
trim($conn->real_escape_string($_POST['user_type']));
    $password = $_POST['password'];

    if (!empty($username)&& !empty($email) && !  
    empty($user_type) &&  !empty($password)) {
        // Validate email forms
        if (!filter_var(email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format. ");
        }
        // check if username already exists
        $sql = "SELECT id FROM users WHERE username = '$username' OR email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            die("Username or email already taken. ");
        } else {
            // Hash the password
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);

            // Insert data into database
            $sql = "INSERT INTO users (username, password, email, user_type) VALUES ('$username', '$password_hash' , '$email', '$user_type')";

            if ($conn->query($sql) === TRUE) {
                echo "Registration seccessful!";
            } else {
                echo "Error:" . $sql . "<br>" . 
    $conn->error;
            }
        }
        }else{
         }   die("All fields are required.");
    }
    // close connection
    $conn->close();
?>