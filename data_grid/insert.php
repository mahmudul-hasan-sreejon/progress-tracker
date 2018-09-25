<?php

require('../conn.php');

$activity = $_POST["activity"];
$project_name = $_POST["project_name"];
$projected_start_date = $_POST["projected_start_date"];
$projected_end_date = $_POST["projected_end_date"];
$actual_start_date = $_POST["actual_start_date"];
$actual_end_date = $_POST["actual_end_date"];

// echo '<br>( '.$projected_start_date.', '.$projected_end_date.' )<br>';

if($projected_start_date != "" and $projected_end_date != "") {
    $dateOne = DateTime::createFromFormat('Y-m-d', $projected_end_date);
    $dateTwo = DateTime::createFromFormat('Y-m-d', $projected_start_date);

    $interval = $dateOne->diff($dateTwo);
    $projected_days = $interval->d + 1;
}
else {
    $projected_days = $_POST["projected_days"];
}

if($actual_start_date != "" and $actual_end_date != "") {
    $dateOne = DateTime::createFromFormat('Y-m-d', $actual_end_date);
    $dateTwo = DateTime::createFromFormat('Y-m-d', $actual_start_date);

    $interval = $dateOne->diff($dateTwo);
    $actual_days = $interval->d + 1;
}
else {
    $actual_days = $_POST["actual_days"];
}

// Accuracy checking
if($projected_days >= $actual_days) {
    $accuracy = "Ontime";
}
elseif($projected_days < $actual_days) {
    $accuracy = "Delayed";
}
else {
    $accuracy = "Pending";
}

$score = $_POST["score"];

// Status checking
if($accuracy == "Pending") {
    $stat = "N";
}
else {
    $stat = "Y";
}


$query = "INSERT INTO detail_report(activity, project_name, projected_start_date, projected_end_date, actual_start_date, actual_end_date, projected_days, actual_days, accuracy, score, stat)
VALUES('".$activity."', '".$project_name."', '".$projected_start_date."', '".$projected_end_date."', '".$actual_start_date."', '".$actual_end_date."', '".$projected_days."', '".$actual_days."', '".$accuracy."', '".$score."', '".$stat."')";

if(mysqli_query($conn, $query)) {
    echo 'Data Inserted';
}

mysqli_close($conn);

?>