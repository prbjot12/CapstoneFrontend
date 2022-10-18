<?php
    require('sqlconnection.php');
   
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $connection = new DatabaseConnection();
        $email = $_POST['email'];  
        $username = $_POST['username'];  
        $mobile = $_POST['mobile'];  
        $password = $_POST['password'];  
        $result = $connection->register_adminuser($username, $email, $password,$mobile);
        
        if($result){
            echo "</h3>User Created Successfully !!!</h3>";
            header("Location: adminlogin.php");
            exit;
        } else {
            echo "</h3>Some error in Saving the data</h3>";
        }
        
    } else {
        echo "</h3>Page Accepts only POST request</h3>";
    }
