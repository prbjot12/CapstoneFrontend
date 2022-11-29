<?php
require('sqlconnection.php');
$connection = new DatabaseConnection();

if (!empty($_GET['vehicleid'])) {
    $VehicleId = $_GET['vehicleid'];

    if ($VehicleId != '') {
        $result = $connection->delete_vehicle($VehicleId);
        if ($result) {
            echo "</h3>Vehicle Deleted Successfully !!!</h3>";
            header("Location: admininventory.php");
            exit;
        } else {
            echo "</h3>Some error in Updating the data</h3>";
        }
    } else {
        echo "</h3>Some error in Updating the data</h3>";
    }
} else {
    echo "</h3>Page Accepts only POST request</h3>";
}
?>
