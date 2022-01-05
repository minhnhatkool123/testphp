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
	Them thong tin xe khach hang 1
	<form action="./xulibai2.php" method="POST">

		<select name="hotenkhbai2" id="hotenkhbai2">
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


			$sql = "SELECT * FROM `KHACHHANG` WHERE 1";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {

				while ($row = $result->fetch_assoc()) {
					echo "<option value='$row[hotenkh]'>" . $row["hotenkh"] . "</option>";
				}
			}


			$conn->close();
			?>
		</select>

		so xe
		<input type="text" name="soxe" id="soxe" />

		<select name="cars" id="cars">
			<option value="toyota">Toyota</option>
			<option value="bwm">Bwm</option>
			<option value="audi">Audi</option>
		</select>

		nam sx
		<input type="text" name="namsx" id="namsx" />         


		<input type="submit" value="Them" name="ThemBai2" id="ThemBai2" />


	</form>

	<script>
		$(document).ready(function() {
			let valueSelectName = '';
			let valueSelectHangXe = ''
			$('#hotenkhbai2').change(function(e) {

				e.preventDefault();
				valueSelectName = $(this).children(":selected").attr("value");
				console.log(valueSelectName);

			});

			$('#cars').on('change', function(e) {

				e.preventDefault();
				valueSelectHangXe = $('#cars').val()

			});


			$('#ThemBai2').on('click', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: 'http://localhost:5505/xulibai2.php',
					dataType: 'text',
					data: {
						tenkh: valueSelectName,
						soxe: $('#soxe').val(),
						hangxe: valueSelectHangXe,
						namsx: $('#namsx').val(),
					},
					success: function(response) {
						$('#result').html(response);
					},
				});

			});
		});
	</script>


</body>

</html>