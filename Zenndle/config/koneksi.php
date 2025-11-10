<?php

$servername = "localhost";
$database = "uinsi_nim";
$username = "root";
$password = "";

// Buat Koneksi Database

$conn = mysqli_connect($servername,$username,$password,$database);

// Cek Koneksi

if ($conn) {
    die("koneksi Gagagl".mysqli_connect_error());
}

echo "koneksi Berhasil";
//mysqli_close();
?>