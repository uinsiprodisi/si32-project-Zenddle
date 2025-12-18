<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include "../config/koneksi.php";
$data = mysqli_query($conn, "SELECT * FROM tierlist_ml");
?>


<!DOCTYPE html>
<html>
<head>
    <title>Tier List</title>
</head>
<link rel="stylesheet" href="../assets/css/style.css">
<script src="../assets/js/script.js"></script>
<body>
    <nav class="navbar">
    <div class="nav-brand">Admin Panel</div>
    <ul class="nav-menu">
        <li><a href="tierlist.php">Data Tier</a></li>
        <li><a href="tambah.php">Tambah Data</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>


<h2>Daftar Hero</h2>

<a href="tambah.php">+ Tambah Hero</a><br><br>

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Role</th>
    <th>Tier</th>
    <th>Gambar</th>
    <th>Deskripsi</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($row = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['role']; ?></td>
    <td><?= $row['tier']; ?></td>
    <td>
        <?php if($row['gambar']) { ?>
            <img src="<?= $row['gambar']; ?>" width="80">
        <?php } ?>
    </td>
    <td><?= $row['deskripsi']; ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
        <a href="hapus.php?id=<?= $row['id']; ?>"
             onclick="return konfirmasiHapus()">Hapus</a>

    </td>
</tr>
<?php } ?>

</table>

<br>
<a href="../index.php">Kembali ke Home</a>

</body>
</html>
