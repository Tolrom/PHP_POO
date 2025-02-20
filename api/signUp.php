<?php

//! SIGNUP ENDPOINT

//? Setting up control headers

// Setting up the CORS (Allowing everything here)
header("Access-Control-Allow-Origin: * ");

// Data formating
header("Content-Type: application/json; charset=UTF-8");

// Allowed method (POST here)
header("Access-Control-Allow-Methods: POST");

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
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    http_response_code(405);
    echo json_encode(['message' => "Method non autorisée", 'code response' => 405]);
    return;
}


// Data retrieving
// Accessing the body of the request
$data = file_get_contents('php://input');

// Decoding the json 
$data = json_decode($data);

// Data validation
if (!isset($data->username) || !isset($data->email) || !isset($data->password)) {
    $message = 'Data missing : ';
    $message .= !isset($data->username) ? 'Username ' : '';
    $message .= !isset($data->email) ? 'Email ' : '';
    $message .= !isset($data->password) ? 'Password ' : '';
    http_response_code(400);
    echo json_encode(['message' => $message, 'code response' => 400]);
    exit;
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
    addAccount($bdd,$data);
} catch (\Exception $e) {
    echo json_encode(["message"=> "Error : " . $e->getMessage()]);
}

// Sending a response

// 1) Encoding the response
http_response_code(200);

// 2) Converting the response into json
$response = json_encode(['message' => "Success", 'code response' => 200]);

// 3) Sending the response via echo
echo $response;