<?php
require('sqlconnection.php');
session_start();
$connection = new DatabaseConnection();
if (isset($_SESSION['customerlogin'])) { 
    $results = $connection->get_appointmentsbycustomerid($_SESSION["customerid"]);
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
    <link rel="stylesheet" href="css/admininventory.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
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
    <h1 style="text-align:center;">View Appointments</h1>
    <div class="buttonWrapper">
        <a class="appButton" href="createappointments.php">Book New Appointment</a>
    </div>
    <table id="vehicleInventory" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Vehicle Name</th>
                <th>Vehicle Type</th>
                <th>Vehicle Image</th>
                <th>Price</th>
                <th>Appointment Date & Time</th>
                <th>Location</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sr_no = 0;
            while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                $sr_no++;
                $str_to_print = "";
                $str_to_print .= "<tr><td>{$row['Brand']} {$row['Model']}</td>";
                $str_to_print .= "<td>{$row['Vehicle_Type']}</td>";
                $str_to_print .= "<td><img style='height:150px;width:150px;' src='{$row['VehicleImage']}' class='productImg'/></td>";
                $str_to_print .= "<td>$ {$row['Price']}</td>";
                $str_to_print .= "<td>{$row['AppointmentDate']} {$row['AppointmentTime']}</td>";
                $str_to_print .= "<td>{$row['LocationName']}</td>";
                $str_to_print .= "<td>{$row['Comments']}</td></tr>";
               
                echo $str_to_print;
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
            <th>Vehicle Name</th>
                <th>Vehicle Type</th>
                <th>Vehicle Image</th>
                <th>Price</th>
                <th>Appointment Date & Time</th>
                <th>Location</th>
                <th>Comments</th>
            </tr>
        </tfoot>
    </table>
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

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/vendor/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#vehicleInventory').DataTable();
        });
    </script>
</body>

</html>