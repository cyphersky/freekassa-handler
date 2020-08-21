<?php

include "../config.php";
include "../db.php";

$data = $_POST;

$donator = R::findOne('donators', 'steamid64 = ?', array($data['us_steamid']));

$sign = md5($id.':'.$_REQUEST['AMOUNT'].':'.$secret.':'.$_REQUEST['MERCHANT_ORDER_ID']);

$ips = array(
    "136.243.38.147" => true,
    "136.243.38.149" => true,
    "136.243.38.150" => true,
    "136.243.38.151" => true,
    "136.243.38.189" => true,
    "136.243.38.108" => true,
);

function get_ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

if ($ips[get_ip()]) {
    if ($sign == $_REQUEST['SIGN']) {
        if ($data['us_steamid']) {
            if ($donator) {
                $donator->balance = $donator->balance + $_REQUEST['AMOUNT'];
                R::store($donator);
            } else {
                $user = R::dispense('donators');
                $user->steamid64 = $data['us_steamid'];
                $user->balance = $_REQUEST['AMOUNT'];
                R::store($user);
            }
            echo '{"result": {
                "message": "Request processed successfully"
            }}';
        } else {
            echo '{"error": {
                "message": "No SteamID"
            }}';
        }
    } else {
        echo '{"error": {
            "message": "The signature bad"
        }}';
    }
} else {
    echo '{"error": {
        "message": "Unregistered IP"
    }}';
}
