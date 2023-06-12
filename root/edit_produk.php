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
    <?php
    //dapatkan no_siri
    $nosiri = $_GET['no'];

    // jika user klik butang kemaskini.
    //update record dalam jadual
    if (isset($_POST['edit'])) {

        $jn = $_POST["jn"];
        $hg = $_POST["hg"];
        $kt = $_POST["kt"];
        $pn = $_POST["pn"];

        $stmt = $conn->prepare('UPDATE baju SET kod_jenama = ?, harga = ?, kuantiti = ?, penerangan = ? WHERE no_siri = ?');
        $stmt->bind_param("sssss", $jn, $hg, $kt, $pn, $nosiri);

        if ($stmt->execute()) {
            echo '<script>alert ("Berjaya Kemaskini produk!"); 
            window.location.href="senarai_produkA.php";</script>';
        } else {
            echo "Error ; " . mysqli_error($conn);
        }

        $stmt->close();
    }
    //proses update tamat

    //dapatkan data produk
    $sql2 = "SELECT * FROM baju
    INNER JOIN jenama USING (kod_jenama)
    WHERE no_siri = '$nosiri'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);
    $gmbr = "gambar/" . $row2['gambar'];
    ?>

    <div id="mainbody">
        <form action="edit_produk.php?no=<?php echo $nosiri; ?>" method="POST">
            <div id="tajuk">
                Kemaskini Maklumat Baju
            </div>
    </div>
    <p>
    <table cellpadding='5px'>
        <tr>
            <td style="width: 30px"></td>
            <td></td>
            <td></td>
            <td style="width: 40px"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><img src="<?php echo $gmbr; ?>" width="246px" height="200px"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>No Siri :</td>
            <td><?php echo $row2['no_siri']; ?></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Jenama :</td>
            <td><select name="jn">
                    <?php
                    $mysql = "SELECT * FROM jenama";
                    $result = mysqli_query($conn, $mysql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $row['kod_jenama']; ?>">
                            <?php echo $row['jenama']; ?>
                        </option>
                    <?php } ?>
                </select>
            </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Harga :</td>
            <td><input type="number" name="hg" step="any" value="<?php echo $row2['harga']; ?>" required></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Kuantiti :</td>
            <td><input type="number" name="kt" value="<?php echo $row2['kuantiti']; ?>" required></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>Penerangan :</td>
            <td><textarea name="pn" required>
                <?php echo $row2['penerangan']; ?></textarea></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="button" name="back" value="KEMBALI" onClick="javascript:history.go(-1)">
                <input type="submit" name="edit" value="KEMASKINI">
            </td>
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