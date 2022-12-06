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
    <div class="pageWrapper">
        <div class="addnewcard" id="selectvehicle">
            <form>
                <h4 class="title">Select A Vehicle to Generate Amortization Report</h4>
                <div class="email-login">
                    <label for="Vehicle"> <b>Vehicle</b></label>
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
                <button class="cta-btn" type="submit" onclick="selectVehicle(event)">Get Report</button>
            </form>
        </div>
        <div class="addnewcard" id="quotationdetails">
            <form>
                <h3 class="title">Amortization Calculator</h3>
                <h4 class="subtitle" id="cardetails"></h4>
                <div class="email-login">
                    <label for="carprice"><b>Car Price</b></label>
                    <input type="text" id="carprice" value="" name="carprice" disabled />
                </div>
                <div class="email-login">
                    <label for="downpayment"><b>Interest Rate</b></label>
                    <input type="text" id="interestrate" value="3.25" name="interestrate" placeholder="Enter Interest Rate" />
                </div>
                <div class="email-login">
                    <label for="Vehicle"> <b>Terms</b></label>
                    <select id="terms" name="terms">
                        <option value="12">12 Months</option>
                        <option value="24">24 Months</option>
                        <option value="36">36 Months</option>
                        <option value="48">48 Months</option>
                        <option value="60">60 Months</option>
                        <option value="72">72 Months</option>
                    </select>
                </div>
                <button class="cta-btn" onclick="getValues(event)">Calculate</button>
            </form>
        </div>
        <div class="addnewcard" id="quotationsummary">
            <form>
                <h3 class="title">Amortization Summary</h3>
                <div class="quotationdetailswrapper">
                    <dl>
                        <div class="quotationdetails">
                            <dt id="paymenttype">Loan amount</dt>
                            <dd id="quotationdetails_loanamount"></dd>
                        </div>
                        <div class="quotationdetails">
                            <dt>Interest rate</dt>
                            <dd id="quotationdetails_interestrate"></dd>
                        </div>
                        <div class="quotationdetails">
                            <dt>Number of months</dt>
                            <dd id="quotationdetails_numberofmonths"></dd>
                        </div>
                        <div class="quotationdetails">
                            <dt>Monthly payment</dt>
                            <dd id="quotationdetails_monthlypayment"></dd>
                        </div>
                        <div class="quotationdetails">
                            <dt>Total paid</dt>
                            <dd id="quotationdetails_totalpaid"></dd>
                        </div>
                    </dl>
                </div>
                <div class="tablewrapper" id="amortizationtable">
                    <table id="vehicleInventory" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Brand</th>
                                <th>VehicleType</th>
                                <th>Model</th>
                                <th>Price</th>
                                <th>Manufacturer Date</th>
                                <th>Color</th>
                                <th>Vehicle Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sr_no = 0;
                            while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                                $sr_no++;
                                $str_to_print = "";
                                $str_to_print .= "<tr><td>{$row['Brand']}</td>";
                                $str_to_print .= "<td>{$row['Vehicle_Type']}</td>";
                                $str_to_print .= "<td>{$row['Model']}</td>";
                                $str_to_print .= "<td>$ {$row['Price']}</td>";
                                $str_to_print .= "<td>{$row['ManufactureDate']}</td>";
                                $str_to_print .= "<td><div style='background-color: {$row['Color']};' title='car color'>&nbsp;</div></td>";
                                $str_to_print .= "<td><img style='height:150px;width:150px;' src='{$row['VehicleImage']}' class='productImg'/></td></tr>";
                                echo $str_to_print;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Brand</th>
                                <th>VehicleType</th>
                                <th>Model</th>
                                <th>Price</th>
                                <th>Manufacturer Date</th>
                                <th>Color</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <button class="cta-btn" onclick="window.location.reload()">Get a new Amortization</button>
            </form>
            <button class="cta-btn" onclick="GeneratePDF()">Generate Summary/Invoice</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
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
                $('#carprice').val(Price)
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

        function getValues(event) {
            event.preventDefault();
            //button click gets values from inputs
            var balance = parseFloat(document.getElementById("carprice").value);
            var interestRate = parseFloat(document.getElementById("interestrate").value / 100.0);
            var terms = parseInt(document.getElementById("terms").value);
            //validate inputs - display error if invalid, otherwise, display table
            var balVal = validateInputs(balance);
            var intrVal = validateInputs(interestRate);
            if (balVal && intrVal) {
                amort(balance, interestRate, terms);
            } else {
                //returns error if inputs are invalid
                alert("Please Check your inputs and retry - invalid values.");
            }
        }

        function validateInputs(value) {
            //some code here to validate inputs
            if ((value == null) || (value == "")) {
                return false;
            } else {
                return true;
            }
        }

        function amort(balance, interestRate, terms) {
            //Calculate the per month interest rate
            var monthlyRate = interestRate / 12;
            //Calculate the payment
            var payment = balance * (monthlyRate / (1 - Math.pow(1 + monthlyRate, -terms)));
            //begin building the return string for the display of the amort table

            $('#quotationdetails_loanamount').html("$" + balance.toFixed(2));
            $('#quotationdetails_interestrate').html((interestRate * 100).toFixed(2))
            $('#quotationdetails_numberofmonths').html(terms)
            $('#quotationdetails_monthlypayment').html(payment.toFixed(2))
            $('#quotationdetails_totalpaid').html((payment * terms).toFixed(2))
            $('#quotationdetails').fadeOut()
            $('#quotationsummary').fadeIn()

            var result = "";
            //add header row for table to return string
            result += "<table id='amortization' class='display' style='width:100%'> \
                       <thead> \
                        <tr> \
                        <th>Month</th> \
                        <th>Balance</th> \
                        <th>Interest</th> \
                        <th>Principal</th> \
                        </tr> \
                        </thead> \
                        <tbody>";
            /**
             * Loop that calculates the monthly Loan amortization amounts then adds 
             * them to the return string 
             */
            for (var count = 0; count < terms; ++count) {
                //in-loop interest amount holder
                var interest = 0;

                //in-loop monthly principal amount holder
                var monthlyPrincipal = 0;

                //start a new table row on each loop iteration
                result += "<tr>";

                //display the month number in col 1 using the loop count variable
                result += "<td>" + (count + 1) + "</td>";


                //code for displaying in loop balance
                result += "<td> $" + balance.toFixed(2) + "</td>";

                //calc the in-loop interest amount and display
                interest = balance * monthlyRate;
                result += "<td> $" + interest.toFixed(2) + "</td>";

                //calc the in-loop monthly principal and display
                monthlyPrincipal = payment - interest;
                result += "<td> $" + monthlyPrincipal.toFixed(2) + "</td>";

                //end the table row on each iteration of the loop	
                result += "</tr>";

                //update the balance for each loop iteration
                balance = balance - monthlyPrincipal;
            }

            //Final piece added to return string before returning it - closes the table
            result += "</tbody></table>";

            //returns the concatenated string to the page
            $('#amortizationtable').html(result)
            $('#amortization').DataTable();
        }

        function GeneratePDF() {
            var pdf = new jsPDF();
            pdf.text("Amortization Summary", 70, 10);

            pdf.text("Loan Amount: " + $('#quotationdetails_loanamount').html(), 10, 20);
            pdf.text("Interest rate: " + $('#quotationdetails_interestrate').html(), 10, 30);
            pdf.text("Number of months: " + $('#quotationdetails_numberofmonths').html(), 10, 40);
            pdf.text("Monthly payment: " + $('#quotationdetails_monthlypayment').html(), 10, 50);
            pdf.text("Total paid: " + $('#quotationdetails_totalpaid').html(), 10, 60);

            var balance = parseFloat($('#quotationdetails_loanamount').html().split('$')[1].trim())
            var interestRate = parseFloat($('#quotationdetails_interestrate').html() / 100.0)
            var terms = parseInt($('#quotationdetails_numberofmonths').html())
            var monthlyPayment = parseFloat($('#quotationdetails_monthlypayment').html())
            var totalPaid = parseFloat($('#quotationdetails_totalpaid').html())

            var monthlyRate = interestRate / 12;
            var payment = balance * (monthlyRate / (1 - Math.pow(1 + monthlyRate, -terms)));

            pdf.text("Month", 20, 80);
            pdf.text("Balance", 70, 80);
            pdf.text("Interest", 120, 80);
            pdf.text("Principal", 170, 80);

            var linecount = 90
            for (var count = 0; count < terms; ++count) {
                //in-loop interest amount holder
                var interest = 0;

                //in-loop monthly principal amount holder
                var monthlyPrincipal = 0;

                pdf.text((count + 1).toString(), 20, linecount);

                pdf.text("$" + balance.toFixed(2), 70, linecount);
                //calc the in-loop interest amount and display
                interest = balance * monthlyRate;
                pdf.text("$" + interest.toFixed(2), 120, linecount);

                //calc the in-loop monthly principal and display
                monthlyPrincipal = payment - interest;
                pdf.text("$" + monthlyPrincipal.toFixed(2), 170, linecount);
                //update the balance for each loop iteration
                balance = balance - monthlyPrincipal;
                linecount = linecount + 10;

            }
            pdf.save("amortizationsummary.pdf");
        }
    </script>
</body>

</html>