<?php
require('sqlconnection.php');
$connection = new DatabaseConnection();
$results = $connection->get_vehicles();
$vehicleid = '';
if (isset($_GET["vehicleid"])) {
    $vehicleid = $_GET["vehicleid"];
}
$customeremail = '';
$customerphonenumber = '';
$Customerid = '';
$customerfirstname = '';
$customerlastname = '';
session_start();
if (!isset($_SESSION['customerlogin'])) {
    header("location: customerlogin.php");
    exit();
} else {
    $customeremail = $_SESSION["customeremail"];
    $customerphonenumber = $_SESSION["customerphonenumber"];
    $Customerid = $_SESSION["customerid"];
    $customerfirstname = $_SESSION["customerfirstname"];
    $customerlastname = $_SESSION["customerlastname"];
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
    <div class="addnewcard">
        <form action="saveappointment.php" method="post" id="bookappointment" enctype="multipart/form-data">
            <h3 class="title">Book an Appointment</h3>
            <div class="email-login">
                <label for="customeremail"><b>Customer Email</b></label>
                <input type="text" placeholder="Enter Customer Email" name="customeremail" id="customeremail" disabled value='<?php if (isset($customeremail)) echo $customeremail; ?>'>
            </div>
            <div class="email-login">
                <label for="customernumber"><b>Customer Phone Number</b></label>
                <input type="text" placeholder="Enter Phone Number" name="customernumber" id="customernumber" disabled value='<?php if (isset($customerphonenumber)) echo $customerphonenumber; ?>'>
            </div>
            <div class="email-login">
                <label for="customerfirstname"><b>Customer First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="customerfirstname" id="customerfirstname" disabled value='<?php if (isset($customerfirstname)) echo $customerfirstname; ?>'>
            </div>
            <div class="email-login">
                <label for="customerlastname"><b>Customer Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="customerlastname" id="customerlastname" disabled value='<?php if (isset($customerlastname)) echo $customerlastname; ?>'>
            </div>
            <div class="email-login">
                <label for="appointmenttype"><b>Appointment Type</b></label>
                <select id="appointmenttype" name="appointmenttype">
                    <option value='1'>In-Person</option>
                    <option value='2'>Virtual</option>
                </select>
            </div>
            <div class="email-login">
                <label for="location"><b>Location</b></label>
                <input type="text" placeholder="Enter Location" name="location" id="location" value="">
            </div>

            <div class="email-login">
                <label for="Vehicle"><b>Vehicle</b></label>
                <select id="Vehicle" name="Vehicle">
                    <?php
                    $sr_no = 0;
                    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                        $sr_no++;
                        $selected = '';
                        if ($vehicleid != '') {
                            $selected .= ($row['Vehicle_Id'] == $vehicleid) ? 'selected="selected"' : '';
                        }
                        $str_to_print .= "<option value='{$row['Vehicle_Id']}' $selected>{$row['Brand']} - {$row['Model']}</option>";
                        echo $str_to_print;
                    }
                    ?>
                </select>
            </div>
            <div class="email-login">
                <label for="appointmentdate"><b>Appointment Date</b></label>
                <input type="date" placeholder="Enter Appointment Date" name="appointmentdate" id="appointmentdate">
            </div>
            <div class="email-login">
                <label for="appointmenttime"><b>Appointment Time</b></label>
                <select id="appointmenttime" name="appointmenttime">
                    <option>10:00 AM</option>
                    <option>11:00 AM</option>
                    <option>12:00 PM</option>
                    <option>01:00 PM</option>
                    <option>02:00 PM</option>
                    <option>03:00 PM</option>
                    <option>04:00 PM</option>
                    <option>05:00 PM</option>
                    <option>06:00 PM</option>
                    <option>07:00 PM</option>
                </select>
            </div>
            <div class="email-login">
                <label for="comments"><b>Comments</b></label>
                <textarea type="text" placeholder="Enter Comments" name="comments" id="comments" value=""></textarea>
                <input type='hidden' name="customerid" id='customerid' value='<?php if (isset($Customerid)) echo $Customerid; ?>' />
            </div>
            <button class="cta-btn" type="submit" onclick="createappointment(event)">Book Appointment</button>
    </div>

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
        var swear_words_arr = new Array("bloody", "war", "terror");
        var swear_alert_arr = new Array;
        var swear_alert_count = 0;

        function reset_alert_count() {
            swear_alert_count = 0;
        }

        function validate_text(comments) {
            reset_alert_count();
            var compare_text = comments;
            for (var i = 0; i < swear_words_arr.length; i++) {
                for (var j = 0; j < (compare_text.length); j++) {
                    if (swear_words_arr[i] == compare_text.substring(j, (j + swear_words_arr[i].length)).toLowerCase()) {
                        swear_alert_arr[swear_alert_count] = compare_text.substring(j, (j + swear_words_arr[i].length));
                        swear_alert_count++;
                    }
                }
            }
            var alert_text = "";
            for (var k = 1; k <= swear_alert_count; k++) {
                alert_text += "\n" + "(" + k + ")  " + swear_alert_arr[k - 1];
            }
            if (swear_alert_count > 0) {
                alert("The message will not be sent!!!\nThe following illegal words were found:\n_______________________________\n" + alert_text + "\n_______________________________");
                return false
            } else {
               return true
            }
        }

        function createappointment(event) {
            event.preventDefault();
            const CustomerId = $('#customerid').val()
            const Location = $('#location').val()
            const AppointmentDate = $('#appointmentdate').val()
            const AppointmentTime = $('#appointmenttime').val()
            const Comments = $('#comments').val()
            
            if (Location !== '' && AppointmentDate !== '' && AppointmentTime !== '' && Comments !== '') {
                if(!validate_text(Comments)) {
                    return;
                } else {
                    $('#bookappointment').submit();
                }
            } else {
                alert('Please enter all details to proceed further !!!');
            }
        }
    </script>
</body>

</html>