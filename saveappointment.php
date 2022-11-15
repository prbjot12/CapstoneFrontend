<?php
require('sqlconnection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $connection = new DatabaseConnection();
    $CustomerID = $_POST['customerid'];
    $AppointmentType = $_POST['appointmenttype'];
    $Location = $_POST['location'];
    $AppointmentDate = $_POST['appointmentdate'];
    $AppointmentTime = $_POST['appointmenttime'];
    $Comments = $_POST['comments'];
    $Vehicle = $_POST['Vehicle'];

        $result = $connection->create_appointment($CustomerID, $AppointmentType, $Location, $AppointmentDate,  $AppointmentTime,  $Comments,  $Vehicle);
        if ($result) {
            echo "</h3>Appointment Created Successfully !!!</h3>";
            header("Location: viewappointments.php");
            exit;
        } else {
            echo $result;
            echo "</h3>Some error in Saving the data</h3>";
        }
} else {
    echo "</h3>Page Accepts only POST request</h3>";
}
