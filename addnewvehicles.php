<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location: adminlogin.php");
    exit();
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
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Checker<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="vinreport.php">VIN Checker</a></li>
                                        <li><a href="vehiclechecker.php">Vehicle Image Checker</a></li>
                                    </ul>
                                </li>
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
    <h1 class="title text-center">Add New Vehicle</h1>
    <div class="addnewcard">
        <form action="savevehicles.php" method="post" id="createvehicle" enctype="multipart/form-data">
           
            <h2 class="text-center">Enter Car Details</h2>
            <div class="email-login">
                <label for="Brand" style="color: #000;"> <b>Brand</b></label>
                <select id="Brand" name="Brand">
                    <option>Acura</option>
                    <option>Alfa-Romeo</option>
                    <option>Aston Martin</option>
                    <option>Audi</option>
                    <option>BMW</option>
                    <option>Bentley</option>
                    <option>Buick</option>
                    <option>Cadilac</option>
                    <option>Chevrolet</option>
                    <option>Chrysler</option>
                    <option>Daewoo</option>
                    <option>Daihatsu</option>
                    <option>Dodge</option>
                    <option>Eagle</option>
                    <option>Ferrari</option>
                    <option>Fiat</option>
                    <option>Fisker</option>
                    <option>Ford</option>
                    <option>Freighliner</option>
                    <option>GMC - General Motors Company</option>
                    <option>Genesis</option>
                    <option>Geo</option>
                    <option>Honda</option>
                    <option>Hummer</option>
                    <option>Hyundai</option>
                    <option>Infinity</option>
                    <option>Isuzu</option>
                    <option>Jaguar</option>
                    <option>Jeep</option>
                    <option>Kla</option>
                    <option>Lamborghini</option>
                    <option>Land Rover</option>
                    <option>Lexus</option>
                    <option>Lincoln</option>
                    <option>Lotus</option>
                    <option>Mazda</option>
                    <option>Maserati</option>
                    <option>Maybach</option>
                    <option>McLaren</option>
                    <option>Mercedez-Benz</option>
                    <option>Mercury</option>
                    <option>Mini</option>
                    <option>Mitsubishi</option>
                    <option>Nissan</option>
                    <option>Oldsmobile</option>
                    <option>Panoz</option>
                    <option>Plymouth</option>
                    <option>Polestar</option>
                    <option>Pontiac</option>
                    <option>Porsche</option>
                    <option>Ram</option>
                    <option>Rivian</option>
                    <option>Rolls_Royce</option>
                    <option>Saab</option>
                    <option>Saturn</option>
                    <option>Smart</option>
                    <option>Subaru</option>
                    <option>Susuki</option>
                    <option>Tesla</option>
                    <option>Toyota</option>
                    <option>Volkswagen</option>
                    <option>Volvo</option>
                </select>
                <label for="VehicleType" style="color: #000;"><b>Vehvicle Type</b></label>
                <select id="VehicleType" name="VehicleType">
                    <option value="1">SUV</option>
                    <option value="2">Sedan</option>
                    <option value="3">Coupe</option>
                    <option value="4">Convertible</option>
                    <option value="5">Hatchback</option>
                    <option value="6">Pickup</option>
                    <option value="7">Van</option>
                    <option value="8">Minivan</option>
                    <option value="9">Wagon</option>
                </select>
                <label for="Model" style="color: #000;"><b>Model</b></label>
                <input type="text" placeholder="Enter Model" name="Model" id="Model">
                <label for="manufacturedate" style="color: #000;"><b>Manufacture Date</b></label>
                <input type="date" placeholder="Enter Manufacture Date" name="manufacturedate" id="manufacturedate">
                <label for="Price" style="color: #000;"><b>Price</b></label>
                <input type="text" placeholder="Enter Price" name="Price" id="Price">
                <label for="VIN" style="color: #000;"><b>VIN</b></label>
                <input type="text" placeholder="Enter VIN" name="VIN" id="VIN">
                <label for="carimage" style="color: #000;"><b>Vehicle Image</b></label>
                <input type="file" name="carimage" id="carimage" style="margin-bottom: 10px;" accept="image/*">
                <label for="color" style="color: #000;"><b>Vehicle Color</b></label>
                <input type="color" name="color" id="color" style="margin-bottom: 10px;">
            </div>
            <button class="cta-btn" type="submit" onclick="AddNewVehicle(event)">Add New Vehicle</button>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script>
        function AddNewVehicle(event) {
            event.preventDefault();
            const Brand = $('#Brand').val()
            const VehicleType = $('#VehicleType').val()
            const Model = $('#Model').val()
            const ManufactureDate = $('#manufacturedate').val()
            const CarImage = $('#carimage').val()
            const Color = $('#color').val()
            const Price = $('#Price').val()
            const VIN = $('#VIN').val()

            if (Brand !== '' && VehicleType !== '' && Model !== '' && ManufactureDate !== '' && CarImage !== '' && Color !== '' && Price !== '' && VIN !== '') {
                $('#createvehicle').submit();
            } else {
                alert('Please enter all details to proceed further !!!');
            }
        }
    </script>
</body>

</html>