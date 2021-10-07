
<?php

session_start();

require_once 'vendor/autoload.php';

$google_client = new Google_Client();
$google_client->setClientId('534364802624-bn3cq4hv1lh0li4fusvef3km1fjd5a2c.apps.googleusercontent.com');
$google_client->setClientSecret('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');
$google_client->setRedirectUri('http://localhost/life-line/register.php');


$google_client->addScope('email');

$google_client->addScope('profile');

?> 
