<?php
include ('db_test.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['cust_username'];
    $email = $_POST['cust_email'];
     $password = password_hash($_POST['cust_password'],
     PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO Customer (name,email,password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email,$password);
       if ($stmt->excute()) {
          echo "Customer registered successfull!";
       } else {
           echo "Error:" .$stmt->error;
       }
         $stmt->close();
    }
    $conn->close();


    ?>

    




















