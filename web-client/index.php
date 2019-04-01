<?php
include 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$respon = $client->request('GET', 'https://wwwmytravellingblogspotcom.000webhostapp.com/web-server/produk', []);

$result = json_decode($respon->getBody()->getContents(), true);

?>
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
    <div class="container-fluid">
        <div class="row">
            <a href="tambah.php" class="btn btn-sm btn-success">Tambah Data</a><br>
            <h3>Lenny Estika Sari NIM 16.01.53.0137</h3>
        </div>
        <div class="row">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">ID Kategori</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($result['hasil'] as $data) {
                        ?>
                    <tr>
                        <td class="text-center"><?= $data['id']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['harga']; ?></td>
                        <td><?= $data['keterangan']; ?></td>
                        <td class="text-center"><?= $data['id_kategori']; ?></td>
                        <td><?= $data['nama_kategori']; ?></td>
                        <td class="text-center">
                            <a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="hapus.php?id=<?= $data['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php 
                } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html> 
