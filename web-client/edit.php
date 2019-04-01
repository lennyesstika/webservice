<?php
include 'vendor/autoload.php';
$id = $_GET['id'];

use GuzzleHttp\Client;

$client = new Client();

$respon = $client->request('GET', 'http://localhost/arsitektur-api/server-api/produk/index_id.php', [
    'query' => [
        'id' => $id
    ]
]);
$result = json_decode($respon->getBody()->getContents(), true);
for ($x = 0; $x < count($result); $x++) {
    $id = $result['id'];
    $namaproduk = $result['nama'];
    $harga = $result['harga'];
    $keterangan = $result['keterangan'];
    $id_produk = $result['id_kategori'];
    $nama_kategori = $result['nama_kategori'];
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TUGAS4-WEB-CLIENT</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.js"></script>
</head>

<body>
    <div class="card col-sm-8">
        <div class="card-body ">
            <h5 class="card-title ">Tambah Data</h5>
        </div>
        <form action="prosesedit.php" method="POST">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="recipient-name" class="col-sm-3 col-form-label">No ID:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control" name="noid" value="<?= $id; ?>">
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="recipient-name" class="col-sm-3 col-form-label">Nama:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="namaproduk" value="<?= $namaproduk; ?>">
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="recipient-name" class="col-sm-3 col-form-label">Harga:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="harga" value="<?= $harga; ?>">
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="recipient-name" class="col-sm-3 col-form-label">Keterangan:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="keterangan" value="<?= $keterangan; ?>">
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-group row">
                        <label for="recipient-name" class="col-sm-3 col-form-label">Kategori:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="id_kategori" id="id_kategori">
                                <option value="1">Fashion</option>
                                <option value="2">Electronics</option>
                                <option value="3">Motors</option>
                                <option value="4">Movies</option>
                                <option value="5">Books</option>
                            </select>
                        </div>
                    </div>
                </li>

            </ul>
            <div class="card-body text-center">
                <input type="submit" class="btn btn-primary" name="input"><br>
            </div>
        </form>
    </div>
</body>

</html> 
