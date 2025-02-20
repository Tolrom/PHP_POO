<?php

//! SIGNUP ENDPOINT

//? Setting up control headers

// Setting up the CORS (Allowing everything here)
header("Access-Control-Allow-Origin: * ");

// Data formating
header("Content-Type: application/json; charset=UTF-8");

// Allowed method (POST here)
header("Access-Control-Allow-Methods: GET");

// Request lifetime
header("Access-Control-Max-Age: 3600");

// Allowed headers
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");


// Allow preflight request (OPTIONS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204); // Code 204 : No Content
    exit;
}

// Verifying the request method
if($_SERVER['REQUEST_METHOD'] != 'GET'){
    http_response_code(405);
    echo json_encode(['message' => "Method non autorisée", 'code response' => 405]);
    return;
}

require 'models/userModel.php';
$bdd = new \PDO(
    "mysql:host=localhost;port=3306;dbname=api;charset=utf8mb4",
    "root",
    "",
    [
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
]);


//! Sending data to the model
try {
    $accounts = getAllAccount($bdd);
} catch (\Exception $e) {
    echo json_encode(["message"=> "Error : " . $e->getMessage()]);
}

// Sending a response

// 1) Encoding the response
http_response_code(200);

// 2) Converting the response into json
$response = json_encode(['message' => "Success", 'code response' => 200, 'body' => $accounts]);

// 3) Sending the response via echo
echo $response;