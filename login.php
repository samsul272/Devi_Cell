<?php

session_start();
require 'inc/koneksi.php';
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    // id == id_pengguna
    $id = $_COOKIE['id'];
    // Key == Username
    $key = $_COOKIE['key'];


    // ambil username berdasarkan id
    $result = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE id_pengguna = '$id'");
    $row = mysqli_fetch_assoc($result);
    // set session
    $_SESSION["ses_id"] = $row["id_pengguna"];
    $_SESSION["ses_nama"] = $row["nama_pengguna"];
    $_SESSION["ses_username"] = $row["username"];
    $_SESSION["ses_password"] = $row["password"];
    $_SESSION["ses_level"] = $row["level"];
    $data_level =  $_SESSION["ses_level"];
    $_SESSION['login'] = true;
}

// Login adalah name dari button Login
// Jika session login masih  ada maka redirect ke halaman index2
if (isset($_SESSION["login"])) {
    if ($data_level == 'Administrator') {
        header("location: index2.php?page=MyApp/admin");
    } elseif ($data_level == 'Karyawan') {
        header("location: index2.php?page=MyApp/karyawan");
    }
    exit;
}



if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE username = '$username' && password='$password'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);

        // set session
        $_SESSION["ses_id"] = $row["id_pengguna"];
        $_SESSION["ses_nama"] = $row["nama_pengguna"];
        $_SESSION["ses_username"] = $row["username"];
        $_SESSION["ses_password"] = $row["password"];
        $_SESSION["ses_level"] = $row["level"];
        $data_level =  $_SESSION["ses_level"];
        $_SESSION["login"] = true;

        // cek remember me
        if (isset($_POST['remember'])) {
            //buat cookie selama 1 minggu atau 604800 detik
            setcookie('id', $row['id_pengguna'], time() + 604800);
            setcookie('key', $row['username'], time() + 604800);
        }

        if ($data_level == 'Administrator') {
            header("location: index2.php?page=MyApp/admin");
        } elseif ($data_level == 'Karyawan') {
            header("location: index2.php?page=MyApp/karyawan");
        }
        exit;
    }

    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Keuangan Devi Cell | Log in</title>
    <link rel="icon" href="dist/img/konter.png">
    <link rel="stylesheet" href="dist/css/style.css" />
    <style>
        .fa-user {
            position: absolute;
            color: #aaa;
            top: 18px;
            left: 16px;
            transition: 0.3s;
            font-size: 0.875rem;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>

<body>
    <main>
        <div class="login-container">
            <img src="dist/img/login/avatar.svg" alt="" class="img-avatar" />
            <h1 class="title">Silahkan Login!</h1>

            <!-- Jika user dan password salah munculkan pesan -->
            <?php if (isset($error)) : ?>
                <p style="color: red; font-style: italic;"><b>username / password salah</b></p><br>
            <?php endif; ?>

            <form action="" method="post">
                <div class="input-box">
                    <input type="text" class="input" name="username" placeholder="username" required />
                    <i class="fas fa-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input" name="password" placeholder="Password" id="pwd" required />
                    <i class="fas fa-lock"></i>
                    <i class="fas fa-eye" id="icon-eye"></i>
                </div>

                <div class="input-box">
                    <input type="checkbox" name="remember" id="remember" />
                    Remember Me
                </div>

                <!-- <a href="#" class="forgot-password">Lupa Password</a> -->

                <input type="submit" class="btn" name="login" value="Login" />
            </form>

            <div class="footer-container">
                <span>Aplikasi Manajemen Catatan Keuangan<br><a href="templete/index.php">konter pulsa Devi Cell</a></span>
            </div>
        </div>

    </main>
    <section class="illustration-container">
        <img src="dist/img/login/illustration.svg" alt="" />
        <div class="circle"></div>
    </section>
    <script src="dist/js/main.js"></script>
    <script src="plugins/alert.js"></script>
</body>

</html>