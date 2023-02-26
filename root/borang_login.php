<html>

<head>
    <link rel="stylesheet" href="style.css" />
    <style>
        /*CSS untuk borang login*/

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

        <form action="proses_login.php" method="POST">
            <h2>Selamat Datang Ke Sistem Pemilihan</h2>
            <div id="tajuk">Log Masuk</div>
            <p>

            <table cellpadding='5px'>

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
                    <td><input type="password" name="klaluan" required></td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td>Kategori :</td>
                    <td>
                        <input type="radio" name="kat" value="A" required>Admin
                        <input type="radio" name="kat" value="P">Pembeli
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align: right;">
                        <input type="submit" name="btnlog" value="Log Masuk">
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td colspan="2">
                        <a href="borang_daftar.php">Daftar Pembeli Baharu
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