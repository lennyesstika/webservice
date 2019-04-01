<?php
include 'vendor/autoload.php';
$id = $_POST['noid'];
$namaproduk = $_POST['namaproduk'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];
$id_kategori = $_POST['id_kategori'];



use GuzzleHttp\Client;

$client = new Client();

$promise = $client->request('PUT', 'https://wwwmytravellingblogspotcom.000webhostapp.com/web-server/produk/edit.php', [
    'body' => json_encode([
        'nama' => $namaproduk,
        'harga' => $harga,
        'keterangan' => $keterangan,
        'id_kategori' => $id_kategori,
        'id' => $id
    ])
]);
header("Location: index.php");
