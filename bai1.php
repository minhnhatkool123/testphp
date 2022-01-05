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



if (isset($_POST["makh"])) {
  $makh = $_POST["makh"];
  //   $makh= $_POST["makh"];
  $tenkh = $_POST['tenkh'];
  $diachi = $_POST['diachi'];
  $dienthoai = $_POST['dienthoai'];
  $makh = (int)$makh;
  $sql = "INSERT INTO KHACHHANG VALUES ($makh,'$tenkh', '$diachi', '$dienthoai')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}




// if ($result->num_rows > 0) {
//   // output data of each row
//   while ($row = $result->fetch_assoc()) {
//     echo $row["makh"];
//   }
// } else {
//   echo "0 results";
// }
$conn->close();
