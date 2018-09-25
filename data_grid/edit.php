<?php

require('../conn.php');

$id = $_POST["id"];
$text = $_POST["text"];
$column_name = $_POST["column_name"];

$query = "UPDATE detail_report SET $column_name = '$text' WHERE detail_report_id = '$id'";

if(mysqli_query($conn, $query)) {
	echo 'Data Updated';
}

mysqli_close($conn);

?>