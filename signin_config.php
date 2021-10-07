<?php

session_start();

require_once 'vendor/autoload.php';

$google_client = new Google_Client();

$google_client->setClientId('534364802624-k45qlgp0g0fqqd4c5rlm3gg1segdl5iv.apps.googleusercontent.com');


$google_client->setClientSecret('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');

$google_client->setRedirectUri('http://localhost/life-line/sign_in.php');


$google_client->addScope('email');

?>