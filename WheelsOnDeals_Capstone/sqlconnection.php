<?php
	class DatabaseConnection {

		const DB_USER = 'Meena';
		const DB_PASSWORD = '1234567890';
		const DB_HOST = 'localhost';
		const DB_NAME = 'wheelsondeals';

		private $dbc;

		function __construct() {
			$this->dbc = @mysqli_connect(
				self::DB_HOST,
				self::DB_USER,
				self::DB_PASSWORD,
				self::DB_NAME
			)
			OR die(
				'Could not connect to MySQL: ' . mysqli_connect_error()
			);

			mysqli_set_charset($this->dbc, 'utf8');
		}

		function prepare_string($string) {
			$string = strip_tags($string);
			$string = mysqli_real_escape_string($this->dbc, trim($string));
			return $string;
		}

		function get_dbc() {
			return $this->dbc;
		}
        
        function register_adminuser($name, $email, $password,$mobile){
            
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

        function loginadminuser($email, $password) {
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
	}
?>