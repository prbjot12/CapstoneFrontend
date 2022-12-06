<?php
require('sqlconnection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $connection = new DatabaseConnection();
    $CustomerID = $_POST['customerid'];
    $Vehicleid = $_POST['vehicleid'];
    $Paymentid = $_POST['paymentid'];
    $Vehicleprice = $_POST['vehicleprice'];

        $result = $connection->create_order($CustomerID,  $Vehicleid, $Paymentid, $Vehicleprice);
        if ($result) {
            echo "</h3>Order Saved Successfully !!!</h3>";
            header("Location: index.php");
            exit;
        } else {
            echo $result;
            echo "</h3>Some error in Saving the data</h3>";
        }
} else {
    echo "</h3>Page Accepts only POST request</h3>";
}
