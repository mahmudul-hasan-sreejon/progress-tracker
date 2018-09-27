<!DOCTYPE html>
<html>
<head>
    <title>Test Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Morris Chart Style -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Test Project</a>
            </div>

            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Chart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="project_report_page.php">Poject Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="detail_report_page.php">Detail Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_page.php">List</a>
                </li>
            </ul>
        </div>
    </nav>

    <br><br>

    <!-- Main Page contents here <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< -->

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebars -->
            <div class="col-sm-2">
                <!-- Counts activities under a project -->
                <div class="row-sm-2">
                    <ul class="list-group">
                        <?php
                        require('conn.php');

                        $query = "SELECT * FROM project";
                        $result = mysqli_query($conn, $query);
        
                        $chart_1_data = "";
                        while($row = mysqli_fetch_array($result)) {
                            $project_name = $row["project_name"];
                            $project_id = $row["project_id"];
                        }

                        ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Project 1
                            <span class="badge badge-primary badge-pill">3</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Project 2
                            <span class="badge badge-primary badge-pill">2</span>
                        </li>
                    </ul>
                </div>

                <div class="row-sm-2"><p>blank space</p></div>

                <!-- Activity list -->
                <div class="row-sm-2">
                    <ul>
                        <li>Activity # 1</li>
                        <li>Activity # 2</li>
                    </ul>
                </div>
            </div>

            <!-- Chart 1 -->
            <div class="col-sm-5">
                <?php
                
                require('conn.php');

                $query = "SELECT * FROM project";
                $result = mysqli_query($conn, $query);

                $chart_1_data = "";
                while($row = mysqli_fetch_array($result)) {
                    $project_name = $row["project_name"];
                    $project_id = $row["project_id"];

                    // Calculating the sum of all the projected_days of same project
                    $query2 = "SELECT SUM(projected_days) FROM activity WHERE project_id='$project_id'";
                    $result2 = mysqli_query($conn, $query2);
                    $row2 = mysqli_fetch_array($result2);
                    $projected_days = $row2["SUM(projected_days)"];

                    // Calculating the sum of all the actual_days of same project
                    $query2 = "SELECT SUM(actual_days) FROM activity WHERE project_id='$project_id'";
                    $result2 = mysqli_query($conn, $query2);
                    $row2 = mysqli_fetch_array($result2);
                    $actual_days = $row2["SUM(actual_days)"];

                    $chart_1_data .= "{ 
                        project_name:'".$project_name."',
                        projected_days:".$projected_days.",
                        actual_days:".$actual_days."
                    }, ";
                }

                $chart_1_data = substr($chart_1_data, 0, -2);

                // echo $chart_1_data;

                mysqli_close($conn);

                ?>

                <h3>Chart 1</h3>
                <div id="chart_1"></div>
            </div>

            <!-- Chart 2 -->
            <div class="col-sm-5">
                <?php
                
                require('conn.php');

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

                // echo $chart_2_data;

                mysqli_close($conn);
                
                ?>
                
                <h3>Chart 2</h3>
                <div id="chart_2"></div>
            </div>
        </div>
    </div>

    <!-- Main Page content ends here <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< -->

    <!-- Latest compiled JavaScript and jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Morris chart Lib -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</body>
</html>

<script>
Morris.Bar({
    element : 'chart_1',
    data: [<?php echo $chart_1_data; ?>],
    xkey: ['project_name'],
    ykeys: ['projected_days', 'actual_days'],
    labels: ['Projected Days', 'Actual Days'],
    hideHover: 'auto',
    stacked: false,
    resize: true,
    barColors: ['#1fbba6', '#f8aa33', '#4da74d', '#afd8f8', '#edc240', '#cb4b4b', '#9440ed'],
    barOpacity: 0.9
});

Morris.Bar({
    element : 'chart_2',
    data: [<?php echo $chart_2_data; ?>],
    xkey: ['activity_name'],
    ykeys: ['projected_days', 'actual_days'],
    labels: ['Projected Days', 'Actual Days'],
    hideHover: 'auto',
    stacked: false,
    resize: true,
    barColors: ['#edc240', '#cb4b4b', '#9440ed', '#1fbba6', '#f8aa33', '#4da74d', '#afd8f8'],
    barOpacity: 0.9
});
</script>