<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}

include "../config/koneksi.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tierlist_ml WHERE id='$id'");

header("Location: tierlist.php");
?>
