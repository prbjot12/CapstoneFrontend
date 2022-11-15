<?php
require('sqlconnection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $connection = new DatabaseConnection();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $results = $connection->logincustomer($email, $password);
    if (mysqli_num_rows($results) >= 1) {
        session_start();
        $_SESSION["customerlogin"] = true;
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) { 
            $_SESSION["customeremail"] = $row['Email'];
            $_SESSION["customerphonenumber"] =  $row['Phone_Number'];
            $_SESSION["customerid"] =  $row['Customer_Id'];
            $_SESSION["customerfirstname"] =  $row['FirstName'];
            $_SESSION["customerlastname"] =  $row['LastName'];
        }
        header("Location: viewappointments.php");
    } else {
        echo "<h5>Invalid Login Credentials !!!!</h5>";
    }
} else {
    echo "</h3>Some error in verifying the data</h3>";
}
?>