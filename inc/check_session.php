<?php 

session_start();

include("./db/conf.php");

include("./utils/country_fee.php");
include("./functions/index.php");
include("./models/User.php");
include("./models/Service.php");
include("./models/UserService.php");
include("./models/Tracking.php");
include("./models/BI.php");
include("./models/UserLogin.php");
include("./models/FAQs.php");
include("./models/Card.php");
include("./models/Payment.php");
include("./models/Message.php");
include("./models/Upload.php");
include("./models/Review.php");
include("./models/Admin.php");
include("./models/ResetUserPassword.php");

include("./payment/Paystack.php");