<?php
$db_host = "localhost";
$db_power = "root";
$db_pwd = "usbw";
$db_name = "modest silk";

// Create connection
$conn = mysqli_connect($db_host, $db_power, $db_pwd, $db_name);

// Check connection
if (!$conn) {
    die(mysqli_connect_error());
}
// echo "Sambungan ke DB berjaya\n";
// $result = $conn->query("select * from admin");
// echo "Result : " . $result->num_rows; 
?>