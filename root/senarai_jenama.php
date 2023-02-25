<html>

<head>
    <style>
        .table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            margin: auto;
            background-color: white;
        }

        .table td {
            text-align: left;
            height: 30px;
        }

        .table tr td {
            text-align: center;
        }

        .table th {
            height: 30px;
            text-align: center;
            font-weight: bold;
            color: white;
            background-color: #bd5e7e;
        }
    </style>
</head>
<body>
    <div id="mainbody"><div id="tajuk">Jenama<p></div>
    <?php
    //dapatkan maklumat jenama dari jadul di dalam DB
    $sql = "SELECT * FROM jenama ORDER BY kod_jenama";
    $result = mysqli_query($conn, $sql);

    $bil = 0;
    
    if (mysqli_num_rows($result) > 0)
    {
        //table untuk paparan data 
        echo "<table class='table'>";
        echo "<col width='80'>"; //saiz column 1
        echo "<col width='100'>"; //saiz column 2
        echo "<col width='200'>"; //saiz column 3
        echo "<tr>";
        echo "<th>Bil</th>"; //column 1
        echo "<th>Kod Jenama</th>"; //column 2
        echo "<th>Jenama</th>"; //column 3
        echo "</tr>";

        //papar semua data dari jadual di DB
        while($row = mysqli_fetch_assoc($result))
        {
            $bil++;
            echo "<tr height='10'>";
            echo "<td>" .$bil. ".</td>";
            echo "<td>" .$row['kod_jenama']. "</td>";
            echo "<td>" .$row['jenama']. "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else { echo "<center> Tiada Rekod </center>";}

    ?>
</div>
</body>

</html>