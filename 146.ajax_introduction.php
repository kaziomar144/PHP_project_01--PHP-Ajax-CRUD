<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX INTRODUCTION</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header" align="center">
                <h2>PHP with Ajax</h2>
            </td>
        </tr>
        <tr>
            <td id="table-load" align="center">
                <input type="button" value="Load Data" id="load-button">
            </td>
        </tr>
        <tr>
            <td id="table-data">
                <!-- <table border="1" width="100%" cellspacing="0" cellpadding="10px">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                    </tr>
                    <tr>
                        <td align="center">1</td>
                        <td>Tahsan Tanjim</td>
                    </tr>
                </table> -->
            </td>
        </tr>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#load-button').on('click',function(e){
                $.ajax({
                    url:"ajax-load.php",
                    type:"POST",
                    success: function(data){
                        $('#table-data').html(data);
                    }
                })
            })
        })
    </script>

</body>

</html>