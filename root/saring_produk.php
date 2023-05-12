<?php
include("db_conn.php");
include("header.php");

//kat==0 (pembeli tidak login)
//ket==1 (pemebli login)
if ($_GET['kat'] == 0) {
    $navmenu = "topnav_right.php";
    $link = "kat=0";
} else {
    $navmenu = "nav.php";
    $link = "kat=1";
}
include($navmenu);
?>
<html>

<head>
    <link rel="stylesheet" href="style.css" />
    <style>
        table {
            border: 3px solid #bd5e7e;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            margin: auto;
            text-align: left;
        }

        td {
            text-align: right;
        }

        tr {
            height: 10px;
        }

        select {
            width: 200px;
        }

        input {
            width: 90px;
        }

        #atau {
            font-size: 17px;
            font-family: courier new;
            font-style: italic;
            text-align: center;
        }
    </style>
</head>

<body>
    <div id="mainbody2">
        <div id="tajuk">
            <p>Saring Baju Raya</p>
        </div>

        <form action="senarai_produkP.php?<?php echo $link; ?>" method="post">

            <table cellpadding='5px'>
                <tr>
                    <td style="width: 30px"></td>
                    <td></td>
                    <td></td>
                    <td style="width: 10px"></td>
                    <td></td>
                    <td style="width: 30px"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Jenama:</td>
                    <td><select name="jn">
                            <option>- Pilih - </option>
                            <?php
                            $sql = "SELECT * FROM jenama";
                            $res = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($res)) {
                            ?>
                                <option value="<?php echo $row['kod_jenama']; ?>">
                                    <?php echo $row['jenama'];  ?>
                                </option>
                            <?php } ?>
                        </select></td>
                    <td></td>
                    <td><input type="submit" name="btn_jn" value="Saring"></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td id="atau">ATAU</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Harga:</td>
                    <td><input type="number" name="hg1" step="any" placeholder="min"> -
                    <td><input type="number" name="hg2" step="any" placeholder="max"></td>
                    <td></td>
                    <td><input type="submit" name="btn_hg" value="Saring"></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>