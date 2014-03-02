<?php
include('_common/coreutil.php');
include('constants.php');
require_once 'libs/unirest-php-master/lib/Unirest.php';
require_once 'libs/sendgrid-php-master/lib/SendGrid.php';
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

function sendEmail($type, $title)
{
    $sendgrid = new SendGrid('adarshu', 'giveshelter');
    $email = new SendGrid\Email();

    if ($type == "sold") {
        $email->addTo('adarshu@gmail.com')->
            setFrom('support@' . APPDOMAIN)->
            setSubject("Your note $title has been sold!")->
            setHtml("<div style='font-size: 18pt'>Your note $title has been sold!<br/><br/>Thank you,<br/>" . APPNAME . "</div>");
    } else if ($type == "bought") {
        $email->addTo('adarshu@gmail.com')->
            setFrom('support@' . APPDOMAIN)->
            setSubject("Your purchase of $title is complete!")->
            setHtml("<div style='font-size: 18pt'>Your purchase of $title is complete!<br/><br/>Thank you,<br/>" . APPNAME . "PaidNote</div>");
    }
    $sendgrid->web->send($email);
}