<?php

$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$conn = mysqli_connect("localhost", "root", "", "ajax") or die('Connection Failed');

$sql = "INSERT INTO students(first_name, last_name) VALUES ('{$first_name}','{$last_name}')";
if ($result = mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}
