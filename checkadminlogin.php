<?php
require('sqlconnection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection = new DatabaseConnection();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $results = $connection->loginadminuser($email, $password);
    if (mysqli_num_rows($results) >= 1) {
        session_start();
        $_SESSION["adminlogin"] = true;
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) { 
            $_SESSION["username"] = $row['UserName'];
            $_SESSION["email"] =  $row['Email'];
            $_SESSION["userid"] =  $row['User_Id'];
        }
        header("Location: admininventory.php");
    } else {
        echo "<h5>Invalid Login Credentials !!!!</h5>";
    }
} else {
    echo "</h3>Some error in verifying the data</h3>";
}
