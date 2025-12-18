<?php
include "../config/koneksi.php";
$data = mysqli_query($conn, "SELECT * FROM tierlist_ml");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tier List ML</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav class="navbar">
    <div class="nav-brand">ML Tier List</div>
    <ul class="nav-menu">
        <li><a href="../index.php">Home</a></li>
        <li><a href="dashboard.php">Tier List</a></li>
        <li><a href="login.php">Login Admin</a></li>
    </ul>
</nav>

<div class="container">

<h2>Tier List Hero Mobile Legends</h2>

<table>
<tr>
    <th>Hero</th>
    <th>Role</th>
    <th>Tier</th>
    <th>Gambar</th>
    <th>Deskripsi</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)) { ?>
<tr>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['role']; ?></td>
    <td>
        <span class="badge tier-<?= strtolower($row['tier']); ?>">
            <?= strtoupper($row['tier']); ?>
        </span>
    </td>
    <td><img src="<?= $row['gambar']; ?>" width="70"></td>
    <td><?= $row['deskripsi']; ?></td>
</tr>
<?php } ?>

</table>

<br>
<a href="login.php">Login Admin</a>

</div>
</body>
</html>
    