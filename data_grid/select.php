<?php

require('../conn.php');

$query = "SELECT * FROM detail_report ORDER BY detail_report_id";
$result = mysqli_query($conn, $query);

// Main Table Head
$output = '';
$output .= '
    <div class="table-responsive text-center">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Activities</th>
                    <th>Projects</th>
                    <th>Projected Shart Date</th>
                    <th>Projected End Date</th>
                    <th>Actual Start Date</th>
                    <th>Actual End Date</th>
                    <th>Projected Days</th>
                    <th>Actual Days</th>
                    <th>Accuracy</th>
                    <th>Score</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>';

// Checking for data from the database
$rows = mysqli_num_rows($result);
if($rows > 0) { // If data found
    // if($rows > 10) {
    //     $delete_records = $rows - 10;
    //     $delete_sql = "DELETE FROM tbl_sample LIMIT $delete_records";
    //     mysqli_query($connect, $delete_sql);
    // }
    
    // Main Table Body
    $output .= '<tbody>';
    while($row = mysqli_fetch_array($result)) {
        // HTML contenteditable attribute used for editing the text field
        $output .= '
            <tr>
                <td>'.$row["detail_report_id"].'</td>
                <td class="activity" data-id1="'.$row["detail_report_id"].'" contenteditable>'.$row["activity"].'</td>
                <td class="project_name" data-id2="'.$row["detail_report_id"].'" contenteditable>'.$row["project_name"].'</td>

                <td class="projected_start_date" data-id3="'.$row["detail_report_id"].'" contenteditable>'.$row["projected_start_date"].'</td>
                <td class="projected_end_date" data-id4="'.$row["detail_report_id"].'" contenteditable>'.$row["projected_end_date"].'</td>

                <td class="actual_start_date" data-id5="'.$row["detail_report_id"].'" contenteditable>'.$row["actual_start_date"].'</td>
                <td class="actual_end_date" data-id6="'.$row["detail_report_id"].'" contenteditable>'.$row["actual_end_date"].'</td>

                <td class="projected_days" data-id7="'.$row["detail_report_id"].'" contenteditable>'.$row["projected_days"].'</td>
                <td class="actual_days" data-id8="'.$row["detail_report_id"].'" contenteditable>'.$row["actual_days"].'</td>
                
                <td class="accuracy" data-id9="'.$row["detail_report_id"].'" contenteditable>'.$row["accuracy"].'</td>

                <td class="score" data-id10="'.$row["detail_report_id"].'" contenteditable>'.$row["score"].'</td>

                <td class="stat" data-id11="'.$row["detail_report_id"].'" contenteditable>'.$row["stat"].'</td>
                
                <td><button type="button" name="delete_btn" data-id12="'.$row["detail_report_id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
            </tr>';
    }

    // Last row of the table
    $output .= '
        <tr>
            <td></td>
            <td id="activity" contenteditable></td>
            <td id="project_name" contenteditable></td>

            <td id="projected_start_date" contenteditable></td>
            <td id="projected_end_date" contenteditable></td>

            <td id="actual_start_date" contenteditable></td>
            <td id="actual_end_date" contenteditable></td>

            <td id="projected_days" contenteditable></td>
            <td id="actual_days" contenteditable></td>
            
            <td id="accuracy" contenteditable></td>
            <td id="score" contenteditable></td>
            <td id="stat" contenteditable></td>

            <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
        </tr>
    ';
}
else { // If not found
    $output .= '
            <tr>
                <td></td>
                <td id="activity" contenteditable></td>
                <td id="project_name" contenteditable></td>
    
                <td id="projected_start_date" contenteditable></td>
                <td id="projected_end_date" contenteditable></td>
    
                <td id="actual_start_date" contenteditable></td>
                <td id="actual_end_date" contenteditable></td>
    
                <td id="projected_days" contenteditable></td>
                <td id="actual_days" contenteditable></td>
                
                <td id="accuracy" contenteditable></td>
                <td id="score" contenteditable></td>
                <td id="stat" contenteditable></td>

                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
            </tr>';
}

$output .= '</tbody>
        </table>  
    </div>';

echo $output;

mysqli_close($conn);

?>