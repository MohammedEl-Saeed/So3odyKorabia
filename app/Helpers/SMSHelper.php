<?php


namespace App\Helpers;


class SMSHelper
{
    public function sendMessage($message,$destinations){
        $username = "MeatVilage";
        $password = "Ben$17!Mi*nUK";
//        $destinations = "966563454449";
//        $message = "Hello ya ged3an";
        $sender = "MeatVilage";
//    $username = "egraty.sa";
//    $password = "egraty@M2030oon";
//    $destinations = "966563454449";
//    $message = "Hello ya Admin";
//    $sender = "Egraty";
        $arrData = [
            "user" => $username,
            "pass" => $password,
            "to" => $destinations,
            "message" => $message,
            "sender" => $sender
        ];
        $getdata = http_build_query($arrData);
        $opts = array('http' =>
            array(
                'method' => 'GET',
                'header' => 'Content-type: application/x-www-form-urlencoded',
            )
        );

        $context = stream_context_create($opts);

        $results = file_get_contents('https://www.jawalbsms.ws/api.php/sendsms?' . $getdata, false, $context);

        return $results;
    }
}
