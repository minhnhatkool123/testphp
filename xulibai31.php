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

    $dataName = "select hotenkh from KHACHHANG,xe where xe.makh=KHACHHANG.makh and xe.soxe=$soxe";
    $res1 = $conn->query($dataName);

    if ($res1->num_rows > 0) {
        $ketquaName = $res1->fetch_row();
        echo $ketquaName[0];
    }
}
$conn->close();
