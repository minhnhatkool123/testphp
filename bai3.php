<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <form action="/xulibai42.php" method="POST">
        so xe
        <input type="text" name="soxe" id="soxe" />

        ho ten khach hang
        <input type="text" name="hotenkh" id="hotenkh" />


        ma bao duong
        <input type="text" name="mabd" id="mabd" />   

        so km
        <input type="text" name="sokm" id="sokm" />         

        noi dung
        <input type="text" name="noidung" id="noidung" />   

        <input type="submit" value="Them" name="ThemBai3" id="ThemBai3" />


    </form>

    <script>
        $(document).ready(function() {
            $("#soxe").on("input", function() {
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost:5505/xulibai31.php',
                    dataType: 'text',
                    data: {
                        soxe: $(this).val()
                    },
                    success: function(response) {
                        $('#hotenkh').val(response);
                    },
                });

            });

            $('#ThemBai3').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost:5505/xulibai32.php',
                    dataType: 'text',
                    data: {
                        soxe: $('#soxe').val(),
                        tenkh: $('#hotenkh').val(),
                        mabd: $('#mabd').val(),
                        sokm: $('#sokm').val(),
                        noidung: $('#noidung').val(),
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