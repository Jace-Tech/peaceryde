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

function sendMail ($subject, $_message, $from, $to) 
{
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    

    $message = "<html>
        <head>
            <link rel='shortcut icon' href='http://test.peacerydeafrica.com/app/assets/logo.png' type='image/x-icon'> 
        </head> <body>";
    $message  .= $_message;
    $message .= "</body></html>";

    
    // Sending email
    return mail($to, $subject, $message, $headers);
}