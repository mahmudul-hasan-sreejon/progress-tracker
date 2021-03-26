<script>

var chart_1 = Morris.Bar({
    element : "chart_1",
    data: [ <?php echo $chart_1_data; ?> ],
    xkey: ["project_name"],
    ykeys: ["projected_days", "actual_days"],
    labels: ["Projected Days", "Actual Days"],
    hideHover: "auto",
    stacked: false,
    resize: true,
    barColors: ["#1fbba6", "#f8aa33", "#4da74d", "#afd8f8", "#edc240", "#cb4b4b", "#9440ed"],
    barOpacity: 0.9,
    barGap: 0,
    barSizeRatio: 0.46,
    gridTextSize: 10,
    xLabelAngle: 30
});

chart_1.options.labels.forEach(function(label, i) {
    var legendItem = $("<span></span>").text(label).css("color", chart_1.options.barColors[i]);

    $("#legend_1").append(legendItem);
});

function fetch_data() {
    $.ajax({
        url: "resources/library/chart/select.php",
        method: "POST",
        success: function(data) {
            $("#live_data").html(data);
        }
    });
}

// On page reload
$(document).ready(function() {
    fetch_data();
});

function update(activity_name) {
    $.ajax({
        url: "resources/library/chart/update.php",
        method: "POST",
        data: {
            activity_name: activity_name
        },
        dataType: "text",
        success: function(data) {
            $("#live_data").html(data);
        }
    });
}

</script>
