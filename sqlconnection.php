<?php
class DatabaseConnection
{

    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const DB_HOST = 'localhost:3306';
    const DB_NAME = 'WHEELSONDEALS';

    private $dbc;

    function __construct()
    {
        $this->dbc = @mysqli_connect(
            self::DB_HOST,
            self::DB_USER,
            self::DB_PASSWORD,
            self::DB_NAME
        )
            or die('Could not connect to MySQL: ' . mysqli_connect_error());

        mysqli_set_charset($this->dbc, 'utf8');
    }

    function prepare_string($string)
    {
        $string = strip_tags($string);
        $string = mysqli_real_escape_string($this->dbc, trim($string));
        return $string;
    }

    function get_dbc()
    {
        return $this->dbc;
    }

    function register_adminuser($name, $email, $password, $mobile)
    {

        $name_clean = $this->prepare_string($name);
        $email_clean = $this->prepare_string($email);
        $password_clean = $this->prepare_string($password);
        $mobile_clean = $this->prepare_string($mobile);

        $query = "INSERT INTO ADMINUSERS(Email,Phone_Number,UserName,Password) VALUES (?,?,?,?)";

        $stmt = mysqli_prepare($this->dbc, $query);

        mysqli_stmt_bind_param(
            $stmt,
            'ssss',
            $email_clean,
            $mobile_clean,
            $name_clean,
            $password_clean
        );

        $result = mysqli_stmt_execute($stmt);

        return $result;
    }

    function loginadminuser($email, $password)
    {
        $email_clean = $this->prepare_string($email);
        $password_clean = $this->prepare_string($password);
        $query = "SELECT * FROM ADMINUSERS WHERE email = ? and password = ?;";
        $stmt = mysqli_prepare($this->dbc, $query);
        mysqli_stmt_bind_param(
            $stmt,
            'ss',
            $email_clean,
            $password_clean
        );

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return $result;
    }

    function create_vehicle($Brand, $VehicleType, $Model, $ManufactureDate, $Color, $img_final_location, $Price, $VIN)
    {

        $brand_clean = $this->prepare_string($Brand);
        $vehicletype_clean = $this->prepare_string($VehicleType);
        $model_clean = $this->prepare_string($Model);
        $manufacturedate_clean = $this->prepare_string($ManufactureDate);
        $color_clean = $this->prepare_string($Color);
        $image_clean = $this->prepare_string($img_final_location);
        $price_clean = $this->prepare_string($Price);
        $VIN_clean = $this->prepare_string($VIN);

        $query = "INSERT INTO VEHICLES(Brand,VehicleType,Model,ManufactureDate,VehicleImage,Color,Price,VIN) VALUES (?,?,?,?,?,?,?,?)";

        $stmt = mysqli_prepare($this->dbc, $query);

        mysqli_stmt_bind_param(
            $stmt,
            'ssssssss',
            $brand_clean,
            $vehicletype_clean,
            $model_clean,
            $manufacturedate_clean,
            $image_clean,
            $color_clean,
            $price_clean,
            $VIN_clean
        );
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }

    function get_vehicles()
    {
        $query = 'SELECT *,VTM.Vehicle_Type FROM `VEHICLES` V INNER JOIN VEHICLETYPEMASTER VTM ON VTM.VehicleType_Id = V.VehicleType';
        $results = @mysqli_query($this->dbc, $query);
        return $results;
    }

    function get_vehiclebyid($vehicleId)
    {
        $vehicleid_clean = $this->prepare_string($vehicleId);

        $query = 'SELECT *,VTM.Vehicle_Type FROM `VEHICLES` V INNER JOIN VEHICLETYPEMASTER VTM ON VTM.VehicleType_Id = V.VehicleType WHERE V.Vehicle_Id = ?';
        $stmt = mysqli_prepare($this->dbc, $query);

        mysqli_stmt_bind_param(
            $stmt,
            's',
            $vehicleid_clean
        );
        mysqli_stmt_execute($stmt);
        $results =  mysqli_stmt_get_result($stmt);
        return $results;
    }

    function register_customer($email, $password, $mobile,  $firstname, $lastname, $province, $city, $country)
    {
        $email_clean = $this->prepare_string($email);
        $password_clean = $this->prepare_string($password);
        $mobile_clean = $this->prepare_string($mobile);
        $firstname_clean = $this->prepare_string($firstname);
        $lastname_clean = $this->prepare_string($lastname);
        $province_clean = $this->prepare_string($province);
        $city_clean = $this->prepare_string($city);
        $country_clean = $this->prepare_string($country);

        $query = "INSERT INTO CUSTOMERS (Email, Phone_Number, Password, FirstName, LastName, State, CITY, Country) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->dbc, $query);

        mysqli_stmt_bind_param(
            $stmt,
            'ssssssss',
            $email_clean,
            $mobile_clean,
            $password_clean,
            $firstname_clean,
            $lastname_clean,
            $province_clean,
            $city_clean,
            $country_clean
        );

        $result = mysqli_stmt_execute($stmt);

        return $result;
    }

    function logincustomer($email, $password)
    {
        $email_clean = $this->prepare_string($email);
        $password_clean = $this->prepare_string($password);
        $query = "SELECT * FROM CUSTOMERS WHERE email = ? and password = ?;";
        $stmt = mysqli_prepare($this->dbc, $query);
        mysqli_stmt_bind_param(
            $stmt,
            'ss',
            $email_clean,
            $password_clean
        );

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return $result;
    }

    function create_appointment($CustomerID, $AppointmentType, $Location, $AppointmentDate,  $AppointmentTime,  $Comments,  $Vehicle)
    {

        $customerid_clean = $this->prepare_string($CustomerID);
        $appointmenttype_clean = $this->prepare_string($AppointmentType);
        $location_clean = $this->prepare_string($Location);
        $appointmentdate_clean = $this->prepare_string($AppointmentDate);
        $appointmenttime_clean = $this->prepare_string($AppointmentTime);
        $comments_clean = $this->prepare_string($Comments);
        $vehicleid_clean = $this->prepare_string($Vehicle);

        $query = "INSERT INTO Appointments (Customer_Id, Vehicle_Id, AppointmentDate, AppointmentTime, LocationName, Comments, Appointment_Type) VALUES (?,?,?,?,?,?,?)";

        $stmt = mysqli_prepare($this->dbc, $query);

        mysqli_stmt_bind_param(
            $stmt,
            'sssssss',
            $customerid_clean,
            $vehicleid_clean,
            $appointmentdate_clean,
            $appointmenttime_clean,
            $location_clean,
            $comments_clean,
            $appointmenttype_clean
        );
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }

    function get_appointmentsbycustomerid($customerid)
    {
        $customerid_clean = $this->prepare_string($customerid);
        $query = 'SELECT A.*,ATM.AppointmentType,V.*,C.*,VT.Vehicle_Type FROM APPOINTMENTS A INNER JOIN APPOINTMENTTYPEMASTER ATM ON ATM.AppointmentType_Id = A.Appointment_Type  INNER JOIN VEHICLES V ON V.Vehicle_Id = A.Vehicle_Id  INNER JOIN VEHICLETYPEMASTER VT ON VT.VehicleType_Id = V.VehicleType INNER JOIN CUSTOMERS C ON C.Customer_Id = A.Customer_Id WHERE A.Customer_Id = ?';
        $stmt = mysqli_prepare($this->dbc, $query);
        mysqli_stmt_bind_param(
            $stmt,
            's',
            $customerid_clean
        );
        mysqli_stmt_execute($stmt);
        $results =  mysqli_stmt_get_result($stmt);
        return $results;
    }

    function update_vehicle($Brand, $VehicleType, $Model, $ManufactureDate, $Color, $img_final_location, $Price, $VIN, $VehcileId)
    {

        $brand_clean = $this->prepare_string($Brand);
        $vehicletype_clean = $this->prepare_string($VehicleType);
        $model_clean = $this->prepare_string($Model);
        $manufacturedate_clean = $this->prepare_string($ManufactureDate);
        $color_clean = $this->prepare_string($Color);
        $image_clean = $this->prepare_string($img_final_location);
        $price_clean = $this->prepare_string($Price);
        $VIN_clean = $this->prepare_string($VIN);
        $VehcileId_clean =  $this->prepare_string($VehcileId);

        $query = "UPDATE VEHICLES SET Brand = ?,VehicleType = ?,Model = ?,ManufactureDate = ?,VehicleImage = ?,Color = ?,Price = ?,VIN = ? WHERE Vehicle_Id = ?";

        $stmt = mysqli_prepare($this->dbc, $query);

        mysqli_stmt_bind_param(
            $stmt,
            'sssssssss',
            $brand_clean,
            $vehicletype_clean,
            $model_clean,
            $manufacturedate_clean,
            $image_clean,
            $color_clean,
            $price_clean,
            $VIN_clean,
            $VehcileId_clean
        );
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }

    function delete_vehicle($VehcileId)
    {

        $vehicleid_clean = $this->prepare_string($VehcileId);

        $query = "DELETE FROM Appointments WHERE Vehicle_Id = ?;";
        $stmt = mysqli_prepare($this->dbc, $query);

        mysqli_stmt_bind_param(
            $stmt,
            's',
            $vehicleid_clean
        );
        $result = mysqli_stmt_execute($stmt);

        $deletequery = "DELETE FROM Vehicles WHERE Vehicle_Id = ?;";
        $deletestmt = mysqli_prepare($this->dbc, $deletequery);

        mysqli_stmt_bind_param(
            $deletestmt,
            's',
            $vehicleid_clean
        );
        $result = mysqli_stmt_execute($deletestmt);
        return $result;
    }

    function create_order($CustomerID,  $Vehicleid, $Paymentid, $Vehicleprice)
    {

        $customerid_clean = $this->prepare_string($CustomerID);
        $vehicleid_clean = $this->prepare_string($Vehicleid);
        $paymentid_clean = $this->prepare_string($Paymentid);
        $vehicleprice_clean = $this->prepare_string($Vehicleprice);

        $query = "INSERT INTO VehicleOrders (Customer_Id, Vehicle_Id, PaymentID, VehiclePrice) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->dbc, $query);

        mysqli_stmt_bind_param(
            $stmt,
            'ssss',
            $customerid_clean,
            $vehicleid_clean,
            $paymentid_clean,
            $vehicleprice_clean
        );
        $result = mysqli_stmt_execute($stmt);
        return $result;
    }
}
