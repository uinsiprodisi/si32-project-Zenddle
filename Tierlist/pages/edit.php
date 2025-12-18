<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

include "../config/koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM tierlist_ml WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $role = $_POST['role'];
    $tier = $_POST['tier'];
    $gambar = $_POST['gambar'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($conn, "UPDATE tierlist_ml SET
        nama='$nama',
        role='$role',
        tier='$tier',
        gambar='$gambar',
        deskripsi='$deskripsi'
        WHERE id='$id'
    ");

    header("Location: tierlist.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
<script src="../assets/js/script.js"></script>
    <title>Edit Hero</title>
</head>
<body>

<h2>Edit Hero</h2>

<form method="post" onsubmit="return validasiForm()">
    Nama:<br>
    <input type="text" name="nama" id="nama"> value="<?= $row['nama']; ?>"><br><br>

    Role:<br>
    <input type="text" name="role" id="role"> value="<?= $row['role']; ?>"><br><br>

    Tier:<br>
    <input type="text" name="tier" id="tier"> value="<?= $row['tier']; ?>"><br><br>

    Gambar:<br>
    <input type="text" name="gambar" value="<?= $row['gambar']; ?>"><br><br>

    Deskripsi:<br>
    <textarea name="deskripsi"><?= $row['deskripsi']; ?></textarea><br><br>

    <button type="submit" name="update">Update</button>
</form>

<a href="tierlist.php">Kembali</a>

</body>
</html>
