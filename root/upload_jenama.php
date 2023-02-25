<?php
//session
include ('session.php');

//dapatkan file .csv tersebut dan simpan dalam temp folder
$file = $_FILES["file_csv"] ["tmp_name"];

//pastikan (verify) hanya file .csv sahaja yang di upload
if (($_FILES["file_csv"]["type"]=="text/csv"))
{
    //buka dan baca file tersebut, r = read only
    $file_open = fopen($file,"r");

    //selagi masih ada data dalam file csv tersebut (EOF);
    //baca line by line
    while(($data = fgetcsv($file_open)) !==FALSE)
    {
        $mysql = "INSERT INTO jenama
        (kod_jenama, jenama)
        VALUES ('".$data[0]."','".$data[1]."')";

        if (mysqli_query($conn, $mysql))
        {
            //papar js popup mesej jika berjaya muat naik jenama
            echo ' <script>
            alert("Muat naik jenama baju BERJAYA!");
            window.location.href="jenama.php";
            </script>';
        } else {
            echo "Error ;" . mysqli_error($conn); }
        }
        //keluarkan popup msg jika bukan fail .csv

    } else {
        echo  '<script> 
        alert ("Pilih fail .csv sahaja!");
        window.location.href="jenama.php";
        </script>';
    }

    //close connection
    mysqli_close($conn);
?>