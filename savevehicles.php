<?php
require('sqlconnection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $connection = new DatabaseConnection();
    $Brand = $_POST['Brand'];
    $VehicleType = $_POST['VehicleType'];
    $Model = $_POST['Model'];
    $ManufactureDate = $_POST['manufacturedate'];
    $Color = $_POST['color'];
    $Price = $_POST['Price'];
    $VIN = $_POST['VIN'];
    $uploaded = false;

    $img_temp_loc = $_FILES['carimage']['tmp_name'];
    $img_detail = explode(".", $_FILES['carimage']['name']);
    $img_name = $img_detail[0];
    $img_extension = $img_detail[1];

    $img_final_location = "carimages/" .$Model. "." . $img_extension;
    $uploaded =  move_uploaded_file($img_temp_loc, $img_final_location);

    if ($uploaded) {
        $result = $connection->create_vehicle($Brand, $VehicleType, $Model, $ManufactureDate, $Color, $img_final_location, $Price, $VIN);

        if ($result) {
            echo "</h3>Vehicle Created Successfully !!!</h3>";
            header("Location: admininventory.php");
            exit;
        } else {
            echo "</h3>Some error in Saving the data</h3>";
        }
    } else {
        echo "</h3>Some error in Saving the data</h3>";
    }
} else {
    echo "</h3>Page Accepts only POST request</h3>";
}
