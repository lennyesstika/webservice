<?php
 // required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object file
include_once '../config/database.php';
include_once '../objek/produk.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare produk object
$produk = new Produk($db);

// get produk id
$data = json_decode(file_get_contents("php://input"));

// set produk id to be deleted
$produk->id = $data->id;

// delete the produk
if ($produk->delete()) {

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "Produk Berhasil diHapus."));
}

// if unable to delete the produk
else {

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Produk Gagal dihapus."));
}
 
