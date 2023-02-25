<?php
//session
include ('session.php');

//Dapatkan data dari semua textfield pada borang_produk.php
$nosiri = $_POST ['ns'];
$jenama = $_POST ['jn'];
$harga = $_POST ['hg'];
$kuantiti = $_POST ['kt'];
$penerangan = $_POST ['pn'];

//untuk dapatkan maklumat file gambar yang diupload
$fileExt = strtolower(pathinfo($_FILES["gmbr"]["name"], PATHINFO_EXTENSION));

$gambar = $_FILES["gmbr"]["name"];

$tempname = $_FILES["gmbr"]["tmp_name"];

//semak format file gambar
if($fileExt!="png" && $fileExt!="gif" && $fileExt!="jpg" && $fileExt!="jpeg")
{
    echo '<script>
    alert("Sila pilih gambar GIF/JPG/PNG sahaja!");
    window.location.href="borang_produk.php";</script>';
}
else
{
    //folder untuk simpan gambar
    $folder = "gambar/".$gambar;

    //simpan gambar dalam folder
    move_uploaded_file($tempname, $folder);

    //simpan data produk dalam jadual
    $mysql = "INSERT INTO baju (no_siri, kod_jenama, harga, kuantiti, penerangan, gambar, login_id)
    VALUES ('$nosiri', '$jenama', '$harga', '$kuantiti', '$penerangan', '$gambar', '$id')";

    if (mysqli_query($conn,$mysql)) {
        //papar js popup mesej jika maklumat produk berjaya simpan
        echo '<script>alert("Baju baharu berjaya disimpan!");
        window.location.href="senarai_produkA.php";</script>';
    } else {
        echo "Error ; " . mysqli_error($conn);
    }
}
//close connection
mysqli_close($conn);
