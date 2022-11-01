<?php
class DatabaseConnection
{

    const DB_USER = 'Meena';
    const DB_PASSWORD = '1234567890';
    const DB_HOST = 'localhost';
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
}
