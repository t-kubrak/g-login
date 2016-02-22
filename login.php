<?php
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId("CLIENT_ID");

session_start();


    $token = isset($_POST['idtoken']) ? $_POST['idtoken'] : null;

    try {
        $payload = $client->verifyIdToken($token);
    } catch (Google_Auth_Exception $e) {
        http_response_code(401);
        exit;
    }

    $_SESSION['user_id'] = $payload->getUserId();;
    echo $_SESSION['user_id'];

