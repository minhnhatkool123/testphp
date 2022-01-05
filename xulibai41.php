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

if (isset($_POST["dateTime"])) {
    $dateTime = $_POST["dateTime"];


    $dataName = "select soxe from baoduong where  ngaynhan='$dateTime'";
    $res1 = $conn->query($dataName);

    if ($res1->num_rows > 0) {
        while ($row = $res1->fetch_assoc()) {
            echo "<option value='$row[soxe]'>" . $row["soxe"] . "</option>";
        }
    }
}
$conn->close();
