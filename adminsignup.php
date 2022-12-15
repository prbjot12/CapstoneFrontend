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
                                <li><a class="nav-link" href="#">Admin</a></li>
                            </ul>
                        </nav><!-- / #primary-nav -->
                    </div>
                </div>
            </div>
        </header>
    </div>
    <h1 class="title text-center">Admin Portal</h1>
    <h2 class="title text-center">Sign Up</h2>
    <div class="card">
        <form action="saveuser.php" method="post" id="saveuser">
            <p class="subtitle" style="color: #000;">Already Have an Account ? <a style="color: #000;" href="adminlogin.php">Sign In</a></p>
            <div class="email-login">
                <label for="email" style="color: #000;"> <b>Email</b></label>
                <input type="text" placeholder="Enter Email" id="email" name="email">
                <label for="username" style="color: #000;"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" id="username">
                <label for="mobile" style="color: #000;"><b>Mobile</b></label>
                <input type="text" placeholder="Enter Mobile" name="mobile" id="mobile">
                <label for="password" style="color: #000;"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" id="password">
                <label for="confirmpassword" style="color: #000;"><b>Confirm Password</b></label>
                <input type="password" placeholder="Enter Password" name="confirmpassword" id="confirmpassword">
            </div>
            <button class="cta-btn" type="submit" onclick="SignUp(event)">Signup</button>
            <a class="forget-pass" style="color: #000;" href="#">Forgot password?</a>
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
        function SignUp(event) {
            event.preventDefault();
            const Email = $('#email').val()
            const UserName = $('#username').val()
            const Mobile = $('#mobile').val()
            const Password = $('#password').val()
            const ConfirmPassword = $('#confirmpassword').val()

            if (Email !== '' && UserName !== '' && Mobile !== '' && Password !== '' && ConfirmPassword !== '') {
                if (String(Email).toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
                        $('#saveuser').submit();
                } else {
                    alert('Invalid EmailID !!!!')
                }
            } else {
                alert('Please enter all details to proceed further !!!')
            }
        }
    </script>
</body>

</html>