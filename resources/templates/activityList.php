            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Activities</th>
                        <th>Project Name</th>
                        <th>Score</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $conn = mysqli_connect($config["db"]["mysql"]["host"], $config["db"]["mysql"]["username"], $config["db"]["mysql"]["password"], $config["db"]["mysql"]["dbname"]) or die(mysqli_connect_error());

                    $query = "SELECT project.project_name, activity.activity_name, activity.score FROM project INNER JOIN activity ON project.project_id = activity.project_id ORDER BY project.project_name ASC";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result)) {
                        echo '
                            <tr>
                                <td>'.$row["activity_name"].'</td>
                                <td>'.$row["project_name"].'</td>
                                <td>'.$row["score"].'</td>
                            </tr>
                        ';
                    }

                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
