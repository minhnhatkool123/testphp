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

    $thanhtien = $_POST["thanhtien"];
    $soxe = $_POST["soxe"];
    $ngaynhan = $_POST["ngaynhan"];
    $today = date("d/m/Y");


    $sql = "UPDATE baoduong set ngaytra='$today', thanhtien=$thanhtien  WHERE soxe= $soxe and ngaynhan='$ngaynhan'";
    $result = $conn->query($sql);

    // if ($result->num_rows > 0) {

    //     while ($row = $result->fetch_assoc()) {
    //         // echo "<option value='$row[hotenkh]'>" . $row["hotenkh"] . "</option>";

    //     }
    // }
}


$conn->close();
