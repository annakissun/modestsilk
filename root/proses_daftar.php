<?php

//Sambungan ke DB
include ('db_conn.php');

/* Dapatkan data dari semua medan/textfield 
pada borang_daftar.php */
$login = $_POST['login'];
$pwd = md5($_POST['klaluan']); //encrypt katalaluan
$kat = $_POST['nama'];

 //semak jika login_id telah wujud dalam DB
 $semak = "SELECT login_id FROM pembeli
           WHERE login_id = '$login'";
 $result = mysqli_query($conn, $semak); //check balik ok

 //jika login_id sudah wujud, papar javascript popup mesej
 if (mysqli_num_rows($result) > 0)
 {
    echo '<script>
    alert("Login ID adnda telah didaftarkan!!");
    window.location.href="borang_daftar.php";</script>';
 } else {
    //jika login belum wujud, simpan data pembeli dalam DB
    $mysql = "INSERT INTO pembeli
    (login_id, katalaluan, nama)
    VALUES ('$login', '$pwd' , '$nama')";

    if (mysqli_query($conn, $mysql)) {
        //papar js popup mesej jika pembeli baharu berjaya daftar
        echo '<script>
        alert ("Berjaya daftar pembli baharu!!!");
        window.location.href="borang_login.php";</script>';
        //selepas berjaya daftar, kembali ke login page
    } else {
        echo "Error ;" . mysqli_error($conn); 
    }
 }

 //Close connection
 mysqli_close($conn)
?>