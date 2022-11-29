<?php
require('sqlconnection.php');
$connection = new DatabaseConnection();
$results = $connection->get_vehicles();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Wheels On Deals - Vehicle Checker</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/hero-slider.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/adminlogin.css">
    <link rel="stylesheet" href="css/jquery.uploader.css">

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
                                        <li><a href="#">VIN Checker</a></li>
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
    <div class="pageWrapper">
        <div class="addnewcard" id="selectvehicle">
            <form>
                <h3 class="title">Upload Vehicle Images For Validation</h3>
                <h6 class="subtitle">Powerd by <a href='https://rapidapi.com/organization/sensorai' target="_blank">SENSOR AI</a></h6>
                <div class="email-login">
                    <input type="text" id="vehicleimages" value="" />
                </div>
                <button class="cta-btn" type="submit" onclick="getDataFromSensorAI(event)">Validate Images</button>
            </form>
        </div>
        <div class="vinnewcard" id="quotationsummary">
            <form>
                <h3 class="title">Vehicle Validator Results</h3>
                <h6 class="subtitle">Powerd by <a href='https://rapidapi.com/organization/sensorai' target="_blank">SENSOR AI</a></h6>
                <div id="loading">Loading...</div>
                <div class="quotationdetailswrapper">
                    <dl id="vinreport">

                    </dl>
                </div>
                <button class="cta-btn" onclick="window.location.reload()">Validate Another Vehicle</button>
            </form>
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
    <script src="js/vendor/jquery.uploader.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <input type="hidden" id="vehicleId" value="" />
    <script>
        const supportedfiles = ['jpg', 'png', 'jpeg']

        $(document).ready(function() {
            localStorage.removeItem("vehicleImages")
            $('#vehicleimages').uploader({
                multiple: false
            }).on("upload-success", function(file, data) {
                const base64Strings = localStorage.getItem("vehicleImages") ? JSON.parse(localStorage.getItem("vehicleImages")) : []
                if (data.file.name) {
                    const fileType = data.file.name.slice(data.file.name.lastIndexOf('.') + 1, data.file.name.length)
                    if (!supportedfiles.includes(fileType)) {
                        alert(supportedfiles.join(',') + "accepted file formats !")
                        $('#vehicleimages').uploader('clean')
                    } else if (data.file.size > 754246) {
                        alert("Image Size cannot be larger than 750KB !")
                        $('#vehicleimages').uploader('clean')
                    } else {
                        toBase64(data.file).then((base64String) => {
                            const newimage = {
                                id: data.id,
                                image: base64String
                            }
                            base64Strings.push(newimage)
                            localStorage.setItem("vehicleImages", JSON.stringify(base64Strings))
                        })
                    }

                }
            }).on("file-remove", function(file, data) {
                const base64Strings = localStorage.getItem("vehicleImages") ? JSON.parse(localStorage.getItem("vehicleImages")) : []
                base64Strings.splice(base64Strings.findIndex((image) => image.id === data.id), 1)
                localStorage.setItem("vehicleImages", JSON.stringify(base64Strings))
            })
        })

        const toBase64 = file => new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result.split(',')[1].trim());
            reader.onerror = error => reject(error);
        });

        async function getDataFromSensorAI(event) {
            event.preventDefault();
            const base64Strings = localStorage.getItem("vehicleImages") ? JSON.parse(localStorage.getItem("vehicleImages")) : []
            if (base64Strings.length <= 0) {
                alert('Please upload image to proceed further !')
            } else if (base64Strings.length > 5) {
                alert('Maximum 5 images could be uploaded !')
            } else {
                console.log(base64Strings, 'base64Strings')
                const settings = {
                    async: true,
                    crossDomain: true,
                    url: "https://vehicle-damage-assessment.p.rapidapi.com/run",
                    method: "POST",
                    headers: {
                        "content-type": "application/json",
                        "X-RapidAPI-Key": "06bceb3ae9msh014e9370a358029p149649jsna5e40e99366d",
                        "X-RapidAPI-Host": "vehicle-damage-assessment.p.rapidapi.com"
                    },
                    processData: false,
                    data: {
                        draw_result: true,
                        image: "https://jixjiastorage.blob.core.windows.net/public/sensor-ai/vehicle_damage/sample.jpg"
                    }
                };
                $('#selectvehicle').fadeOut()
                $('#quotationsummary').fadeIn()
                base64Strings.forEach((img, imgIndex) => {
                    settings.data.image = img.image
                    settings.data = JSON.stringify(settings.data)
                    console.log(settings, 'settings')
                    $.ajax(settings).done(function(response) {
                        console.log(response, 'response')
                        let resultstr = '';
                        if (response.output.elements.length > 0) {
                            response.output.elements.forEach((result, index) => {
                                resultstr += `<div class="quotationdetails">
                                                <dt>${result.damage_category}</dt>
                                                <dd>${result.damage_location}</dd>
                                             </div>`
                            })
                            resultstr += `<div class="quotationdownloaddetails">
                                              <a href="${response.output_url}" download class="aidownloadimage">Download AI Image</a>
                                             </div>`
                            $('#loading').fadeOut()
                            $('#vinreport').html(resultstr)
                        } else {

                        }

                    });
                })

            }
        }
    </script>
</body>

</html>