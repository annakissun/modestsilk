<?php
include("header.php");
include("nav.php");
?>
<html>

<head>
    <link rel="stylesheet" href="style.css" />
    <style>
        table {
            border: 3px solid #bd5e7e;
            border-collapse: collapse;
            margin: auto;
            font-weight: bold;
            background-color: #AC8B8A;
        }

        td {
            vertical-align: top;
        }

        td:nth-child(2) {
            text-align: right;
        }

        tr:nth-align(7) {
            text-align: right;
        }

        tr {
            height: 20px;
        }

        input {
            width: 300px;
        }

        select {
            width: 300px;
        }

        input[type=button] {
            width: 100px;
        }

        input[type=submit] {
            width: 100px;
        }

        textarea {
            width: 300px;
            height: 80px;
        }
    </style>
</head>

<body>
    <div id="mainbody">
        <form action="proses_produk.php" method="POST" enctype="multipart/form-data">
            <div id="tajuk">Tambah Baju</div>
            <p>
            <table cellpading='5px'>
                <tr>
                    <td style="width: 30px"></td>
                    <td></td>
                    <td></td>
                    <td style="width: 40px"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>No Siri :</td>
                    <td><input type="text" name="ns" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Jenama :</td>
                    <td><select name="jn" required>
                            <option value="">--Sila Pilih--</option>
                            <?php
                            /*dapatkan jenama dari jadual DB untuk dipaparkan dalam dropdown*/
                            $sql = mysqli_query($conn, "SELECT * FROM jenama");
                            while ($row = mysqli_fetch_array($sql)) {
                            ?>
                                <option value="<?php echo $row['kod_jenama']; ?>">
                                    <?php echo $row['jenama']; ?>
                                </option>
                            <?php } ?>
                        </select></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Harga :</td>
                    <td><input type="number" name="hg" step="any" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Kuantiti :</td>
                    <td><input type="number" name="kt" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Penerangan :</td>
                    <td><textarea name="pn" required></textarea></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Gambar :</td>
                    <td><input type="file" name="gmbr" accept="images/*" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="simpan" value="SIMPAN"></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>
    <?php include("footer.php"); ?>

</body>

</html>