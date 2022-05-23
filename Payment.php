<?php include("./inc/check_session.php") ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>payment</title>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&family=Ubuntu:ital,wght@0,300;0,500;1,300&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/common.css" />
  <link rel="stylesheet" type="text/css" href="css/fonts.css" />
  <link rel="stylesheet" type="text/css" href="css/New.css" />
  <link rel="stylesheet" type="text/css" href="css/Laptops.css" />
  <link rel="stylesheet" type="text/css" href="css/smallscreen800.css" />
  <link rel="stylesheet" type="text/css" href="css/responsive.css" />

  <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="https://unpkg.com/headroom.js@0.12.0/dist/headroom.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/px2code/posize/build/v1.00.3.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
</head>
<body style="background-color: #1161D9; overflow-x: hidden;">
    <div class="row">
        <div class="col-lg-5 col-md-12 col-sm-12">
            <img src="Dashboard/dist/image/logo.png" class="paymentlogoimg" >

            <h2 class="paymenth2">Payment</h2>
            <div class="row paymentdiv">
                
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <p class="paymentservices">Services</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p class="paymentprice">Price($)</p>
                </div>
            </div>
            <div class="reviewline"></div>
            <div class="row paymentdiv">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <p class="paymentservices">Nigeria Business Visa <br>on arrival</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p class="paymentprice">1,000.00</p>
                </div>
            </div>
            <div class="row paymentdiv">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <p class="paymentservices">Tax/ VAT</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p class="paymentprice">0.20</p>
                </div>
            </div>
            <div class="reviewline"></div>
            <div class="row paymentdiv">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <p class="paymentservices">Total</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p class="paymentprice">1,000.20</p>
                </div>
            </div>
            <div class="reviewline"></div>
            <div class="reviewline"></div>
       </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card leftcard">
                <div style="margin-top: 31px;">
                    <h2 class="leftcardh2">Payment Information</h2>
                    <div style=" margin-top: 20px;">
                        <p class="paymentopt">Payment Options</p>
                    </div>
                    <div class="radiodiv">
                        <input type="radio" class="radioo"> &nbsp; PayPal <br>

                        <input type="radio" class="radioo">&nbsp; Credit/ Debit Card <span style="font-size: 12px; color: #C8730F;">(Master card, Visa card,American express card, etc)</span>  <br>                            
                        <input type="radio" class="radioo">&nbsp; Paystack <br>
                        <input type="radio" class="radioo"> &nbsp; Flutter Wave <br>

                        <p class="cardname">Name of card</p>
                        <input type="text" class="form-control cardinput" placeholder="John Doe">

                        <p class="cardnumber">Card Number</p>
                        <input type="text" class="form-control cardinput" placeholder="000 000 000 000 000">
                                                                                   
                        <div class="row" >
                            <div class="col-md-4" style="margin-top: 6px;">
                                <div class="form-group2">
                                    <p class="expiry">Expiry</p>
                                    <input type="text" class="form-control expiryinput" placeholder="DD/ MM/ YY">
                                </div>
                            </div>
                            <div class="col-md-1">
                                
                            </div>
                            <div class="col-md-4" style="margin-top: 6px;">
                                <div class="form-group2">
                                    <p class="expiry">CVV</p>
                                    <input type="text" class="form-control expiryinput" placeholder="123">
                                </div>
                            </div>                            
                        </div>

                    </div>
                    <div class="divbutton">
                        <button type="submit" class="btn proceed">Return to Account</button>
                    </div>
                   
                    
                        
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>