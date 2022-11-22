<?php
require('sqlconnection.php');
session_start();
$connection = new DatabaseConnection();
$results = [];
$row = null;
$customerlogin = '0';

if (!isset($_SESSION['userid'])) {
    header("location: adminlogin.php");
    exit();
}

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

?>
<!DOCTYPE html>
<html>

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
    <link rel="stylesheet" href="css/adminlogin.css">

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
                                <li><a href="vinreport.php">VIN Checker</a></li>
                                <li>
                                    <a href="about-us.php">About</a>
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
                        </nav><!-- / #primary-nav -->
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="addnewcard">
        <form action="updatevehicles.php" method="post" id="editvehicle" enctype="multipart/form-data">
            <h3 class="title">Edit Vehicle</h3>
            <div class="email-login">
                <label for="Brand"> <b>Brand</b></label>
                <select id="Brand" name="Brand">
                    <option <?php if($row['Brand'] == 'BMW'): ?> selected="selected"<?php endif; ?>>Acura</option>
                    <option <?php if($row['Brand'] == 'Alfa-Romeo'): ?> selected="selected"<?php endif; ?>>Alfa-Romeo</option>
                    <option <?php if($row['Brand'] == 'Aston Martin'): ?> selected="selected"<?php endif; ?>>Aston Martin</option>
                    <option <?php if($row['Brand'] == 'Audi'): ?> selected="selected"<?php endif; ?>>Audi</option>
                    <option <?php if($row['Brand'] == 'BMW'): ?> selected="selected"<?php endif; ?>>BMW</option>
                    <option <?php if($row['Brand'] == 'Bentley'): ?> selected="selected"<?php endif; ?>>Bentley</option>
                    <option <?php if($row['Brand'] == 'Buick'): ?> selected="selected"<?php endif; ?>>Buick</option>
                    <option <?php if($row['Brand'] == 'Cadilac'): ?> selected="selected"<?php endif; ?>>Cadilac</option>
                    <option <?php if($row['Brand'] == 'Chevrolet'): ?> selected="selected"<?php endif; ?>>Chevrolet</option>
                    <option <?php if($row['Brand'] == 'Chrysler'): ?> selected="selected"<?php endif; ?>>Chrysler</option>
                    <option <?php if($row['Brand'] == 'Daewoo'): ?> selected="selected"<?php endif; ?>>Daewoo</option>
                    <option <?php if($row['Brand'] == 'Daihatsu'): ?> selected="selected"<?php endif; ?>>Daihatsu</option>
                    <option <?php if($row['Brand'] == 'Dodge'): ?> selected="selected"<?php endif; ?>>Dodge</option>
                    <option <?php if($row['Brand'] == 'Eagle'): ?> selected="selected"<?php endif; ?>>Eagle</option>
                    <option <?php if($row['Brand'] == 'Ferrari'): ?> selected="selected"<?php endif; ?>>Ferrari</option>
                    <option <?php if($row['Brand'] == 'Fiat'): ?> selected="selected"<?php endif; ?>>Fiat</option>
                    <option <?php if($row['Brand'] == 'Fisker'): ?> selected="selected"<?php endif; ?>>Fisker</option>
                    <option <?php if($row['Brand'] == 'Ford'): ?> selected="selected"<?php endif; ?>>Ford</option>
                    <option <?php if($row['Brand'] == 'Freighliner'): ?> selected="selected"<?php endif; ?>>Freighliner</option>
                    <option <?php if($row['Brand'] == 'GMC - General Motors Company'): ?> selected="selected"<?php endif; ?>>GMC - General Motors Company</option>
                    <option <?php if($row['Brand'] == 'Genesis'): ?> selected="selected"<?php endif; ?>>Genesis</option>
                    <option <?php if($row['Brand'] == 'Geo'): ?> selected="selected"<?php endif; ?>>Geo</option>
                    <option <?php if($row['Brand'] == 'Honda'): ?> selected="selected"<?php endif; ?>>Honda</option>
                    <option <?php if($row['Brand'] == 'Hummer'): ?> selected="selected"<?php endif; ?>>Hummer</option>
                    <option <?php if($row['Brand'] == 'Hyundai'): ?> selected="selected"<?php endif; ?>>Hyundai</option>
                    <option <?php if($row['Brand'] == 'Infinity'): ?> selected="selected"<?php endif; ?>>Infinity</option>
                    <option <?php if($row['Brand'] == 'Isuzu'): ?> selected="selected"<?php endif; ?>>Isuzu</option>
                    <option <?php if($row['Brand'] == 'Jaguar'): ?> selected="selected"<?php endif; ?>>Jaguar</option>
                    <option <?php if($row['Brand'] == 'Jeep'): ?> selected="selected"<?php endif; ?>>Jeep</option>
                    <option <?php if($row['Brand'] == 'Kla'): ?> selected="selected"<?php endif; ?>>Kla</option>
                    <option <?php if($row['Brand'] == 'Lamborghini'): ?> selected="selected"<?php endif; ?>>Lamborghini</option>
                    <option <?php if($row['Brand'] == 'Land Rover'): ?> selected="selected"<?php endif; ?>>Land Rover</option>
                    <option <?php if($row['Brand'] == 'Lexus'): ?> selected="selected"<?php endif; ?>>Lexus</option>
                    <option <?php if($row['Brand'] == 'Lincoln'): ?> selected="selected"<?php endif; ?>>Lincoln</option>
                    <option <?php if($row['Brand'] == 'Lotus'): ?> selected="selected"<?php endif; ?>>Lotus</option>
                    <option <?php if($row['Brand'] == 'Mazda'): ?> selected="selected"<?php endif; ?>>Mazda</option>
                    <option <?php if($row['Brand'] == 'Maserati'): ?> selected="selected"<?php endif; ?>>Maserati</option>
                    <option <?php if($row['Brand'] == 'Maybach'): ?> selected="selected"<?php endif; ?>>Maybach</option>
                    <option <?php if($row['Brand'] == 'McLaren'): ?> selected="selected"<?php endif; ?>>McLaren</option>
                    <option <?php if($row['Brand'] == 'Mercedez-Benz'): ?> selected="selected"<?php endif; ?>>Mercedez-Benz</option>
                    <option <?php if($row['Brand'] == 'Mercury'): ?> selected="selected"<?php endif; ?>>Mercury</option>
                    <option <?php if($row['Brand'] == 'Mini'): ?> selected="selected"<?php endif; ?>>Mini</option>
                    <option <?php if($row['Brand'] == 'Mitsubishi'): ?> selected="selected"<?php endif; ?>>Mitsubishi</option>
                    <option <?php if($row['Brand'] == 'Nissan'): ?> selected="selected"<?php endif; ?>>Nissan</option>
                    <option <?php if($row['Brand'] == 'Oldsmobile'): ?> selected="selected"<?php endif; ?>>Oldsmobile</option>
                    <option <?php if($row['Brand'] == 'Panoz'): ?> selected="selected"<?php endif; ?>>Panoz</option>
                    <option <?php if($row['Brand'] == 'Plymouth'): ?> selected="selected"<?php endif; ?>>Plymouth</option>
                    <option <?php if($row['Brand'] == 'Polestar'): ?> selected="selected"<?php endif; ?>>Polestar</option>
                    <option <?php if($row['Brand'] == 'Pontiac'): ?> selected="selected"<?php endif; ?>>Pontiac</option>
                    <option <?php if($row['Brand'] == 'Porsche'): ?> selected="selected"<?php endif; ?>>Porsche</option>
                    <option <?php if($row['Brand'] == 'Ram'): ?> selected="selected"<?php endif; ?>>Ram</option>
                    <option <?php if($row['Brand'] == 'Rivian'): ?> selected="selected"<?php endif; ?>>Rivian</option>
                    <option <?php if($row['Brand'] == 'RollsRoyce'): ?> selected="selected"<?php endif; ?>>RollsRoyce</option>
                    <option <?php if($row['Brand'] == 'Saab'): ?> selected="selected"<?php endif; ?>>Saab</option>
                    <option <?php if($row['Brand'] == 'Saturn'): ?> selected="selected"<?php endif; ?>>Saturn</option>
                    <option <?php if($row['Brand'] == 'Smart'): ?> selected="selected"<?php endif; ?>>Smart</option>
                    <option <?php if($row['Brand'] == 'Subaru'): ?> selected="selected"<?php endif; ?>>Subaru</option>
                    <option <?php if($row['Brand'] == 'Susuki'): ?> selected="selected"<?php endif; ?>>Susuki</option>
                    <option <?php if($row['Brand'] == 'Tesla'): ?> selected="selected"<?php endif; ?>>Tesla</option>
                    <option <?php if($row['Brand'] == 'Toyota'): ?> selected="selected"<?php endif; ?>>Toyota</option>
                    <option <?php if($row['Brand'] == 'Volkswagen'): ?> selected="selected"<?php endif; ?>>Volkswagen</option>
                    <option <?php if($row['Brand'] == 'Volvo'): ?> selected="selected"<?php endif; ?>>Volvo</option>
                </select>
                <label for="VehicleType"><b>Vehvicle Type</b></label>
                <select id="VehicleType" name="VehicleType">
                    <option value="1" <?php if($row['VehicleType'] == '1'): ?> selected="selected"<?php endif; ?>>SUV</option>
                    <option value="2" <?php if($row['VehicleType'] == '2'): ?> selected="selected"<?php endif; ?>>Sedan</option>
                    <option value="3" <?php if($row['VehicleType'] == '3'): ?> selected="selected"<?php endif; ?>>Coupe</option>
                    <option value="4" <?php if($row['VehicleType'] == '4'): ?> selected="selected"<?php endif; ?>>Convertible</option>
                    <option value="5" <?php if($row['VehicleType'] == '5'): ?> selected="selected"<?php endif; ?>>Hatchback</option>
                    <option value="6" <?php if($row['VehicleType'] == '6'): ?> selected="selected"<?php endif; ?>>Pickup</option>
                    <option value="7" <?php if($row['VehicleType'] == '7'): ?> selected="selected"<?php endif; ?>>Van</option>
                    <option value="8" <?php if($row['VehicleType'] == '8'): ?> selected="selected"<?php endif; ?>>Minivan</option>
                    <option value="9" <?php if($row['VehicleType'] == '9'): ?> selected="selected"<?php endif; ?>>Wagon</option>
                </select>
                <label for="Model"><b>Model</b></label>
                <input type="text" placeholder="Enter Model" name="Model" id="Model"  value='<?php if (isset($row["Model"])) echo $row["Model"]; ?>'>
                <label for="manufacturedate"><b>Manufacture Date</b></label>
                <input type="date" placeholder="Enter Manufacture Date" name="manufacturedate" id="manufacturedate" value='<?php if (isset($row["ManufactureDate"])) echo $row["ManufactureDate"]; ?>'>
                <label for="Price"><b>Price</b></label>
                <input type="text" placeholder="Enter Price" name="Price" id="Price" value='<?php if (isset($row["Price"])) echo $row["Price"]; ?>'>
                <label for="VIN"><b>VIN</b></label>
                <input type="text" placeholder="Enter VIN" name="VIN" id="VIN" value='<?php if (isset($row["VIN"])) echo $row["VIN"]; ?>'>
                <label for="carimage"><b>Vehicle Image</b></label>
                <input type="file" name="carimage" id="carimage" style="margin-bottom: 10px;" accept="image/*">
                <span>Existing FileName: <?php if (isset($row["VehicleImage"])) echo $row["VehicleImage"]; ?></span>
                <input type="hidden" name="VehicleImage" id="VehicleImage" value='<?php if (isset($row["VehicleImage"])) echo $row["VehicleImage"]; ?>'>
                <label for="color"><b>Vehicle Color</b></label>
                <input type="color" name="color" id="color" style="margin-bottom: 10px;" value='<?php if (isset($row["Color"])) echo $row["Color"]; ?>'>
                <input type='hidden' name="VehcileId" id='VehcileId' value='<?php if (isset($_GET['vehicleid'])) echo $_GET['vehicleid']; ?>' />
            </div>
            <button class="cta-btn" type="submit" onclick="UpdateVehicle(event)">Edit Vehicle</button>
        </form>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="about-veno">
                        <div class="logo">
                            Wheels on Deals
                        </div>
                        <p>Mauris sit amet quam congue, pulvinar urna et, congue diam. Suspendisse eu lorem massa. Integer sit amet posuere tellustea dictumst.</p>
                        <ul class="social-icons">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="useful-links">
                        <div class="footer-heading">
                            <h4>Useful Links</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="inde.html"><i class="fa fa-stop"></i>Home</a></li>
                                    <li><a href="about.html"><i class="fa fa-stop"></i>About</a></li>
                                    <li><a href="team.html"><i class="fa fa-stop"></i>Team</a></li>
                                    <li><a href="contact.html"><i class="fa fa-stop"></i>Contact Us</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="faq.html"><i class="fa fa-stop"></i>FAQ</a></li>
                                    <li><a href="testimonials.html"><i class="fa fa-stop"></i>Testimonials</a></li>
                                    <li><a href="blog.html"><i class="fa fa-stop"></i>Blog</a></li>
                                    <li><a href="terms.html"><i class="fa fa-stop"></i>Terms</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="contact-info">
                        <div class="footer-heading">
                            <h4>Contact Information</h4>
                        </div>
                        <p><i class="fa fa-map-marker"></i> 212 Barrington Court New York, ABC</p>
                        <ul>
                            <li><span>Phone:</span><a href="#">+1 333 4040 5566</a></li>
                            <li><span>Email:</span><a href="#">contact@company.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <p>Copyright © 2022 Wheels On Deals <a href="#">Wheels On Deals</a></p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script>
        function UpdateVehicle(event) {
            event.preventDefault();
            const Brand = $('#Brand').val()
            const VehicleType = $('#VehicleType').val()
            const Model = $('#Model').val()
            const ManufactureDate = $('#manufacturedate').val()
            const CarImage = $('#carimage').val()
            const Color = $('#color').val()
            const Price = $('#Price').val()
            const VIN = $('#VIN').val()
            const VehcileImage = $('#VehicleImage').val()

            if (Brand !== '' && VehicleType !== '' && Model !== '' && ManufactureDate !== '' && Color !== '' && Price !== '' && VIN !== '' && (CarImage !== '' || VehcileImage !== '')) {
                $('#editvehicle').submit();
            } else {
                alert('Please enter all details to proceed further !!!');
            }
        }
    </script>
</body>

</html>