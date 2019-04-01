<?php
include 'vendor/autoload.php';
$namaproduk = $_POST['namaproduk'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];
$id_kategori = $_POST['id_kategori'];

use GuzzleHttp\Client;
use function GuzzleHttp\json_encode;

$client = new Client(['headers' => ['Content-Type' => 'application/json']]);

$respon = $client->request('POST', 'https://wwwmytravellingblogspotcom.000webhostapp.com/web-server/produk/tambah.php', [
    'body' => json_encode([
        'nama' => $namaproduk,
        'harga' => $harga,
        'keterangan' => $keterangan,
        'id_kategori' => $id_kategori
    ])
]);
header("Location: index.php");
