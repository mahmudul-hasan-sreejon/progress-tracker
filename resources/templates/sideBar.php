            <!-- Sidebars -->
            <div class="col-sm-3">
                <!-- Counts activities under a project -->
                <div class="row-sm-2">
                    <ul class="list-group">
                        <?php

                        $conn = mysqli_connect($config["db"]["mysql"]["host"], $config["db"]["mysql"]["username"], $config["db"]["mysql"]["password"], $config["db"]["mysql"]["dbname"]) or die(mysqli_connect_error());

                        $query = "SELECT * FROM project";
                        $result = mysqli_query($conn, $query);
        
                        while($row = mysqli_fetch_array($result)) {
                            $project_id = $row["project_id"];
                            $query2 = "SELECT COUNT(*) FROM activity WHERE project_id = '$project_id'";
                            $result2 = mysqli_query($conn, $query2);
                            $row2 = mysqli_fetch_array($result2);
                            $counter = $row2["COUNT(*)"];

                            echo "
                                <li class='list-group-item d-flex justify-content-between align-items-center'>
                                    ".$row["project_name"]."
                                    <span class='badge badge-primary badge-pill'>".$counter."</span>
                                </li>";
                        }

                        mysqli_close($conn);

                        ?>
                    </ul>
                </div>

                <div class="row-sm-2" style="margin: 50px 0 50px 0;"></div>

                <!-- Activity list -->
                <div class="row-sm-2">
                    <div class="list-group" id="activity_list" role="tablist">
                        <?php

                        $conn = mysqli_connect($config["db"]["mysql"]["host"], $config["db"]["mysql"]["username"], $config["db"]["mysql"]["password"], $config["db"]["mysql"]["dbname"]) or die(mysqli_connect_error());

                        $query = "SELECT activity_name FROM activity";
                        $result = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result)) {
                            echo "
                                <a class='list-group-item list-group-item-action' data-toggle='list' role='tab' name='".$row["activity_name"]."' onclick='update(this.name)'>".$row["activity_name"]."</a>";
                        }

                        mysqli_close($conn);

                        ?>
                    </div>
                </div>
            </div>