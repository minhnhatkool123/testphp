<?php
$servername = "172.28.0.2";
$username = "root";
$password = "123456";
$dbname = 'ko';

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["soxe"])) {
    $soxe = $_POST["soxe"];
    $soxe = (int)$soxe;

    $tenkh = $_POST["tenkh"];
    $mabd = $_POST["mabd"];
    $mabd = (int)$mabd;
    $sokm = $_POST["sokm"];
    $noidung = $_POST["noidung"];
    $today = date("d/m/Y");


    $sql = "INSERT INTO baoduong VALUES ($mabd,'$today',null, '$sokm','$noidung',$soxe,null)";


    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error:";
    }
}
$conn->close();
