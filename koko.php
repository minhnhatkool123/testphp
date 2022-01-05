<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <form action="koko.php" method="POST">
         Ma khach hang
        <input type="text" placeholder="MS_001" name="makh" id="makh" />
         ho ten khach hang
        <input type="text" name="tenkh" id="tenkh" />
        diachi <input type="text" name="diachi" id="diachi" />
        dienthoai
        <input type="text" name="dt" id="dt" />         
        <input type="submit" value="Them" name="Them" id="Them" />
    </form>
     
    <div id="result"></div>

    <script>
        $(document).ready(function() {
            $('#Them').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost:5503/koko.php',
                    dataType: 'text',
                    data: {
                        makh: $('#makh').val(),
                        tenkh: $('#tenkh').val(),
                        diachi: $('#diachi').val(),
                        dienthoai: $('#dt').val(),
                    },
                    success: function(response) {
                        $('#result').html(response);
                    },
                });
            });
        });
    </script>

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



    $sql = "INSERT INTO KHACHHANG VALUES (19,'John', 'Doe', 'john@example.com')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    ?>

</body>

</html>