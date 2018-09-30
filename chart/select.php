<?php

require('../conn.php');

$query = "SELECT project_id FROM project";
$result = mysqli_query($conn, $query);

$chart_2_data = "";
while($row = mysqli_fetch_array($result)) {
    $project_id = $row["project_id"];

    // Fetching all activity_name, projected_days, actual_days values of same project
    $query2 = "SELECT activity_name, projected_days, actual_days FROM activity WHERE project_id='$project_id'";
    $result2 = mysqli_query($conn, $query2);
    while($row2 = mysqli_fetch_array($result2)) {
        $activity_name = $row2["activity_name"];
        $projected_days = $row2["projected_days"];
        $actual_days = $row2["actual_days"];

        $chart_2_data .= "{ 
            activity_name:'".$activity_name."',
            projected_days:".$projected_days.",
            actual_days:".$actual_days."
        }, ";
    }
}

$chart_2_data = substr($chart_2_data, 0, -2);

mysqli_close($conn);

$output = '
    <center><div id="legend_2"></div></center>
    <div id="chart_2"></div>';

echo $output;

?>

<script>
var chart_2 = Morris.Bar({
    element : 'chart_2',
    data: [<?php echo $chart_2_data; ?>],
    xkey: ['activity_name'],
    ykeys: ['projected_days', 'actual_days'],
    labels: ['Projected Days', 'Actual Days'],
    hideHover: 'auto',
    stacked: false,
    resize: true,
    barColors: ['#edc240', '#cb4b4b', '#9440ed', '#1fbba6', '#f8aa33', '#4da74d', '#afd8f8'],
    barOpacity: 0.9,
    barGap: 0,
    barSizeRatio: 0.46,
    gridTextSize: 10,
    xLabelAngle: 30
});

chart_2.options.labels.forEach(function(label, i) {
    var legendItem = $('<span></span>').text(label).css('color', chart_2.options.barColors[i]);

    $('#legend_2').append(legendItem);
});
</script>