<?php
session_start();
include "../config/koneksi.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
        "SELECT * FROM users 
         WHERE username='$username' AND password='$password'"
    );

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header("Location: tierlist.php");
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
<script src="../assets/js/script.js"></script>
    <title>Login</title>
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


<h2>Login Admin</h2>

<?php if (isset($error)) { ?>
    <p style="color:red"><?= $error; ?></p>
<?php } ?>

<form method="post">
    Username:<br>
    <input type="text" name="username" required><br><br>

    Password:<br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="login">Login</button>
</form>

</body>
</html>
