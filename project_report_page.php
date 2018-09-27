<!DOCTYPE html>
<html>
<head>
    <title>Test Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Test Project</a>
            </div>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Chart</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Poject Report</a>
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

    <div class="container-fluid">
        <div class="table-responsive-sm text-center">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Projects</th>
                        <th>Total Score</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    require('conn.php');

                    $query = "SELECT * FROM project";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result)) {
                        $project_id = $row["project_id"];

                        echo '
                        <tr>
                            <td>'.$row["project_name"].'</td>';
                        
                        // Calculating the sum of all the score of same project
                        $query2 = "SELECT SUM(score) FROM activity WHERE project_id='$project_id'";
                        $result2 = mysqli_query($conn, $query2);
                        $row2 = mysqli_fetch_array($result2);
                        $total_score = $row2["SUM(score)"];

                        echo '    
                            <td>'.$total_score.'</td>
                        </tr>';
                    }

                    mysqli_close($conn);
                    ?>

                    <tr>
                        <td><b>Grand Total</b></td>
                        <td>
                            <?php
                            require('conn.php');

                            $query = "SELECT score FROM activity";
                            $result = mysqli_query($conn, $query);

                            $total_score = 0;
                            while($row = mysqli_fetch_array($result)) {
                                $total_score += $row["score"];
                            }
                            echo '<b>'.$total_score.'</b>';

                            mysqli_close($conn);
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Latest compiled JavaScript and jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
</body>
</html>

<script>
</script>