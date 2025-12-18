<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

include "../config/koneksi.php";

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $role = $_POST['role'];
    $tier = $_POST['tier'];
    $gambar = $_POST['gambar'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($conn, "INSERT INTO tierlist_ml
    (nama, role, tier, gambar, deskripsi)
    VALUES ('$nama','$role','$tier','$gambar','$deskripsi')");

    header("Location: tierlist.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
<script src="../assets/js/script.js"></script>
    <title>Tambah Hero</title>
</head>
<body>

<h2>Tambah Hero</h2>

<form method="post" onsubmit="return validasiForm()">
    Nama:<br>
    <input type="text" name="nama" id="nama"> required><br><br>

    Role:<br>
    <input type="text" name="role" id="role"> required><br><br>

    Tier:<br>
    <input type="text" name="tier" id="tier"> required><br><br>

    Gambar (URL):<br>
    <input type="text" name="gambar"><br><br>

    Deskripsi:<br>
    <textarea name="deskripsi"></textarea><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

<a href="tierlist.php">Kembali</a>

</body>
</html>
