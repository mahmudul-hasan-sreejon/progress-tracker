<?php

require('../conn.php');

$id = $_POST["id"];
$text = $_POST["text"];
$column_name = $_POST["column_name"];

mysqli_query($conn, "UPDATE detail_report SET $column_name = '$text' WHERE detail_report_id = '$id'");

$query = mysqli_query($conn, "SELECT * FROM detail_report WHERE detail_report_id = '$id'");
$result = mysqli_fetch_object($query);

function day_calc($start_date, $end_date) {
	if($start_date != "0000-00-00" and $end_date != "0000-00-00") {
		$dateOne = DateTime::createFromFormat('Y-m-d', (string) $end_date);
		$dateTwo = DateTime::createFromFormat('Y-m-d', (string) $start_date);

		$interval = $dateOne->diff($dateTwo);
		return ($interval->d + 1);
	}
    return 0;
}

// Check and update data
if($column_name == "projected_start_date" and $result->projected_end_date != "0000-00-00") {
	$start_date = $result->projected_start_date;
	$end_date = $result->projected_end_date;
	$projected_days = day_calc($start_date, $end_date);
}
elseif($column_name == "projected_end_date" and $result->projected_start_date != "0000-00-00") {
	$start_date = $result->projected_start_date;
	$end_date = $result->projected_end_date;
	$projected_days = day_calc($start_date, $end_date );
}
else {
	$projected_days = $result->projected_days;
}

if($column_name == "actual_start_date" and $result->actual_end_date != "0000-00-00") {
	$start_date = $result->actual_start_date;
	$end_date = $result->actual_end_date;
	$actual_days = day_calc($start_date, $end_date);
}
elseif($column_name == "actual_end_date" and $result->actual_start_date != "0000-00-00") {
	$start_date = $result->actual_start_date;
	$end_date = $result->actual_end_date;
	$actual_days = day_calc($start_date, $end_date );
}
else {
	$actual_days = $result->actual_days;
}

if($projected_days > 0 and $actual_days > 0) {
	if($projected_days >= $actual_days) {
		$accuracy = "Ontime";
	}
	elseif($projected_days < $actual_days) {
		$accuracy = "Delayed";
	}
	else {
		$accuracy = "Pending";
	}
}
else {
	$accuracy = "Pending";
}

if($accuracy == "Pending") {
	$stat = "N";
}
else {
	$stat = "Y";
}

$query = "UPDATE detail_report SET $column_name = '$text', projected_days = '$projected_days', actual_days = '$actual_days', accuracy = '$accuracy', stat = '$stat' WHERE detail_report_id = '$id'";

if(mysqli_query($conn, $query)) {
	echo 'Data Updated';
}

mysqli_close($conn);

?>