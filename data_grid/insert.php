<?php

$connect = mysqli_connect("localhost", "root", "1", "testing");

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];

$sql = "INSERT INTO tbl_sample(first_name, last_name) VALUES('".$first_name."', '".$last_name."')";

if(mysqli_query($connect, $sql)) {
    echo 'Data Inserted';
}

?>