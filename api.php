<?php
include('shared.php');


function preSetup()
{
    header('Content-Type: application/json');
}

$action = $_GET['a'];
$title = $_GET['t'];
$biz = $_GET['b'];

//search
if ($action) {
    switch ($action) {
        case "added":
            $res = sendEmail($biz, $title);
    }
    echo $res;
}

?>