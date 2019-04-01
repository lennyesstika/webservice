<?php
 // required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../config/database.php';
include_once '../objek/produk.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare produk object
$produk = new Produk($db);

// get id of produk to be edited
$data = json_decode(file_get_contents("php://input"));

// set ID property of produk to be edited
$produk->id = $data->id;

// set produk property values
$produk->nama = $data->nama;
$produk->harga = $data->harga;
$produk->keterangan = $data->keterangan;
$produk->id_kategori = $data->id_kategori;

// update the produk
if ($produk->update()) {

    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "Produk Berhasil Dirubah."));
}

// if unable to update the produk, tell the user
else {

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array("message" => "Produk Gagal Dirubah."));
}
 
