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
                <li class="nav-item">
                    <a class="nav-link" href="project_report_page.php">Poject Report</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Detail Report</a>
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
            <div id="live_data"></div>
            
            <span id="result"></span>
        </div>
    </div>

    <!-- Latest compiled JavaScript and jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
</body>
</html>

<script>
$(document).ready(function() {
    // Fetching Data from Database (Live)
    function fetch_data() {
        $.ajax({
            url: "data_grid/select.php",
            method: "POST",
            success: function(data) {
				$('#live_data').html(data);
            }
        });
    }

    fetch_data();

    $(document).on('click', '#btn_add', function() {
        var activity_name = $('#activity_name').text();
        var project_name = $('#project_name').text();
        var projected_start_date = $('#projected_start_date').text();
        var projected_end_date = $('#projected_end_date').text();
        var actual_start_date = $('#actual_start_date').text();
        var actual_end_date = $('#actual_end_date').text();
        var projected_days = $('#projected_days').text();
        var actual_days = $('#actual_days').text();
        var accuracy = $('#accuracy').text();
        var score = $('#score').text();
        var stat = $('#stat').text();
        
        // Field Validation after button click
        if(activity_name == '') {
            alert("Enter a Activity");
            return false;
        }
        if(project_name == '') {
            alert("Enter Project Name");
            return false;
        }
        if(score == '') {
            alert("Enter Activity Score");
            return false;
        }


        // DATE VALIDATION Format( yyyy-mm-dd ) <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

        // var date_regex = /^ ((19|20)\d{2}) (\/|-) (0[1-9]|1[0-2]) (\/|-) (0[1-9]|1\d|2\d|3[01]) $/;

        var date_regex = /^((19|20)\d{2})(\/|-)(0[1-9]|1[0-2])(\/|-)(0[1-9]|1\d|2\d|3[01])$/;

        if(projected_start_date != '' && !(date_regex.test(projected_start_date))) {
            alert("Enter Date in yyyy-mm-dd format");
            return false;
        }
        if(projected_end_date != '' && !(date_regex.test(projected_end_date))) {
            alert("Enter Date in yyyy-mm-dd format");
            return false;
        }

        if(actual_start_date != '' && !(date_regex.test(actual_start_date))) {
            alert("Enter Date in yyyy-mm-dd format");
            return false;
        }
        if(actual_end_date != '' && !(date_regex.test(actual_end_date))) {
            alert("Enter Date in yyyy-mm-dd format");
            return false;
        }

        // <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

        // Insert data if all ok
        $.ajax({
            url: "data_grid/insert.php",
            method: "POST",
            data: {
                activity_name: activity_name,
                project_name: project_name,
                projected_start_date: projected_start_date,
                projected_end_date: projected_end_date,
                actual_start_date: actual_start_date,
                actual_end_date: actual_end_date,
                projected_days: projected_days,
                actual_days: actual_days,
                accuracy: accuracy,
                score: score,
                stat: stat
            },
            dataType: "text",
            success: function(data) {
                // alert(data);
                // $('#result').html("<div class='alert alert-success'><strong>"+data+"</strong></div>");
                
                $('#result').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button><strong>"+data+"</strong></div>");

                fetch_data();
            }
        });
    });
    
    // Edit existing data
	function edit_data(id, text, column_name) {
        $.ajax({
            url: "data_grid/edit.php",
            method: "POST",
            data: {
                id: id,
                text: text,
                column_name: column_name
            },
            dataType: "text",
            success: function(data) {
                // alert(data);
				// $('#result').html("<div class='alert alert-success'>"+data+"</div>");

                $('#result').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button><strong>"+data+"</strong></div>");

                fetch_data();
            }
        });
    }

    // On event actions for data grids
    $(document).on('blur', '.activity_name', function() {
        var id = $(this).data("id1");
        var activity_name = $(this).text();

        edit_data(id, activity_name, "activity_name");
    });
    
    $(document).on('blur', '.project_name', function() {
        var id = $(this).data("id2");
        var project_name = $(this).text();

        edit_data(id, project_name, "project_name");
    });

    $(document).on('blur', '.projected_start_date', function() {
        var id = $(this).data("id3");
        var projected_start_date = $(this).text();

        var date_regex = /^((19|20)\d{2})(\/|-)(0[1-9]|1[0-2])(\/|-)(0[1-9]|1\d|2\d|3[01])$/;
        if(projected_start_date != '' && !(date_regex.test(projected_start_date))) {
            alert("Enter Date in yyyy-mm-dd format");
            return false;
        }

        edit_data(id, projected_start_date, "projected_start_date");
    });


    $(document).on('blur', '.projected_end_date', function() {
        var id = $(this).data("id4");
        var projected_end_date = $(this).text();

        var date_regex = /^((19|20)\d{2})(\/|-)(0[1-9]|1[0-2])(\/|-)(0[1-9]|1\d|2\d|3[01])$/;
        if(projected_end_date != '' && !(date_regex.test(projected_end_date))) {
            alert("Enter Date in yyyy-mm-dd format");
            return false;
        }

        edit_data(id, projected_end_date, "projected_end_date");
    });

    $(document).on('blur', '.actual_start_date', function() {
        var id = $(this).data("id5");
        var actual_start_date = $(this).text();

        var date_regex = /^((19|20)\d{2})(\/|-)(0[1-9]|1[0-2])(\/|-)(0[1-9]|1\d|2\d|3[01])$/;
        if(actual_start_date != '' && !(date_regex.test(actual_start_date))) {
            alert("Enter Date in yyyy-mm-dd format");
            return false;
        }

        edit_data(id, actual_start_date, "actual_start_date");
    });

    $(document).on('blur', '.actual_end_date', function() {
        var id = $(this).data("id6");
        var actual_end_date = $(this).text();

        var date_regex = /^((19|20)\d{2})(\/|-)(0[1-9]|1[0-2])(\/|-)(0[1-9]|1\d|2\d|3[01])$/;
        if(actual_end_date != '' && !(date_regex.test(actual_end_date))) {
            alert("Enter Date in yyyy-mm-dd format");
            return false;
        }

        edit_data(id, actual_end_date, "actual_end_date");
    });

    // $(document).on('blur', '.projected_days', function() {
    //     var id = $(this).data("id7");
    //     var projected_days = $(this).text();

    //     edit_data(id, projected_days, "projected_days");
    // });
    // $(document).on('blur', '.actual_days', function() {
    //     var id = $(this).data("id8");
    //     var actual_days = $(this).text();

    //     edit_data(id, actual_days, "actual_days");
    // });
    // $(document).on('blur', '.accuracy', function() {
    //     var id = $(this).data("id9");
    //     var accuracy = $(this).text();

    //     edit_data(id, accuracy, "accuracy");
    // });
    $(document).on('blur', '.score', function() {
        var id = $(this).data("id10");
        var score = $(this).text();

        edit_data(id, score, "score");
    });
    // $(document).on('blur', '.stat', function() {
    //     var id = $(this).data("id11");
    //     var stat = $(this).text();

    //     edit_data(id, stat, "stat");
    // });

    // On event action for delete Button
    $(document).on('click', '.btn_delete', function() {
        var id = $(this).data("id12");

        if(confirm("Are you sure you want to delete this?")) {
            $.ajax({
                url : "data_grid/delete.php",
                method : "POST",
                data: {
                    id: id
                },
                dataType: "text",
                success: function(data) {
                    // alert(data);
                    // $('#result').html("<div class='alert alert-success'>"+data+"</div>");

                    $('#result').html("<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>×</button><strong>"+data+"</strong></div>");
                    
                    fetch_data();
                }
            });
        }
    });
});
</script>