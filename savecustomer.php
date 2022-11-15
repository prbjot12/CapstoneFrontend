<?php
    require('sqlconnection.php');
   
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $connection = new DatabaseConnection();
        $email = $_POST['email'];  
        $mobile = $_POST['mobile'];  
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];  
        $lastname = $_POST['lastname'];    

        $result = $connection->register_customer($email, $password,$mobile, $firstname, $lastname);
        
        if($result){
            echo "</h3>Customer Created Successfully !!!</h3>";
            header("Location: customerlogin.php");
            exit;
        } else {
            echo "</h3>Some error in Saving the data</h3>";
        }
    } else {
        echo "</h3>Page Accepts only POST request</h3>";
    }
?>