<?php
require('sqlconnection.php');
$connection = new DatabaseConnection();
$results = $connection->get_vehicles();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Wheels On Deals - Quotation</title>

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
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <h1 class="title">Quotation</h1>
    <h2 class="title">Select a Vehicle</h2>
    <div class="pageWrapper">
        <div class="addnewcard" id="selectvehicle">
            <form>

                <div class="email-login">
                    <label for="Vehicle" style="color: #000;"> <b>Vehicle</b></label>
                    <select id="Vehicle" name="Vehicle">
                        <?php
                        $sr_no = 0;
                        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                            $sr_no++;
                            $str_to_print = "";
                            $str_to_print .= "<option value='vehicleid_{$row['Vehicle_Id']}' id='vehicleid_{$row['Vehicle_Id']}' data-brand='{$row['Brand']}' data-vehicletype='{$row['Vehicle_Type']}' data-model='{$row['Model']}' data-manufacturedate='{$row['ManufactureDate']}' data-price='{$row['Price']}'>{$row['Brand']} - {$row['Model']}</option>";
                            echo $str_to_print;
                        }
                        ?>
                    </select>
                </div>
                <button class="cta-btn" type="submit" onclick="selectVehicle(event)">Get Quote</button>
            </form>
        </div>
        <div class="addnewcard" id="quotationdetails">
            <form>
                <h3 class="title">Quotation Calulator</h3>
                <p style="color: #000;" class="subtitle" id="cardetails"></p>
                <div class="email-login">

                    <fieldset>
                        <legend style="color: #000;"> <b>Payment Frequency</b></legend>
                        <div class="radiowrapper">
                            <div class="radiodetails">
                                <label for="paymentfrequencymonthly" style="color: #000;">Monthly</label>
                                <input type="radio" id="paymentfrequencymonthly" name="paymentfrequency" value="1" checked />
                            </div>
                            <div class="radiodetails">
                                <label for="paymentfrequencybiweekly" style="color: #000;">Bi-Weekly</label>
                                <input type="radio" id="paymentfrequencybiweekly" name="paymentfrequency" value="2" />
                            </div>
                            <div class="radiodetails">
                                <label for="paymentfrequencyweekly" style="color: #000;">Weekly</label>
                                <input type="radio" id="paymentfrequencyweekly" name="paymentfrequency" value="4" />
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="email-login">
                    <label for="terms" style="color: #000;"> <b>Terms</b></label>
                    <select id="terms" name="terms">
                        <option value="36">36 Months</option>
                        <option value="48">48 Months</option>
                        <option value="60">60 Months</option>
                        <option value="72">72 Months</option>
                        <option value="84">84 Months</option>
                    </select>
                </div>
                <div class="email-login">
                    <label for="carprice" style="color: #000;"><b>Car Price</b></label>
                    <input type="text" id="carprice" value="" name="carprice" disabled />
                </div>
                <div class="email-login">
                    <label for="downpayment" style="color: #000;"><b>Down Payment</b></label>
                    <input type="text" id="downpayment" value="2000" name="downpayment" placeholder="Enter DownPayment Rate" />
                </div>
                <div class="email-login">
                    <label for="interestrate" style="color: #000;"><b>Interest Rate</b></label>
                    <input type="text" id="interestrate" value="3.25" name="interestrate" placeholder="Enter Interest Rate" />
                </div>
                <div class="email-login">
                    <label for="loanstartdate" style="color: #000;"><b>Loan Start Date</b></label>
                    <input type="date" id="loanstartdate" name="loanstartdate" placeholder="Select Loan Start Rate" />
                </div>
                <div class="email-login">
                    <fieldset>
                        <legend style="color: #000;"> <b>Trade-In Type</b></legend>
                        <div class="radiowrapper">
                            <div class="radiodetails">
                                <label for="tradeInType_Owned" style="color: #000;">Owned</label>
                                <input type="radio" id="tradeInType_Owned" name="tradeintype" value="1" checked />
                            </div>
                            <div class="radiodetails">
                                <label for="tradeInType_Leased" style="color: #000;">Leased</label>
                                <input type="radio" id="tradeInType_Leased" name="tradeintype" value="2" />
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="email-login">
                    <label for="vehiclevalue" style="color: #000;"> <b>Vehicle Value</b></label>
                    <input type="text" id="vehiclevalue" name="vehiclevalue" value="0" placeholder="Enter Vehicle Value" />
                </div>
                <button class="cta-btn" onclick="getsummary(event)">Calculate</button>
            </form>
        </div>
        <div class="addnewcard" id="quotationsummary">
            <form>
                <h3 class="title">Quotation Summary</h3>
                <div class="quotationdetailswrapper">
                    <dl>
                        <div class="quotationdetails">
                            <dt id="paymenttype">Payment</dt>
                            <dd id="quotationdetails_payment"></dd>
                        </div>
                        <div class="quotationdetails">
                            <dt>Brand</dt>
                            <dd id="quotationdetails_brand"></dd>
                        </div>
                        <div class="quotationdetails">
                            <dt>VehicleType</dt>
                            <dd id="quotationdetails_type"></dd>
                        </div>
                        <div class="quotationdetails">
                            <dt>Model</dt>
                            <dd id="quotationdetails_model"></dd>
                        </div>
                        <div class="quotationdetails">
                            <dt>Manufacture Date</dt>
                            <dd id="quotationdetails_manufacturedate"></dd>
                        </div>
                        <div class="quotationdetails">
                            <dt>Price</dt>
                            <dd id="quotationdetails_price"></dd>
                        </div>

                    </dl>
                </div>
                <button class="cta-btn" onclick="window.location.reload()">Get a new Quote</button>
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
                        <p style="color: #000;">Mauris sit amet quam congue, pulvinar urna et, congue diam. Suspendisse eu lorem massa. Integer sit amet posuere tellustea dictumst.</p>
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
                            <h4>Contact Information</h4>
                        </div>
                        <p style="color: #000;"><i class="fa fa-map-marker"></i> 212 Barrington Court New York, ABC</p>
                        <ul>
                            <li><span style="color: #000;">Phone:</span><a style="color: #000;" href="#">+1 333 4040 5566</a></li>
                            <li><span style="color: #000;">Email:</span><a style="color: #000;" href="#">contact@company.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="sub-footer">
        <p style="color: #000;">Copyright ?? 2022 Wheels On Deals <a style="color: #000;" href="#">Wheels On Deals</a></p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <input type="hidden" id="vehicleId" value="" />
    <script>
        function selectVehicle(event) {
            event.preventDefault();
            const VehicleId = $('#Vehicle').val()
            if (Vehicle) {
                const cardetailselement = $(`#${VehicleId}`)
                const Brand = cardetailselement.data('brand')
                const Model = cardetailselement.data('model')
                const Price = cardetailselement.data('price')
                $('#vehicleId').val(VehicleId)
                $('#selectvehicle').fadeOut()
                $('#quotationdetails').fadeIn()
                $('#cardetails').html(`${Brand} - ${Model}`)
                $('#carprice').val(Price)
            } else {
                alert('Please select a vehicle to proceed further !!!');
            }
        }

        function getsummary(event) {
            event.preventDefault();
            let paymentfrequency = parseInt($('[name="paymentfrequency"]:checked').val())
            let vehiclePrice = $('#carprice').val()
            let loanTerm = $('#terms').val()
            let intRate = $('#interestrate').val()
            let downPayment = $('#downpayment').val()
            let tradeValue = $('#vehiclevalue').val()
            let loanStartDate = $('#loanstartdate').val()
            let amount = parseInt(vehiclePrice)
            let months = parseInt(loanTerm)
            let down = parseInt(downPayment)
            let trade = parseInt(tradeValue)
            let totalDown = down + trade
            let annInterest = parseFloat(intRate)
            let monInt = annInterest / 1200;

            if (!downPayment) {
                down = 0;
                downPayment = document.getElementById('downpayment').value = '0';
            }

            if (!trade) {
                trade = 0;
                tradeValue = document.getElementById('vehiclevalue').value = '0';
            }

            if (!annInterest) {
                annInterest = 3.25;
                intRate = document.getElementById('interestrate').value = '3.25';
            }

            if (!loanStartDate) {
                loanStartDate = document.getElementById('loanstartdate').value = formatDate(new Date());
            }

            var finalAmount = ((monInt + (monInt / (Math.pow((1 + monInt), months) - 1))) * (amount - (totalDown || 0))).toFixed(2);

            if (paymentfrequency === 4 || paymentfrequency === 2) {

                // get total weeks in a month.
                const weeks = getWeeksInMonth(parseInt(loanStartDate.split('-')[0]), parseInt(loanStartDate.split('-')[1]))
                const weekCount = weeks.length
                console.log(weekCount, 'weekCount')
                console.log(finalAmount, 'finalAmount')
                console.log(paymentfrequency, 'paymentfrequency')
                if (paymentfrequency === 4) {
                    // Weekly Payment = Monthly Payment / total weeks in a month
                    finalAmount = parseFloat(finalAmount / weekCount).toFixed(2)
                } else if (paymentfrequency === 2) {
                    finalAmount = parseFloat(finalAmount / weekCount).toFixed(2)
                    // Bi-Weekly Payment = (Monthly Payment / total weeks in a month) * 2
                    finalAmount = finalAmount * 2
                }

            }
            const VehicleId = $('#Vehicle').val()
            const cardetailselement = $(`#${VehicleId}`)
            const Brand = cardetailselement.data('brand')
            const VehicleType = cardetailselement.data('vehicletype')
            const Model = cardetailselement.data('model')
            const ManufactureDate = cardetailselement.data('manufacturedate')
            const Price = cardetailselement.data('price')
            let paymentType = "Monthly"
            if (paymentfrequency === 1) {
                paymentType = "Monthly"
            } else if (paymentfrequency === 2) {
                paymentType = "Bi-Weekly"
            } else if (paymentfrequency === 4) {
                paymentType = "Weekly"
            }

            $('#quotationdetails_brand').html(Brand)
            $('#quotationdetails_type').html(VehicleType)
            $('#quotationdetails_model').html(Model)
            $('#quotationdetails_manufacturedate').html(ManufactureDate)
            $('#quotationdetails_price').html(`$ ${Price}`)
            $('#paymenttype').html(`${paymentType} Charges`)
            $('#quotationdetails_payment').html(`$ ${finalAmount}`)
            $('#quotationdetails').fadeOut()
            $('#quotationsummary').fadeIn()
        }

        function formatDate(date) {
            var d = date,
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }

        function getWeeksInMonth(year, month) {
            const weeks = [],
                firstDate = new Date(year, month, 1),
                lastDate = new Date(year, month + 1, 0),
                numDays = lastDate.getDate();

            let dayOfWeekCounter = firstDate.getDay();

            for (let date = 1; date <= numDays; date++) {
                if (dayOfWeekCounter === 0 || weeks.length === 0) {
                    weeks.push([]);
                }
                weeks[weeks.length - 1].push(date);
                dayOfWeekCounter = (dayOfWeekCounter + 1) % 7;
            }

            return weeks
                .filter((w) => !!w.length)
                .map((w) => ({
                    start: w[0],
                    end: w[w.length - 1],
                    dates: w,
                }));
        }
    </script>
</body>

</html>