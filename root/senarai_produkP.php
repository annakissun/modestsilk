<?php
include("header.php");
include("db_conn.php");

if ($_GET['kat'] == 0) {
    $navmenu = "topnav.php";
    $butang = '<a href="saring_produk.php? kat=0" 
    class="butang"
    style="text-decoration: none;">
    Saring Baju</a>';
} else {
    $navmenu = "nav.php";
    $butang = '';
}
include($navmenu);
?>
<html>

<head>
    <link rel="stylesheet" href="style.css" />
    <style>
        #mainbody {
            background-color: #DDC1BD;
            padding: 10px;
            text-align: right;
        }

        #tajuk {
            font-size: 30px;
            font-family: Courier New;
            font-weight: bold;
            text-align: center;
        }

        table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            margin: auto;
        }

        td {
            text-align: center;
            height: 30px;
            width: 250px;
            padding: 20px;
            vertical-align: top;

        }

        /* CSS untuk butang main*/
        .butang {
            -webkit-border-radius: 10;
            -moz-border-radius: 10;
            border-radius: 10px;
            font-family: Courier New;
            color: #000000;
            font-size: 20px;
            background: #f5f5f5;
            padding: 10px 20px 10px 20px;
            border: solid #bd5e7e 3px;
            text-decoration: none;
        }

        .butang:hover {
            background: #bd5e7e;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div id="mainbody">
        <?php echo $butang; ?>
        <br>
        <div id="tajuk">
            <p>Senarai Baju Raya</p>
            </br>
        </div>
        <!-- query untuk saring -->
        <?php
        //jika user saring mengikut jenama
        if (isset($_POST['btn_jn'])) {
            $query = "SELECT * FROM baju INNER JOIN jenama USING (kod_jenama) WHERE kod_jenama = '$_POST[jn]' ORDER BY kod_jenama";
        }
        //jika mengikut harga
        else if (isset($_POST['btn__hg'])) {
            $query = "SELECT * FROM baju INNER JOIN jenama USING (kod_jenama) WHERE harga = '$_POST[hg1]' AND '$_POST[hg2]' ORDER BY kod_jenama";
        }
        //jika pengguna tak saring produk, papar semua produk
        else {
            $query = "SELECT * FROM baju INNER JOIN jenama USING (kod_jenama) ORDER BY kod_jenama";
        }
        $result = mysqli_query($conn, $query);

        //dapatkan jumlah rekod dalam jadual DB
        $jumlah = mysqli_num_rows($result);

        if ($jumlah > 0) {
            echo "<table cellpadding='5px' border=0><tr>";
            foreach ($result as $i => $row) {
                //dapatkan gambar dari folder
                $gmbr = "gambar/" . $row['gambar'];

                //papar maklumat produk
                echo "<td><img src=" . $gmbr . " width='92px'
                height='100px'><p>" . $row['jenama'] . " 
                " . $row['no_siri'] . "
                <p>RM " . $row['harga'] . "
                <p>" . $row['penerangan'] . "
                <hr></td>";

                //hadkan data yang disimpan, 3 rekod dalam 1 baris
                $i++;
                $lajur = 3;
                if ($i != $jumlah && $si >= $lajur && $i % $lajur == 0)
                    echo "</tr><tr>";
            }
            echo "</tr></table>";
        } else {
            echo "<center> Tiada Rekod </center>";
        }
        ?>
        <?php
        include("footer.php");
        ?>
</body>

</html>