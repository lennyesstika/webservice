<?php
$dbname = "db_akademik";
$hostname = "localhost";
$username = "root";
$password = "";

$koneksi = mysqli_connect($hostname, $username, $password, $dbname);
if (!$koneksi) {
    die("Connection Failed:" . mysqli_connect_error());
}
 