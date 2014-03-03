<?php
include('_common/coreutil.php');
include('constants.php');
require_once 'libs/unirest-php-master/lib/Unirest.php';
require_once 'libs/sendgrid-php-master/lib/SendGrid.php';
require_once('twilio-php/Services/Twilio.php');
SendGrid::register_autoloader();
Unirest::verifyPeer(false);

function genStars($num)
{
    if ($num >= 0) {
        $res = "";
        for ($i = 0; $i < $num; $i++) {
            $res .= "<img class='star' src='/img/star_full.png'/>";
        }
        for ($i = 0; $i < 5 - $num; $i++) {
            $res .= "<img class='star-empty' src='/img/star_empty.png'/>";
        }
    } else {
        $res = "<span>No ratings</span>";
    }
    return $res;
}

function getAdsApi()
{
    $resp = file_get_contents("ads.json");
    return json_decode($resp);
}

function sendEmail($biz, $title)
{
    $sendgrid = new SendGrid('adarshu', 'giveshelter');
    $email = new SendGrid\Email();

    $email->addTo('adarshu@gmail.com')->
        setFrom('support@' . APPDOMAIN)->
        setSubject("Your ad has been listed!")->
        setHtml("<div style='font-size: 18pt'><img src='http://adviral.com/img/AdVIRAL_web.png' height='50px'/><br/><br/><div>Dear $biz</div><br/>Your ad $title has been listed!<br/><br/>Thank you,<br/>" . APPNAME . "</div>");
    $sendgrid->web->send($email);
}


function sendSMS($biz, $title)
{
    $sid = "AC19d4b688c588b4a5f631976d8ac62a64"; // Your Account SID from www.twilio.com/user/account
    $token = "6d42cd04bbbdc0dc2580b59ac99aff95"; // Your Auth Token from www.twilio.com/user/account

    $client = new Services_Twilio($sid, $token);

    $from = "7077854717";
    $to = "5107478047";

    $msg = "Your ad '$title' has been listed on Facebook!";

    echo "Sending SMS from $from to $to ...<br/>";

    $message = $client->account->messages->sendMessage(
        $from, // From a valid Twilio number
        $to, // Text this number
        $msg
    );
}