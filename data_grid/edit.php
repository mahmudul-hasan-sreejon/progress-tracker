<?php

require('../conn.php');

$id = $_POST["id"];
$text = $_POST["text"];
$column_name = $_POST["column_name"];


// Day difference counter function
function day_calc($start_date, $end_date) {
	if($start_date != "0000-00-00" and $end_date != "0000-00-00") {
		$dateOne = DateTime::createFromFormat('Y-m-d', (string) $end_date);
		$dateTwo = DateTime::createFromFormat('Y-m-d', (string) $start_date);

		$interval = $dateOne->diff($dateTwo);
		return ($interval->d + 1);
	}
    return 0;
}


if($column_name == "project_name") {
	$query = "SELECT project_id FROM activity WHERE activity_id = '$id'";
	$result = mysqli_query($conn, $query);

	$row = mysqli_fetch_array($result);
	$project_id = $row["project_id"];

	$query = "UPDATE project SET project_name = '$text' WHERE project_id = '$project_id'";

	// echo '<br>('.$column_name.', '.$text.', '.')<br>';
}
else {
	mysqli_query($conn, "UPDATE activity SET $column_name = '$text' WHERE activity_id = '$id'");

	$query = mysqli_query($conn, "SELECT * FROM activity WHERE activity_id = '$id'");
	$result = mysqli_fetch_object($query);

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

	$query = "UPDATE activity SET $column_name = '$text', projected_days = '$projected_days', actual_days = '$actual_days', accuracy = '$accuracy', stat = '$stat' WHERE activity_id = '$id'";
}

if(mysqli_query($conn, $query)) {
	echo 'Data Updated';
}

mysqli_close($conn);

?>