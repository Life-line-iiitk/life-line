<?php
include('register_config.php');

$google_client->revokeToken();

session_destroy();

header('location:sign_in.php');

?>