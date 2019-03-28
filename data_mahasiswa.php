<?php include 'koneksi2.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TUGAS 2 Menampilkan Data Akademik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css">

</head>

<body>
        <div class="container">
        <div class="row">
            <h2>Data Mahasiswa</h2>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">NIM</th>
                        <th scope="col" class="text-center">Nama</th>
                        <th scope="col" class="text-center">Prodi</th>
                        <th scope="col" class="text-center">Mata Kuliah</th>
                        <th scope="col" class="text-center">SKS</th>
                        <th scope="col" class="text-center">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $q = "SELECT m.nim,m.nama,m.prodi,k.nmmk,k.sks,n.nilai FROM mahasiswa as m, matakuliah as k, nilai as n WHERE m.prodi=k.prodi AND k.kdmk = n.kdmk";
                    $hasil = mysqli_query($koneksi, $q);

                    foreach ($hasil as $data) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $no++; ?></th>
                        <td class="text-center"><?= $data['nim']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td class="text-center"><?= $data['prodi']; ?></td>
                        <td><?= $data['nmmk']; ?></td>
                        <td class="text-center"><?= $data['sks']; ?></td>
                        <td class="text-center"><?= $data['nilai']; ?></td>
                    </tr>
                    
                    <?php

                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="container">
        <div class="row">
            <h2>Data Mata Kuliah</h2>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Kode MK</th>
                        <th scope="col" class="text-center">Mata Kuliah</th>
                        <th scope="col" class="text-center">SKS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $q = "SELECT * FROM matakuliah";
                    $hasil = mysqli_query($koneksi, $q);

                    foreach ($hasil as $data) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $no++; ?></th>
                        <td class="text-center"><?= $data['kdmk']; ?></td>
                        <td><?= $data['nmmk']; ?></td>
                        <td class="text-center"><?= $data['sks']; ?></td>
                    </tr>
                    <?php

                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="container">
        <div class="row">
            <h2>Data Nilai</h2>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">NIM</th>
                        <th scope="col" class="text-center">Kode MK</th>
                        <th scope="col" class="text-center">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $q = "SELECT * FROM nilai";
                    $hasil = mysqli_query($koneksi, $q);

                    foreach ($hasil as $data) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $no++; ?></th>
                        <td class="text-center"><?= $data['nim']; ?></td>
                        <td><?= $data['kdmk']; ?></td>
                        <td class="text-center"><?= $data['nilai']; ?></td>
                    </tr>
                    <?php

                }
                ?>
                </tbody>
            </table>
        </div>


    </div>






    <script src="js/jquery.js"></script>
    <script src=" js/bootstrap.js"></script>
</body>


</html> 