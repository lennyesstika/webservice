<?php
 // required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// include database and object files
include_once '../config/database.php';
include_once '../objek/produk.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare produk object
$produk = new Produk($db);

// set ID property of record to read
$produk->id = isset($_GET['id']) ? $_GET['id'] : die();
// read the details of produk to be edited
$produk->readID();

if ($produk->nama != null) {
    // create array
    $produk_arr = array(
        "id" =>  $produk->id,
        "nama" => $produk->nama,
        "keterangan" => $produk->keterangan,
        "harga" => $produk->harga,
        "id_kategori" => $produk->id_kategori,
        "nama_kategori" => $produk->nama_kategori

    );

    // set response code - 200 OK
    http_response_code(200);

    // make it json format
    echo json_encode($produk_arr);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user produk does not exist
    echo json_encode(array("message" => "ID Produk Tidak Ditemukan"));
}
 
