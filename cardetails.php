<?php
require('sqlconnection.php');
$connection = new DatabaseConnection();
$results = [];
$row = null;
$customerlogin = '0';
session_start();
if (!empty($_GET['vehicleid'])) {
    $vehicleid = $_GET['vehicleid'];
    $results = $connection->get_vehiclebyid($vehicleid);
    if (mysqli_num_rows($results) == 1) {
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
    }
} else {
    $vehicleid = null;
    $error = "<p> Error! Vehicle ID not found.";
}

if (isset($_SESSION["customerlogin"]) == true && $_SESSION["customerlogin"] == true) {
    $customerlogin = '1';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Wheels On Deals</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/hero-slider.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cardetails.css">

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
    <div class="wrap">
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button id="primary-nav-button" type="button">Menu</button>
                        <a href="index.html">
                            <div class="logo">
                                Wheels on Deals
                            </div>
                        </a>
                        <nav id="primary-nav" class="dropdown cf">
                            <ul class="dropdown menu">
                                <li><a href="index.php">Home</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Checker<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="vinreport.php">VIN Checker</a></li>
                                        <li><a href="vehiclechecker.php">Vehicle Image Checker</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li><a class="nav-link" href="contact.php">Contact Us</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Financial<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="quotation.php">Quotation</a></li>
                                        <li><a href="amortization.php">Amortization</a></li>
                                    </ul>
                                </li>
                                <li><a class="nav-link" href="customerlogin.php">Login</a></li>
                                <li><a class="nav-link" href="adminlogin.php">Admin</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <h1 class='title'>Car Details</h1>
    <div class="card">
        <?php
        if ($row !== null) {
            $str_to_print = "<h2 class='title'>{$row["Brand"]} {$row["Model"]}</h2>";
            $str_to_print .= "<div class='carddetails'>";
            $str_to_print .= "<img src='{$row["VehicleImage"]}' alt='car - {$row["Brand"]} {$row["Model"]}' />";
            $str_to_print .= "</div>";
            $str_to_print .= "<div class='carddetails_features'>";
            $str_to_print .= "<div class='featuredetails'>";
            $str_to_print .= "<dt>Brand</dt>";
            $str_to_print .= "<dd>{$row["Brand"]}</dd>";
            $str_to_print .= "</div>";
            $str_to_print .= "<div class='featuredetails'>";
            $str_to_print .= "<dt>Model</dt>";
            $str_to_print .= "<dd>{$row["Model"]}</dd>";
            $str_to_print .= "</div>";
            $str_to_print .= "<div class='featuredetails'>";
            $str_to_print .= "<dt>Vehicle Type</dt>";
            $str_to_print .= "<dd>{$row["Vehicle_Type"]}</dd>";
            $str_to_print .= "</div>";
            $str_to_print .= "<div class='featuredetails'>";
            $str_to_print .= "<dt>Manufacture Date</dt>";
            $str_to_print .= "<dd>{$row["ManufactureDate"]}</dd>";
            $str_to_print .= "</div>";
            $str_to_print .= "<div class='featuredetails'>";
            $str_to_print .= "<dt>Color</dt>";
            $str_to_print .= "<dd><div class='carcolor' style='background-color: {$row["Color"]}'></div></dd>";
            $str_to_print .= "</div>";
            $str_to_print .= "<div class='featuredetails'>";
            $str_to_print .= "<dt>Price</dt>";
            $str_to_print .= "<dd>$ {$row["Price"]}</dd>";
            $str_to_print .= "</div>";
            $str_to_print .= "<div class='featuredetails'>";
            $str_to_print .= "<dt>VIN</dt>";
            $str_to_print .= "<dd>{$row["VIN"]}</dd>";
            $str_to_print .= "</div>";
            $str_to_print .= "<div class='appointmentwrapper'>";
            $str_to_print .= "<button class='bookvehicle' onclick='bookVehicle({$row["Vehicle_Id"]},{$row["Price"]})'>Purchase Vehicle</button>";
            $str_to_print .= "<button class='bookvehicle' onclick='bookappointment({$row["Vehicle_Id"]})'>Book Appointment</button>";
            $str_to_print .= "</div>";
            $str_to_print .= "</div>";
            echo $str_to_print;
        } else {
            echo '<h1 class="title">No Vehicle Details Found !</h1>';
        }
        ?>
    </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="about-veno">
                        <div class="logo">
                            Wheels on Deals
                        </div>
                        <p style="color: #000;">Mauris sit amet quam congue, pulvinar urna et, congue diam. Suspendisse eu lorem massa. Integer sit amet posuere tellustea dictumst.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="useful-links">
                        <div class="footer-heading">
                            <h3>Useful Links</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li><a style="color: #000;" href="inde.html"><i class="fa fa-stop"></i>Home</a></li>
                                    <li><a style="color: #000;" href="about.html"><i class="fa fa-stop"></i>About</a></li>
                                    <li><a style="color: #000;" href="team.html"><i class="fa fa-stop"></i>Team</a></li>
                                    <li><a style="color: #000;" href="contact.html"><i class="fa fa-stop"></i>Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li><a style="color: #000;" href="faq.html"><i class="fa fa-stop"></i>FAQ</a></li>
                                    <li><a style="color: #000;" href="testimonials.html"><i class="fa fa-stop"></i>Testimonials</a></li>
                                    <li><a style="color: #000;" href="blog.html"><i class="fa fa-stop"></i>Blog</a></li>
                                    <li><a style="color: #000;" href="terms.html"><i class="fa fa-stop"></i>Terms</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="contact-info">
                        <div class="footer-heading">
                            <h3>Contact Information</h3>
                        </div>
                        <p style="color: #000;"><i class="fa fa-map-marker"></i> 212 Barrington Court New York, ABC</p>
                        <ul>
                            <li><span style="color: #000;" >Phone:</span><a style="color: #000;" href="#">+1 333 4040 5566</a></li>
                            <li><span style="color: #000;" >Email:</span><a style="color: #000;" href="#">contact@company.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <p style="color: #000;">Copyright © 2022 Wheels On Deals <a style="color: #000;" href="#">Wheels On Deals</a></p>
    </div>
    <input type='hidden' id='iscustomerloggedIn' value='<?php if (isset($customerlogin)) echo $customerlogin; ?>' />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')

        function bookappointment(vehicleid) {
            const iscustomerloggedIn = $('#iscustomerloggedIn').val()
            if (iscustomerloggedIn === '1') {
                window.location.href = `createappointments.php?vehicleid=${vehicleid}`
            } else {
                alert('Login to Book Appointment !!')
                setTimeout(() => {
                    window.location.href = "customerlogin.php"
                }, 2000);

            }
        }

        function bookVehicle(vehicleid, price) {
            const iscustomerloggedIn = $('#iscustomerloggedIn').val()
            if (iscustomerloggedIn === '1') {
                window.location.href = `purchasevehicle.php?vehicleid=${vehicleid}&price=${price}`
            } else {
                alert('Login to Purchase Vehicle !!')
                setTimeout(() => {
                    window.location.href = "customerlogin.php"
                }, 2000);
            }
        }
    </script>

   
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>