<?php
include("header.php");
include("nav.php");
?>
<html>

<head>
<link rel="stylesheet" href="style.css" />
    <style>
        #mainbody {
            background-color:  #DDC1BD;
            padding: 10px;
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

        th {
            /*table header*/
            height: 30px;
            text-align: center;
            font-weight: bold;
            color: white;
            background-color: #bd5e7e;
        }

        td {
            text-align: center;
            height: 30px;

        }

        tr:nth-child(even) {
            background-color: LightYellow;
        }

        tr:nth-child(odd) {
            background-color: Khaki;
        }
    </style>
</head>

<body>
    <div id="mainbody">
        <div id="tajuk">
            <p>Senarai Baju</p>
        </div>
        <!-- Senarai Produk -->
        <?php
        $query = "SELECT *
        FROM baju
        INNER JOIN jenama USING (kod_jenama)
        ORDER BY jenama";
        $result = mysqli_query($conn, $query);

        $bil = 0;

        if (mysqli_num_rows($result) >0)
        {
            //table untuk paparan data
            echo "<table>";
            echo "<col width='10'>"; //saiz column 1
            echo "<col width='50'>"; //saiz column 2
            echo "<col width='100'>"; //saiz column 3
            echo "<col width='150'>"; //saiz column 4
            echo "<col width='100'>"; //saiz column 5
            echo "<col width='100'>"; //saiz column 6
            echo "<col width='80'>"; //saiz column 7
            echo "<col width='80'>"; //saiz column 8
            echo "<tr>";
            echo "<th></th>"; // column 1
            echo "<th>Bil</th>"; // column 2
            echo "<th>No Siri</th>"; // column 3
            echo "<th>Jenama</th>"; // column 4
            echo "<th>Harga (RM)</th>"; // column 5
            echo "<th>Kuantiti</th>"; // column 6
            echo "<th>Edit</th>"; // column 7
            echo "<th>Padam</th>"; // column 8
            echo "</tr>";

            //papar semua data dari jadual di DB
            while($row = mysqli_fetch_assoc($result))
            {
                $bil++;

                echo "<tr height='10'>";
                echo "<td></td>";
                echo "<td>".$bil.".</td>";
                echo "<td>".$row['no_siri']."</td>";
                echo "<td>".$row['jenama']."</td>";
                echo "<td>".$row['harga']."</td>";
                echo "<td>".$row['kuantiti']."</td>";

                echo "<td><a href='edit_produk.php?no=".$row['no_siri']."'>
                edit
                </a></td>";
                echo "<td><a href='padam_produk.php?no=".$row['no_siri']."'>
                padam
                </a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        else { echo "<center>Tiada rekod</center>"; }
        ?>
        </div>
        <?php
        include ("footer.php");
        ?>
</body>

</html>