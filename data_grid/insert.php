<?php

require('../conn.php');

$query = "SELECT * FROM detail_report";
$result = mysqli_query($conn, $query);
$rows = mysqli_num_rows($result);

$detail_report_id = mysqli_num_rows($result) + 1;
$activity = $_POST["activity"];
$project_name = $_POST["project_name"];
$projected_start_date = $_POST["projected_start_date"];
$projected_end_date = $_POST["projected_end_date"];
$actual_start_date = $_POST["actual_start_date"];
$actual_end_date = $_POST["actual_end_date"];
$projected_days = $_POST["projected_days"];
$actual_days = $_POST["actual_days"];
$accuracy = $_POST["accuracy"];
$score = $_POST["score"];
$stat = $_POST["stat"];

$query = "INSERT INTO detail_report(detail_report_id, activity, project_name, projected_start_date, projected_end_date, actual_start_date, actual_end_date, projected_days, actual_days, accuracy, score, stat)
VALUES('".$detail_report_id."', '".$activity."', '".$project_name."', '".$projected_start_date."', '".$projected_end_date."', '".$actual_start_date."', '".$actual_end_date."', '".$projected_days."', '".$actual_days."', '".$accuracy."', '".$score."', '".$stat."')";

if(mysqli_query($conn, $query)) {
    echo 'Data Inserted';
}

mysqli_close($conn);

?>