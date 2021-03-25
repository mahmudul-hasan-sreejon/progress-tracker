<?php

require('../../../conn.php');

$id = $_POST["id"];

$query = "DELETE FROM activity WHERE activity_id = '$id'";

if(mysqli_query($conn, $query)) {
	echo 'Data Deleted';
}

mysqli_close($conn);

?>