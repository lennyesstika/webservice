<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';

include_once '../objek/produk.php';

$database = new Database();
$db = $database->getConnection();

$produk = new Produk($db);

$data = json_decode(file_get_contents("php://input"));
if (
    !empty($data->nama) &&
    !empty($data->harga) &&
    !empty($data->keterangan) &&
    !empty($data->id_kategori)
    ) 
    {

    $produk->nama = $data->nama;
    $produk->harga = $data->harga;
    $produk->keterangan = $data->keterangan;
    $produk->id_kategori = $data->id_kategori;

    if ($produk->create()) {

        http_response_code(201);

        echo json_encode(array("message" => "Produk Berhasil Dibuat."));
    }

    else {

        http_response_code(503);

        echo json_encode(array("message" => "Produk Gagal Dibuat. Silahkan Cek Kembali"));
    }
}

else {

    http_response_code(400);

    echo json_encode(array("message" => "Produk Gagal Dibuat. Data Kurang Lengkap."));
}
 
