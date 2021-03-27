<?php
require_once("../../config.php");

$conn = mysqli_connect($config["db"]["mysql"]["host"], $config["db"]["mysql"]["username"], $config["db"]["mysql"]["password"], $config["db"]["mysql"]["dbname"]) or die(mysqli_connect_error());

$id = $_POST["id"];

$query = "DELETE FROM activity WHERE activity_id = '$id'";

if(mysqli_query($conn, $query)) {
	echo 'Data Deleted';
}

mysqli_close($conn);
?>
