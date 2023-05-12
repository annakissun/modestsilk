<?php
//session
include('session.php');
?>
<html>

<head>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #DDC1BD;
        }

        li {
            float: left
        }

        li a .dropbtn {
            display: infinite-block;
            font-family: Courier new;
            color: white;
            text-align: center;
            padding: 10px 16px;
            text-decoration: none;
            font-weight: bold;
        }

        li a:hover,
        .dropdown:hover .dropbtn {
            background-color: #bd5e7e;
            color: white
        }

        li.dropdown {
            display: infinite-block;
            float: right;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 18;
            background-color: #AC8B8A;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: right;
        }

        .dropdown-content a:hover {
            background-color: #bd5e7e;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body>
    <?php
    if ($kat == "A") //Menu Admin
    {
        
        $menu1 = '<a href="senarai_produkA.php">Senarai Baju</a>';
        $menu2 = '<a href="borang_produk.php">Tambah Baju</a>';
        $menu3 = '<a href="jenama.php">Jenama Baju</a>';
    } else //Menu pembeli kat=1 (untuk pembeli yang login)
    {
      
        $menu1 = '<a href="senarai_produkP.php?kat=1">Senarai Baju</a>';
        $menu2 = '<a href="saring_produk.php?kat=1">Saring Baju</a>';
        $menu3 = '';
    }
    ?>

    <ul>
        
        <li class="dropdown">
            <a href="#" class="dropbtn">Hai, <?php echo $nama; ?></a>
            <div class="dropdown-content">
                <!-- menu untuk pengguna yang berlainan -->
                <?php
                echo $menu1;
                echo $menu2;
                echo $menu3;
                ?>
                <a href="logout.php">Log Keluar</a>
            </div>
        </li>
    </ul>
</body>

</html>