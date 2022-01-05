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

if (isset($_POST["tenkh"])) {

    $tenkh = $_POST["tenkh"];
    $soxe = $_POST["soxe"];
    $soxe = (int)$soxe;
    $hangxe = $_POST["hangxe"];
    $namsx = $_POST["namsx"];

    $dataName = "select * from KHACHHANG where hotenkh='$tenkh'";
    $res1 = $conn->query($dataName);
    $ketquaName = $res1->fetch_row();

    $sql = "INSERT INTO xe VALUES ($soxe,'$hangxe', '$namsx', $ketquaName[0])";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error:";
    }
}
$conn->close();
