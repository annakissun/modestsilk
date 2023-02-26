<html>

<head>
    <link rel="stylesheet" href="style.css" />
    <style>
        /*CSS untuk borang daftar*/

        table {
            border: 3px solid #bd5e7e;
            border-collapse: collapse;
            margin: auto;
            background-color: #AC8B8A;
            /*warna borang*/
        }

        td:nth-child(2) {
            text-align: right;
        }

        tr {
            height: 20px
        }
    </style>
</head>

<body>
    <?php
    include("header.php");
    include("topnav.php");
    ?>

    <div id="mainbody">
        <form action="proses_daftar.php" method="POST">
            <h2>Selamat Datang Ke Sistem Pemilihan</h2>
            <div id="tajuk">Daftar Pembeli Baharu</div>
            <p>

            <table cellpadding=5px>
                <tr>
                    <td style="width: 20px"></td>
                    <td></td>
                    <td></td>
                    <td style="width: 20px"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Login ID :</td>
                    <td><input type="text" name="login" required></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Katalaluan :</td>
                    <td><input type="password" name="klaluan" required placeholder="5-8 aksara sahaja" pattern=".{5,8}" title="5-8 aksara sahaja">
                        <!-- pattern ini untuk setkan had atas dan had bawah --> </td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td>Nama :</td>
                    <td><input type="text" name="nama" required>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">
                        <input type="submit" name="btnDaf" value="Daftar">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <a href="borang_login.php">Kembali
                        </a>
                    </td>
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