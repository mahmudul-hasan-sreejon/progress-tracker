<?php

$connect = mysqli_connect("localhost", "root", "1", "testing");

$id = $_POST["id"];

$query = "DELETE FROM tbl_sample WHERE id = '".$id."'";
if(mysqli_query($connect, $query)) {
	echo 'Data Deleted';
}

?>