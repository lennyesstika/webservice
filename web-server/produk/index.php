<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objek/produk.php';

$database = new Database();
$db = $database->getConnection();

$produk = new Produk($db);

$stmt = $produk->read();
$num = $stmt->rowCount();

if ($num > 0) {

    $produk_arr = array();
    $produk_arr["hasil"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $produk_item = array(
            "id" => $id,
            "nama" => $nama,
            "keterangan" => html_entity_decode($keterangan),
            "harga" => $harga,
            "id_kategori" => $id_kategori,
            "nama_kategori" => $nama_kategori
        );

        array_push($produk_arr["hasil"], $produk_item);
    }


    http_response_code(200);

    echo json_encode($produk_arr);
} else {

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}
