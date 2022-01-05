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

    $html = '
               <table class="table" id="newTable">         
        <tr>			                
            <th>TEN CONG VIEC</th>				                
            <th>GIA</th>				                
            <th>Chức Năng</th>				            
        </tr>
        ';

    $sql = "SELECT mabd,noidung,thanhtien FROM `baoduong` WHERE ngaynhan='$dateTime'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            // echo "<option value='$row[hotenkh]'>" . $row["hotenkh"] . "</option>";
            $html .= '<tr>
            <td>'  . $row['noidung'] . '</td>
                        <td  class="price' . $row['mabd'] . '">' . $row['thanhtien'] . '</td>
            <td><button data-id="' . $row['mabd'] . '" class="Xoa" id="XOA' . $row['mabd'] . '">' . $row['mabd'] . '</button></td>
                        </tr>
            ';
        }
    }
    $html .= '</table>';
    echo $html;

    if (isset($_POST['dataId'])) {
        $dataId = $_POST['dataId'];
        $dataId = (int)$dataId;

        $sql = "delete FROM `baoduong` WHERE mabd=$dataId";
        $result = $conn->query($sql);
    }
}


$conn->close();
