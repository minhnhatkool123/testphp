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
    Thanh toan
    <form action="" method="POST">

        <input type="date" id="birthday" name="birthday">

        <select name="tenxeselect" id="tenxeselect">
        </select>

        so xe
        <input type="text" name="soxe" id="soxe" />

        nam sx
        <input type="text" name="namsx" id="namsx" />      

        thanh tien
        <input type="text" name="thanhtien" id="thanhtien" readonly />   


        <input type="submit" value="Them" name="ThemBai4" id="ThemBai4" />

    </form>


    <div id="resData"></div>
    <div id="resTotal"></div>

    <div>

    </div>



    <script>
        $(document).ready(function() {
            let valueSelectName = ''


            function getData(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost:5505/xulibai42.php',
                    dataType: 'text',
                    data: {
                        dateTime: valueSelectName
                    },
                    success: function(response) {
                        $('#resData').html(response);
                    },
                });
            }

            $('#ThemBai4').on('click', function(e) {
                e.preventDefault();

                let sum = 0;

                $('td[class*="price"]').each(function() {
                    sum += Number($(this).text()) || 0;
                });

                $('#thanhtien').val(sum.toString());

                $.ajax({
                    type: "POST",
                    url: "http://localhost:5505/xulibai43.php",
                    data: {
                        thanhtien: $('#thanhtien').val(),
                        soxe: $('#soxe').val(),
                        ngaynhan: valueSelectName

                    },
                    success: function(response) {}
                });
            })

            $("#newTable").on('click', '.btnSelect', function(e) {
                //let dataId = $(this).attr("data-id");
                //console.log(dataId);
                e.preventDefault();
                alert('helllo');


                // $.ajax({
                //     type: "POST",
                //     url: "http://localhost:5505/xulibai42.php",
                //     data: {
                //         dataId: dataId
                //     },
                //     success: function(response) {
                //         getData(e);
                //     }
                // });
            });


            $("#birthday").on("change", function(e) {
                let oldDate = $(this).val();
                let date = new Date(oldDate)
                let day = date.getDate();
                let month = date.getMonth() + 1;
                let year = date.getFullYear();
                valueSelectName = [day, month, year].join('/')
                //alert(valueSelectName);
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost:5505/xulibai41.php',
                    dataType: 'text',
                    data: {
                        dateTime: valueSelectName
                    },
                    success: function(response) {
                        $('#tenxeselect').html(response);
                    },
                });



                getData(e)
                // $.ajax({
                //     type: 'POST',
                //     url: 'http://localhost:5505/xulibai42.php',
                //     dataType: 'text',
                //     data: {
                //         dateTime: valueSelectName
                //     },
                //     success: function(response) {
                //         $('#resData').html(response);
                //     },
                // });
            });

            // $('#resData').change(function(e) {
            //     getData(e);
            //     e.preventDefault();
            // });



        });
    </script>
</body>

</html>