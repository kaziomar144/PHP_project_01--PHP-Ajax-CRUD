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
            <td id="header">
                <h1>PHP & Ajax CRUD</h1>

                <div id="search-bar">
                    <label for="">Search: </label>
                    <input type="text" id="search" autocomplete="off">
                </div>
            </td>
        </tr>
        <tr>
            <td id="table-form">
                <form id="addForm">
                    First Name : <input type="text" id="fname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Last Name : <input type="text" id="lname">
                    <input type="submit" value="Save" id="save-button">
                </form>
            </td>
        </tr>
        <!-- <tr>
            <td id="table-load" align="center">
                <input type="button" value="Load Data" id="load-button">
            </td>
        </tr> -->
        <tr>
            <td id="table-data">
                <!-- <table border="1" width="100%" cellspacing="0" cellpadding="10px">
                    <tr>
                        <th width="100px">Id</th>
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
    <div id="error-message"></div>
    <div id="success-message"></div>

    <div id="modal">
        <div id="modal-form">
            <h2>Edit Form</h2>
            <table cellpadding="10px" width="100%">

            </table>
            <div id="close-btn">X</div>
        </div>
        <div id="uerror-message"></div>
    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>
</body>

</html>