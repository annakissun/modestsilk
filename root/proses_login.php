<?php
//start session
session_start();

//Sambungan ke DB
include('db_conn.php');

//Dapatkan data dari borang login
$login = $_POST['login'];
$pwd = md5($_POST['klaluan']); //encrypt katalaluan
$kat = $_POST['kat'];

if ($kat == "A") {
    $jadual = "admin";
    $link = "senarai_produkA.php";
} else {
    $jadual = "pembeli";
    $link = "senarai_produkP.php?kat=1";
}

//Semak login_id dan katalaluan dalam jadual
$mysql = "SELECT * FROM $jadual
          WHERE login_id = '$login' AND katalaluan='$pwd'";
$result = mysqli_query($conn, $mysql);
$row = mysqli_fetch_array($result);

//juka WUJUD login-id dan katalaluan yang sama
if (mysqli_num_rows($result) > 0) {
    //dapatkan nama dan kunci primer(login_id) pengguna
    $_SESSION['id'] = $row['login_id']; //simpan data session
    $nama = $row['nama'];
    $_SESSION['kategori'] = $kat;

    //papar popup mesej jika berjaya
    echo '<script>alert("Selamat datang ' . $nama . '");
            window.location.href="' . $link . '"</script>';
} else //jika TIDAK WUJUD data id dan katalaluan yang sama
{
    echo '<script>alert("Login ID atau Katalaluan SALAH!!");
    window.location.href="borang_login.php";</script>';
}

//Close db connection
mysqli_close($conn);
?>