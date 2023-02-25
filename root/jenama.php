<?php
include("header.php");
include("nav.php");
?>
<html>

<head>
    <link rel="stylesheet" href="style.css" />
    <style>
        #mainbody {
            background-color: #DDC1BD;
            padding: 20px;
        }

        #tajuk {
            font-size: 30px;
            font-family: Courier New;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include("senarai_jenama.php"); ?>

    <div id="mainbody">
        <div id="tajuk">
            <h5> Muat Naik Jenama Baju</h5>

            <!--- borang untuk nuatnaik jenama-->
            <form action="upload_jenama.php" method="POST" enctype="multipart/form-data">
                <center>
                    <h5>Pilih fail untuk dimuat naik (Fail excel .csv sahaja) :</h5>
                    <input type="file" name="file_csv" required>
                    <p>
                        <input type="submit" name="upload" value="Muat Naik">
                    </p>
                </center>
            </form>

        </div>
        <?php include("footer.php"); ?>
</body>

</html>