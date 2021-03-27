<?php
require_once("../../config.php");

$conn = mysqli_connect($config["db"]["mysql"]["host"], $config["db"]["mysql"]["username"], $config["db"]["mysql"]["password"], $config["db"]["mysql"]["dbname"]) or die(mysqli_connect_error());

$activity_name = $_POST["activity_name"];

$query = "SELECT projected_days, actual_days FROM activity WHERE activity_name = '$activity_name'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_array($result);

$projected_days = $row["projected_days"];
$actual_days = $row["actual_days"];

$chart_2_data = "
    { 
        activity_name:'".$activity_name."',
        projected_days:".$projected_days.",
        actual_days:".$actual_days."
    }
";

mysqli_close($conn);

$output = '
    <div id="legend_2"></div>
    <div id="chart_2"></div>
';

echo $output;
?>

<script>
const chart_2 = Morris.Bar({
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
    const legendItem = $('<span></span>').text(label).css('color', chart_2.options.barColors[i]);

    $('#legend_2').append(legendItem);
});
</script>
