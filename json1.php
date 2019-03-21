<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TUGAS 3 - JSON INDEX</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css">

</head>

<body>
   
    <div class="container">
            <div class="row">
            <h3>Menampilkan Data Mysql Menggunakan JSON Penduduk :</h3>
            <?php

            $q = "SELECT k.id as no_id,k.no_kk,p.nama,p.nik,p.tempatlahir,p.tanggallahir FROM tb_keluarga as k,tb_penduduk as p WHERE p.id_kk = k.nik_kepala";
            $hasil = mysqli_query($koneksi, $q);

            if (mysqli_num_rows($hasil) > 0) {
                $data = array();
                $data['json'] = array();
                while ($x = mysqli_fetch_array($hasil)) {
                    $d['no_id'] = $x["no_id"];
                    $d['no_kk'] = $x["no_kk"];
                    $d['nama'] = $x["nama"];
                    $d['nik'] = $x["nik"];
                    $d['tempatlahir'] = $x["tempatlahir"];
                    $d['tanggallahir'] = $x["tanggallahir"];
                    array_push($data['json'], $d);
                }
                echo json_encode($data);
            } else {
                $data["pesan"] = "tidak ada data";
                echo json_encode($data);
            }
            ?>
        </div>
        <div class="row">
            <h3>Menampilkan Data Mysql Menggunakan JSON Login :</h3>
            <?php

            $q = "SELECT * FROM tb_user";
            $hasil = mysqli_query($koneksi, $q);

            if (mysqli_num_rows($hasil) > 0) {
                $data = array();
                $data['json'] = array();
                while ($x = mysqli_fetch_array($hasil)) {
                    $d['id_user'] = $x["id_user"];
                    $d['nik'] = $x["nik"];
                    $d['nama'] = $x["nama"];
                    $d['nama_user'] = $x["nama_user"];
                    $d['password'] = $x["password"];
                    $d['role'] = $x["role"];
                    $d['no_telepon'] = $x["no_telepon"];
                    array_push($data['json'], $d);
                }
                echo json_encode($data);
            } else {
                $data["pesan"] = "tidak ada data";
                echo json_encode($data);
            }
            ?>
        </div>
        <div class="row">
            <h3>Menampilkan Data Mysql Menggunakan JSON Keluarga:</h3>
            <?php

            $q = "SELECT k.id,k.no_kk,p.nama,p.nik FROM tb_keluarga as k,tb_penduduk as p WHERE p.id_kk = k.nik_kepala";
            $hasil = mysqli_query($koneksi, $q);

            if (mysqli_num_rows($hasil) > 0) {
                $data = array();
                $data['json'] = array();
                while ($x = mysqli_fetch_array($hasil)) {
                    $d['id'] = $x["id"];
                    $d['no_kk'] = $x["no_kk"];
                    $d['nama'] = $x["nama"];
                    $d['nik'] = $x["nik"];
                    array_push($data['json'], $d);
                }
                echo json_encode($data);
            } else {
                $data["pesan"] = "tidak ada data";
                echo json_encode($data);
            }
            ?>
        </div>
    </div>







    <script src="js/jquery.js"></script>
    <script src=" js/bootstrap.js"></script>
</body>


</html> 