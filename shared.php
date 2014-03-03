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

function sendEmail($biz, $title)
{
    $sendgrid = new SendGrid('adarshu', 'giveshelter');
    $email = new SendGrid\Email();

    $email->addTo('adarshu@gmail.com')->
        setFrom('support@' . APPDOMAIN)->
        setSubject("Your ad has been listed!")->
        setHtml("<div style='font-size: 18pt'><div>Dear $biz</div><br/>Your ad $title has been listed!<br/><br/>Thank you,<br/>" . APPNAME . "</div>");
    $sendgrid->web->send($email);
}