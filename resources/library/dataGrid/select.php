<?php

require('../../../conn.php');

$query = "SELECT * FROM project INNER JOIN activity ON project.project_id = activity.project_id";
$result = mysqli_query($conn, $query);

// Main Table Head
$output = '';
$output .= '
    <div class="table-responsive-sm text-center">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
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
    // Main Table Body
    $output .= '<tbody>';
    while($row = mysqli_fetch_array($result)) {
        // HTML contenteditable attribute used for editing the text field
        $output .= '
            <tr>
                <td>'.$row["activity_id"].'</td>
                <td class="activity_name" data-id1="'.$row["activity_id"].'" contenteditable>'.$row["activity_name"].'</td>
                <td class="project_name" data-id2="'.$row["activity_id"].'" contenteditable>'.$row["project_name"].'</td>

                <td class="projected_start_date" data-id3="'.$row["activity_id"].'" contenteditable>'.$row["projected_start_date"].'</td>
                <td class="projected_end_date" data-id4="'.$row["activity_id"].'" contenteditable>'.$row["projected_end_date"].'</td>

                <td class="actual_start_date" data-id5="'.$row["activity_id"].'" contenteditable>'.$row["actual_start_date"].'</td>
                <td class="actual_end_date" data-id6="'.$row["activity_id"].'" contenteditable>'.$row["actual_end_date"].'</td>

                <td class="projected_days" data-id7="'.$row["activity_id"].'" contenteditable=false>'.$row["projected_days"].'</td>
                <td class="actual_days" data-id8="'.$row["activity_id"].'" contenteditable=false>'.$row["actual_days"].'</td>
                
                <td class="accuracy" data-id9="'.$row["activity_id"].'" contenteditable=false>'.$row["accuracy"].'</td>
                <td class="score" data-id10="'.$row["activity_id"].'" contenteditable>'.$row["score"].'</td>
                <td class="stat" data-id11="'.$row["activity_id"].'" contenteditable=false>'.$row["stat"].'</td>
                
                <td><button type="button" name="delete_btn" data-id12="'.$row["activity_id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
            </tr>';
    }

    // Last row of the table
    $output .= '
        <tr>
            <td></td>
            <td id="activity_name" contenteditable></td>
            <td id="project_name" contenteditable></td>

            <td id="projected_start_date" contenteditable></td>
            <td id="projected_end_date" contenteditable></td>

            <td id="actual_start_date" contenteditable></td>
            <td id="actual_end_date" contenteditable></td>

            <td id="projected_days" contenteditable=false></td>
            <td id="actual_days" contenteditable=false></td>
            
            <td id="accuracy" contenteditable=false></td>
            <td id="score" contenteditable></td>
            <td id="stat" contenteditable=false></td>

            <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
        </tr>
    ';
}
else { // If not found
    $output .= '
            <tr>
                <td></td>
                <td id="activity_name" contenteditable></td>
                <td id="project_name" contenteditable></td>
    
                <td id="projected_start_date" contenteditable></td>
                <td id="projected_end_date" contenteditable></td>
    
                <td id="actual_start_date" contenteditable></td>
                <td id="actual_end_date" contenteditable></td>
    
                <td id="projected_days" contenteditable=false></td>
                <td id="actual_days" contenteditable=false></td>
                
                <td id="accuracy" contenteditable=false></td>
                <td id="score" contenteditable></td>
                <td id="stat" contenteditable=false></td>

                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>
            </tr>';
}

$output .= '</tbody>
        </table>  
    </div>';

echo $output;

mysqli_close($conn);

?>