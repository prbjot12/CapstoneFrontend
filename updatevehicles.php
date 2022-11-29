<?php
require('sqlconnection.php');
$connection = new DatabaseConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Brand = $_POST['Brand'];
    $VehicleType = $_POST['VehicleType'];
    $Model = $_POST['Model'];
    $ManufactureDate = $_POST['manufacturedate'];
    $Color = $_POST['color'];
    $Price = $_POST['Price'];
    $VIN = $_POST['VIN'];
    $VehicleImage = $_POST['VehicleImage'];
    $VehcileId = $_POST['VehcileId'];
    $uploaded = false;
    $img_final_location = "";
    echo $_FILES['carimage']['tmp_name'];
    if($_FILES['carimage']['tmp_name'] != '') {
        $img_temp_loc = $_FILES['carimage']['tmp_name'];
        $img_detail = explode(".", $_FILES['carimage']['name']);
        $img_name = $img_detail[0];
        $img_extension = $img_detail[1];
    
        $img_final_location = "carimages/" .$Model. "." . $img_extension;
        $uploaded =  move_uploaded_file($img_temp_loc, $img_final_location);
    } else {
        $img_final_location = $VehicleImage;
    }
 

    if ($img_final_location != '') {
        $result = $connection->update_vehicle($Brand, $VehicleType, $Model, $ManufactureDate, $Color, $img_final_location, $Price, $VIN, $VehcileId);

        if ($result) {
            echo "</h3>Vehicle Updated Successfully !!!</h3>";
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
