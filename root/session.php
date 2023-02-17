<?php
//start session
session_start();

//Sambung ke DB
include ('db_conn.php');

//Pengang data session berdasarkan kunci primer dalam jadual
$id = $_SESSION['id']; //login_id

//dapatkan kategori semasa pengguna login
$kat = $_SESSION['kategori'];

if ($kat == "A") {
    $jadual = "admin";
} else {
    $jadual = "pembeli";
}

//dapatkan data pengguna berdasarkan session kunci primer
$mysql = "SELECT * FROM $jadual WHERE login_id='$id'";
$result = mysqli_query($conn, $mysql);
$row = mysqli_fetch_array($result);

$nama = $row['nama'];
$id = $row['login_id'];

//jika data session tidak dijuumpai dalam jadual
if(!isset($id))
{
    header("Location: index.php");
//kembali ke paparan utama
}
?>
