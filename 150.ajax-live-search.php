<?php
 $search_value = $_POST['search'];

$conn = mysqli_connect("localhost","root","","ajax") or die('Connection Failed');

$limit_per_page = 5;

$page = '';
if (isset($_POST['page_no'])) {
    $page = $_POST['page_no'];
} else {
    $page = 1;
}

$offset = ($page - 1) * $limit_per_page;


$sql = "SELECT * FROM students WHERE first_name LIKE '%$search_value%' OR last_name LIKE '%$search_value%' LIMIT $offset,$limit_per_page";
$result = mysqli_query($conn,$sql) or die('SQL Query Failed');
$output = '';
if(mysqli_num_rows($result) > 0){
    $output = '<table border="1" width ="100%" cellspacing="0" cellpadding="10px">
        <tr>
            <th width="100px">Id</th>
            <th>Name</th>
            <th colspan="2">Action</th>
        </tr>';
        while($row = mysqli_fetch_assoc($result)){
            $output .= '<tr>
                <td>'.$row["id"].'</td>
                <td>'.$row["first_name"].' '. $row["last_name"]. '</td>
                <td  width="100px" align="center"><button class="edit-btn" data-eid="'. $row["id"] . '">Edit</button></td>
                <td  width="100px" align="center"><button class="delete-btn" data-id="'.$row["id"]. '">Delete</button></td>
                
            </tr>';
        }
        $output .= '</table>';
    $sql_total = "SELECT * FROM students WHERE first_name LIKE '%$search_value%' OR last_name LIKE '%$search_value%'";
    $records = mysqli_query($conn, $sql_total) or die('Query failed');

    $total_record = mysqli_num_rows($records);
    $total_page = ceil($total_record / $limit_per_page);

    $output .= '<div id="pagination">';

    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $page) {
            $class_name = 'active';
        } else {
            $class_name = '';
        }
        $output .= '
                <a href="" class="' . $class_name . '" id=' . $i . '>' . $i . '</a>';
    }
    $output .= '</div>';
        mysqli_close($conn);
        echo $output;
}else{
    echo '<h2>No record found</h2>';
}