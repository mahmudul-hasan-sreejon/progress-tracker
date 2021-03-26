            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Projects</th>
                        <th>Total Score</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    $conn = mysqli_connect($config["db"]["mysql"]["host"], $config["db"]["mysql"]["username"], $config["db"]["mysql"]["password"], $config["db"]["mysql"]["dbname"]) or die(mysqli_connect_error());

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

                            $conn = mysqli_connect($config["db"]["mysql"]["host"], $config["db"]["mysql"]["username"], $config["db"]["mysql"]["password"], $config["db"]["mysql"]["dbname"]) or die(mysqli_connect_error());

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
