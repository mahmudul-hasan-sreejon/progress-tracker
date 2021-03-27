            <!-- Chart 1 -->
            <div class="col-sm-4 chart-1">
                <?php
                $conn = mysqli_connect($config["db"]["mysql"]["host"], $config["db"]["mysql"]["username"], $config["db"]["mysql"]["password"], $config["db"]["mysql"]["dbname"]) or die(mysqli_connect_error());

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

                mysqli_close($conn);
                ?>

                <h3>Project Analysis</h3>

                <div id="legend_1"></div>
                <div id="chart_1"></div>
            </div>
