<?php 

function filter_field($input, $type = 'string')
{
    $filtered_input = null; 

    switch ($type) {
        case 'email':{
            $filtered_input = filter_var($input, FILTER_SANITIZE_EMAIL);
            break;
        }
        
        default:{
            $filtered_input = htmlspecialchars(trim($input));
            break;
        }
    }

    return $filtered_input;
}


function getGreeting()
{
    $hour = intval(date('H'));
    $greeting = "Morning";

    if($hour >= 16) $greeting = "Evening";
    if($hour >= 12) $greeting = "Afternoon";

    return $greeting;

}

function formatCountryArray($country) 
{
    $countries = json_decode($country, true);
    return join(" - ", $countries);
}

function getSubName($_name)
{
    $name = explode(" ", $_name);
    if(count($name) > 1){
        return substr($name[0], 0, 1) . substr($name[1], 0, 1);
    }

    return substr($name[0], 0, 1);
}

function getLinkColor ($link) 
{
    $route = $_SERVER['PHP_SELF'];

    if(strstr($route, $link)):
        ?>
            <script> 
                let page = "<?= $link ?>"
            </script>
        <?php
    endif;
}

function slugify($string)
{
    $text = explode(' ', $string);
    $slug = join('-', $text);

    return strtolower($slug);
}


function getWeekTime(int $week)
{
    return ((24 * 3600) * 7) * $week;
}

function roundUp ($item) {
    return round($item, 2);
}

function sendMail ($subject, $_message, $from, $to, $fullHTML = false) 
{
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    
    // Create email headers
    $headers .= 'From: Peacerydeafrica<'.$from.">\r\n";
    $headers .= "Cc: $to \r\n";
    $headers .= "Bcc: $to \r\n";

    
    if(!$fullHTML) {
        $message = "<html>
            <head>
                <link rel='shortcut icon' href='http://test.peacerydeafrica.com/app/assets/logo.png' type='image/x-icon'> 
            </head> <body>";
        $message  .= $_message;
        $message .= "</body></html>";
    }
    else {
        $message = $_message;
    }

    
    // Sending email
    return mail($to, $subject, $message, $headers);
}


function sendNBVReceipt ($price, $name, $subject, $to, $from) {
    $PRICE = array_map("roundUp", $price);
    extract($PRICE);

    $message = "<!DOCTYPE html>
    <html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml'
        xmlns:o='urn:schemas-microsoft-com:office:office'>
        <head>
            <meta charset='utf-8'> <!-- utf-8 works for most cases -->
            <meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
            <meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
            <meta name='x-apple-disable-message-reformatting'> <!-- Disable auto-scale in iOS 10 Mail entirely -->
            <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->
        
            <link href='https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700' rel='stylesheet'>
        
            <!-- CSS Reset : BEGIN -->
            <style>
                /* What it does: Remove spaces around the email design added by some email clients. */
                /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
                html,
                body {
                    margin: 0 auto !important;
                    padding: 0 !important;
                    height: 100% !important;
                    width: 100% !important;
                    background: #f1f1f1;
                }
        
                /* What it does: Stops email clients resizing small text. */
                * {
                    -ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%;
                }
        
                /* What it does: Centers email on Android 4.4 */
                div[style*='margin: 16px 0'] {
                    margin: 0 !important;
                }
        
                /* What it does: Stops Outlook from adding extra spacing to tables. */
                table,
                td {
                    mso-table-lspace: 0pt !important;
                    mso-table-rspace: 0pt !important;
                }
        
                /* What it does: Fixes webkit padding issue. */
                table {
                    border-spacing: 0 !important;
                    border-collapse: collapse !important;
                    table-layout: fixed !important;
                    margin: 0 auto !important;
                }
        
                /* What it does: Uses a better rendering method when resizing images in IE. */
                img {
                    -ms-interpolation-mode: bicubic;
                }
        
                /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
                a {
                    text-decoration: none;
                }
        
                /* What it does: A work-around for email clients meddling in triggered links. */
                *[x-apple-data-detectors],
                /* iOS */
                .unstyle-auto-detected-links *,
                .aBn {
                    border-bottom: 0 !important;
                    cursor: default !important;
                    color: inherit !important;
                    text-decoration: none !important;
                    font-size: inherit !important;
                    font-family: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                }
        
                /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
                .a6S {
                    display: none !important;
                    opacity: 0.01 !important;
                }
        
                /* What it does: Prevents Gmail from changing the text color in conversation threads. */
                .im {
                    color: inherit !important;
                }
        
                /* If the above doesn't work, add a .g-img class to any image in question. */
                img.g-img+div {
                    display: none !important;
                }
        
                /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
                /* Create one of these media queries for each additional viewport size you'd like to fix */
        
                /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
                @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                    u~div .email-container {
                        min-width: 320px !important;
                    }
                }
        
                /* iPhone 6, 6S, 7, 8, and X */
                @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                    u~div .email-container {
                        min-width: 375px !important;
                    }
                }
        
                /* iPhone 6+, 7+, and 8+ */
                @media only screen and (min-device-width: 414px) {
                    u~div .email-container {
                        min-width: 414px !important;
                    }
                }
            </style>
        
            <style>
                .primary {
                    background: #17bebb;
                }
        
                .bg_white {
                    background: #ffffff;
                }
        
                .bg_light {
                    background: #f7fafa;
                }
        
                .bg_black {
                    background: #000000;
                }
        
                .bg_dark {
                    background: rgba(0, 0, 0, .8);
                }
        
                .email-section {
                    padding: 2.5em;
                }
        
                .btn {
                    padding: 10px 15px;
                    display: inline-block;
                }
        
                .btn.btn-primary {
                    border-radius: 5px;
                    background: #17bebb;
                    color: #ffffff;
                }
        
                .btn.btn-white {
                    border-radius: 5px;
                    background: #ffffff;
                    color: #000000;
                }
        
                .btn.btn-white-outline {
                    border-radius: 5px;
                    background: transparent;
                    border: 1px solid #fff;
                    color: #fff;
                }
        
                .btn.btn-black-outline {
                    border-radius: 0px;
                    background: transparent;
                    border: 2px solid #000;
                    color: #000;
                    font-weight: 700;
                }
        
                .btn-custom {
                    color: rgba(0, 0, 0, .3);
                    text-decoration: underline;
                }
        
                h1,
                h2,
                h3,
                h4,
                h5,
                h6 {
                    font-family: 'Work Sans', sans-serif;
                    color: #000000;
                    margin-top: 0;
                    font-weight: 400;
                }
        
                body {
                    font-family: 'Work Sans', sans-serif;
                    font-weight: 400;
                    font-size: 15px;
                    line-height: 1.8;
                    color: rgba(0, 0, 0, .4);
                }
        
                a {
                    color: #17bebb;
                }
        
                table {}
        
        
                .logo h1 {
                    margin: 0;
                }
        
                .logo h1 a {
                    color: #17bebb;
                    font-size: 24px;
                    font-weight: 700;
                    font-family: 'Work Sans', sans-serif;
                }
        
                .hero {
                    position: relative;
                    z-index: 0;
                }
        
                .hero .text {
                    color: rgba(0, 0, 0, .3);
                }
        
                .hero .text h2 {
                    color: #000;
                    font-size: 34px;
                    margin-bottom: 15px;
                    font-weight: 300;
                    line-height: 1.2;
                }
        
                .hero .text h3 {
                    font-size: 24px;
                    font-weight: 200;
                }
        
                .hero .text h2 span {
                    font-weight: 600;
                    color: #000;
                }
        
        
                .product-entry {
                    display: block;
                    position: relative;
                    float: left;
                    padding-top: 20px;
                }
        
                .product-entry .text {
                    width: calc(100% - 125px);
                    padding-left: 20px;
                }
        
                .product-entry .text h3 {
                    margin-bottom: 0;
                    padding-bottom: 0;
                }
        
                .product-entry .text p {
                    margin-top: 0;
                }
        
                .product-entry img,
                .product-entry .text {
                    float: left;
                }
        
                ul.social {
                    padding: 0;
                }
        
                ul.social li {
                    display: inline-block;
                    margin-right: 10px;
                }
        
        
                .footer {
                    border-top: 1px solid rgba(0, 0, 0, .05);
                    color: rgba(0, 0, 0, .5);
                }
        
                .footer .heading {
                    color: #000;
                    font-size: 20px;
                }
        
                .footer ul {
                    margin: 0;
                    padding: 0;
                }
        
                .footer ul li {
                    list-style: none;
                    margin-bottom: 10px;
                }
        
                .footer ul li a {
                    color: rgba(0, 0, 0, 1);
                }
        
        
                @media screen and (max-width: 500px) {}
        
                .logo {
                    height: 80px;
                    object-fit: contain;
                }
            </style>
        
        
        </head>
        
        <body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;'>
            <center style='width: 100%; background-color: #f1f1f1;'>
                <div
                    style='display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
                    &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                </div>
                <div style='max-width: 600px; margin: 0 auto;' class='email-container'>
                    <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'
                        style='margin: auto;'>
                        <tr>
                            <td valign='top' class='bg_white' style='padding: 1em 2.5em 0 2.5em;'>
                                <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td class='logo' style='text-align: left;'>
                                            <a href='https://peacerydeafrica.com'>
                                                <img src='http://test.peacerydeafrica.com/app/assets/logo.png' class='logo'
                                                    alt='>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign='middle' class='hero bg_white' style='padding: 2em 0 2em 0;'>
                                <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td style='padding: 0 2.5em; text-align: left;'>
                                            <div class='text'>
                                                <h3>Hi $name,</h3>
                                                <div style='color: #333;'>Here's your payment reciept for <p style='color: #00f'>Nigeria Business Visa on Arrival</p></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <table class='bg_white' role='presentation' border='0' cellpadding='12' style='table-layout: auto;' cellspacing='0' width='100%'>
                                <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                                    <th
                                        style='text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 20px'>Item</th>
                                    <th
                                        style='text-align:right; padding: 0 2.5em; color: #000; padding-bottom: 20px'>Price</th>
                                </tr>
        
                                <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                                    <td valign='middle' style='text-align:left; padding: 0 2.5em;'>
                                        VISA Fee
                                    </td>
                                    <td valign='middle' style='text-align:right; padding: 0 2.5em;'>
                                        <span class='price' style='color: #000; font-size: 16px;'>\$$visa</span>
                                    </td>
                                </tr>
        
                                <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                                    <td valign='middle' style='text-align:left; padding: 0 2.5em;'>
                                        Biometric Fee
                                    </td>
                                    <td valign='middle' style='text-align:right; padding: 0 2.5em;'>
                                        <span class='price' style='color: #000; font-size: 16px;'>\$$bio</span>
                                    </td>
                                </tr>
        
                                <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                                    <td valign='middle' style='text-align:left; padding: 0 2.5em;'>
                                        Immigration Fee
                                    </td>
                                    <td valign='middle' style='text-align:right; padding: 0 2.5em;'>
                                        <span class='price' style='color: #000; font-size: 16px;'>\$$Immgration</span>
                                    </td>
                                </tr>
        
                                <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                                    <td valign='middle' style='text-align:left; padding: 0 2.5em;'>
                                        Admin Portal Fee
                                    </td>
                                    <td valign='middle' style='text-align:right; padding: 0 2.5em;'>
                                        <span class='price' style='color: #000; font-size: 16px;'>\$$admin</span>
                                    </td>
                                </tr>
        
                                <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                                    <td valign='middle' style='text-align:left; padding: 0 2.5em;'>
                                        VAT [7.5%]
                                    </td>
                                    <td valign='middle' style='text-align:right; padding: 0 2.5em;'>
                                        <span class='price' style='color: #000; font-size: 16px;'>\$$vat</span>
                                    </td>
                                </tr>
        
                                <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                                    <td valign='middle' style='text-align:left; padding: 0 2.5em;'>
                                        Gross Receipt Tax [1.9914%]
                                    </td>
                                    <td valign='middle' style='text-align:right; padding: 0 2.5em;'>
                                        <span class='price' style='color: #000; font-size: 16px;'>\$$gross</span>
                                    </td>
                                </tr>
        
                                <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                                    <td valign='middle' style='text-align:left; padding: 0 2.5em;'>
                                        <strong>Total</strong>
                                    </td>
                                    <td valign='middle' style='text-align:right; padding: 0 2.5em;'>
                                        <span class='price' style='color: #000; font-size: 16px; font-weight: bold;'>\$$total_price</span>
                                    </td>
                                </tr>
                            </table>
                        </tr>
                    </table>
                    <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'
                        style='margin: auto;'>
                        <tr>
                            <td class='bg_white' style='text-align: center;'>
                                <p>Copyright &copy; Peacerydeafrica @2022 </p>
                            </td>
                        </tr>
                    </table>
        
                </div>
            </center>
        </body>   
    </html>
    ";

    sendMail($subject, $message, $from, $to, true);
}

function sendTWPReceipt ($price, $name, $subject, $to, $from) {
    $PRICE = array_map("roundUp", $price);
    extract($PRICE);

    $message = "<!DOCTYPE html>
    <html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml'
        xmlns:o='urn:schemas-microsoft-com:office:office'>
        <head>
            <meta charset='utf-8'> <!-- utf-8 works for most cases -->
            <meta name='viewport' content='width=device-width'> <!-- Forcing initial-scale shouldn't be necessary -->
            <meta http-equiv='X-UA-Compatible' content='IE=edge'> <!-- Use the latest (edge) version of IE rendering engine -->
            <meta name='x-apple-disable-message-reformatting'> <!-- Disable auto-scale in iOS 10 Mail entirely -->
            <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->
        
            <link href='https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700' rel='stylesheet'>
        
            <!-- CSS Reset : BEGIN -->
            <style>
                /* What it does: Remove spaces around the email design added by some email clients. */
                /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
                html,
                body {
                    margin: 0 auto !important;
                    padding: 0 !important;
                    height: 100% !important;
                    width: 100% !important;
                    background: #f1f1f1;
                }
        
                /* What it does: Stops email clients resizing small text. */
                * {
                    -ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%;
                }
        
                /* What it does: Centers email on Android 4.4 */
                div[style*='margin: 16px 0'] {
                    margin: 0 !important;
                }
        
                /* What it does: Stops Outlook from adding extra spacing to tables. */
                table,
                td {
                    mso-table-lspace: 0pt !important;
                    mso-table-rspace: 0pt !important;
                }
        
                /* What it does: Fixes webkit padding issue. */
                table {
                    border-spacing: 0 !important;
                    border-collapse: collapse !important;
                    table-layout: fixed !important;
                    margin: 0 auto !important;
                }
        
                /* What it does: Uses a better rendering method when resizing images in IE. */
                img {
                    -ms-interpolation-mode: bicubic;
                }
        
                /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
                a {
                    text-decoration: none;
                }
        
                /* What it does: A work-around for email clients meddling in triggered links. */
                *[x-apple-data-detectors],
                /* iOS */
                .unstyle-auto-detected-links *,
                .aBn {
                    border-bottom: 0 !important;
                    cursor: default !important;
                    color: inherit !important;
                    text-decoration: none !important;
                    font-size: inherit !important;
                    font-family: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                }
        
                /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
                .a6S {
                    display: none !important;
                    opacity: 0.01 !important;
                }
        
                /* What it does: Prevents Gmail from changing the text color in conversation threads. */
                .im {
                    color: inherit !important;
                }
        
                /* If the above doesn't work, add a .g-img class to any image in question. */
                img.g-img+div {
                    display: none !important;
                }
        
                /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
                /* Create one of these media queries for each additional viewport size you'd like to fix */
        
                /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
                @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                    u~div .email-container {
                        min-width: 320px !important;
                    }
                }
        
                /* iPhone 6, 6S, 7, 8, and X */
                @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                    u~div .email-container {
                        min-width: 375px !important;
                    }
                }
        
                /* iPhone 6+, 7+, and 8+ */
                @media only screen and (min-device-width: 414px) {
                    u~div .email-container {
                        min-width: 414px !important;
                    }
                }
            </style>
        
            <style>
                .primary {
                    background: #17bebb;
                }
        
                .bg_white {
                    background: #ffffff;
                }
        
                .bg_light {
                    background: #f7fafa;
                }
        
                .bg_black {
                    background: #000000;
                }
        
                .bg_dark {
                    background: rgba(0, 0, 0, .8);
                }
        
                .email-section {
                    padding: 2.5em;
                }
        
                .btn {
                    padding: 10px 15px;
                    display: inline-block;
                }
        
                .btn.btn-primary {
                    border-radius: 5px;
                    background: #17bebb;
                    color: #ffffff;
                }
        
                .btn.btn-white {
                    border-radius: 5px;
                    background: #ffffff;
                    color: #000000;
                }
        
                .btn.btn-white-outline {
                    border-radius: 5px;
                    background: transparent;
                    border: 1px solid #fff;
                    color: #fff;
                }
        
                .btn.btn-black-outline {
                    border-radius: 0px;
                    background: transparent;
                    border: 2px solid #000;
                    color: #000;
                    font-weight: 700;
                }
        
                .btn-custom {
                    color: rgba(0, 0, 0, .3);
                    text-decoration: underline;
                }
        
                h1,
                h2,
                h3,
                h4,
                h5,
                h6 {
                    font-family: 'Work Sans', sans-serif;
                    color: #000000;
                    margin-top: 0;
                    font-weight: 400;
                }
        
                body {
                    font-family: 'Work Sans', sans-serif;
                    font-weight: 400;
                    font-size: 15px;
                    line-height: 1.8;
                    color: rgba(0, 0, 0, .4);
                }
        
                a {
                    color: #17bebb;
                }
        
                table {}
        
        
                .logo h1 {
                    margin: 0;
                }
        
                .logo h1 a {
                    color: #17bebb;
                    font-size: 24px;
                    font-weight: 700;
                    font-family: 'Work Sans', sans-serif;
                }
        
                .hero {
                    position: relative;
                    z-index: 0;
                }
        
                .hero .text {
                    color: rgba(0, 0, 0, .3);
                }
        
                .hero .text h2 {
                    color: #000;
                    font-size: 34px;
                    margin-bottom: 15px;
                    font-weight: 300;
                    line-height: 1.2;
                }
        
                .hero .text h3 {
                    font-size: 24px;
                    font-weight: 200;
                }
        
                .hero .text h2 span {
                    font-weight: 600;
                    color: #000;
                }
        
        
                .product-entry {
                    display: block;
                    position: relative;
                    float: left;
                    padding-top: 20px;
                }
        
                .product-entry .text {
                    width: calc(100% - 125px);
                    padding-left: 20px;
                }
        
                .product-entry .text h3 {
                    margin-bottom: 0;
                    padding-bottom: 0;
                }
        
                .product-entry .text p {
                    margin-top: 0;
                }
        
                .product-entry img,
                .product-entry .text {
                    float: left;
                }
        
                ul.social {
                    padding: 0;
                }
        
                ul.social li {
                    display: inline-block;
                    margin-right: 10px;
                }
        
        
                .footer {
                    border-top: 1px solid rgba(0, 0, 0, .05);
                    color: rgba(0, 0, 0, .5);
                }
        
                .footer .heading {
                    color: #000;
                    font-size: 20px;
                }
        
                .footer ul {
                    margin: 0;
                    padding: 0;
                }
        
                .footer ul li {
                    list-style: none;
                    margin-bottom: 10px;
                }
        
                .footer ul li a {
                    color: rgba(0, 0, 0, 1);
                }
        
        
                @media screen and (max-width: 500px) {}
        
                .logo {
                    height: 80px;
                    object-fit: contain;
                }
            </style>
        
        
        </head>
        
        <body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;'>
            <center style='width: 100%; background-color: #f1f1f1;'>
                <div
                    style='display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>
                    &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                </div>
                <div style='max-width: 600px; margin: 0 auto;' class='email-container'>
                    <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'
                        style='margin: auto;'>
                        <tr>
                            <td valign='top' class='bg_white' style='padding: 1em 2.5em 0 2.5em;'>
                                <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td class='logo' style='text-align: left;'>
                                            <a href='https://peacerydeafrica.com'>
                                                <img src='http://test.peacerydeafrica.com/app/assets/logo.png' class='logo'
                                                    alt='>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td valign='middle' class='hero bg_white' style='padding: 2em 0 2em 0;'>
                                <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
                                    <tr>
                                        <td style='padding: 0 2.5em; text-align: left;'>
                                            <div class='text'>
                                                <h3>Hi $name, </h3>
                                                <div style='color: #333;'>Here's your payment reciept for <p style='color: #00f'>Nigerian Temporary Work Permit</p></div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <table class='bg_white' role='presentation' border='0' cellpadding='12' style='table-layout: auto;' cellspacing='0' width='100%'>
                                <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                                    <th
                                        style='text-align:left; padding: 0 2.5em; color: #000; padding-bottom: 20px'>Item</th>
                                    <th
                                        style='text-align:right; padding: 0 2.5em; color: #000; padding-bottom: 20px'>Price</th>
                                </tr>
        
                                <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                                    <td valign='middle' style='text-align:left; padding: 0 2.5em;'>
                                        Approval Fee
                                    </td>
                                    <td valign='middle' style='text-align:right; padding: 0 2.5em;'>
                                        <span class='price' style='color: #000; font-size: 16px;'>\$$approval</span>
                                    </td>
                                </tr>
        
                                <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                                    <td valign='middle' style='text-align:left; padding: 0 2.5em;'>
                                        VAT [7.5%]
                                    </td>
                                    <td valign='middle' style='text-align:right; padding: 0 2.5em;'>
                                        <span class='price' style='color: #000; font-size: 16px;'>\$$vat</span>
                                    </td>
                                </tr>
        
                                <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                                    <td valign='middle' style='text-align:left; padding: 0 2.5em;'>
                                        Gross Receipt Tax [1.9914%]
                                    </td>
                                    <td valign='middle' style='text-align:right; padding: 0 2.5em;'>
                                        <span class='price' style='color: #000; font-size: 16px;'>\$$gross</span>
                                    </td>
                                </tr>
        
                                <tr style='border-bottom: 1px solid rgba(0,0,0,.05);'>
                                    <td valign='middle' style='text-align:left; padding: 0 2.5em;'>
                                        <strong>Total</strong>
                                    </td>
                                    <td valign='middle' style='text-align:right; padding: 0 2.5em;'>
                                        <span class='price' style='color: #000; font-size: 16px; font-weight: bold;'>\$$total</span>
                                    </td>
                                </tr>
                            </table>
                        </tr>
                    </table>
                    <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'
                        style='margin: auto;'>
                        <tr>
                            <td class='bg_white' style='text-align: center;'>
                                <p>Copyright &copy; Peacerydeafrica @2022 </p>
                            </td>
                        </tr>
                    </table>
        
                </div>
            </center>
        </body>   
    </html>
    ";

    sendMail($subject, $message, $from, $to, true);
}