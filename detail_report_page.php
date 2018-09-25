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

    <div class="table-responsive text-center">
        <div id="live_data"></div>
        
        <span id="result"></span>
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

    // Field Validation after button click
    $(document).on('click', '#btn_add', function() {
        var first_name = $('#first_name').text();
        var last_name = $('#last_name').text();
        if(first_name == '') {  
            alert("Enter First Name");
            return false;
        }
        if(last_name == '') {  
            alert("Enter Last Name");
            return false;
        }

        // Insert data if all ok
        $.ajax({
            url: "data_grid/insert.php",
            method: "POST",
            data: {
                first_name: first_name,
                last_name: last_name
            },
            dataType: "text",
            success: function(data) {
                // alert(data);
                $('#result').html("<div class='alert alert-success'>"+data+"</div>");

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
				$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }
        });
    }

    // On event for first name column
    $(document).on('blur', '.first_name', function() {
        // id1 data attribute of the current data
        var id = $(this).data("id1");
        var first_name = $(this).text();

        edit_data(id, first_name, "first_name");
    });

    // On event for last name column
    $(document).on('blur', '.last_name', function() {
        // id2 data attribute of the current data
        var id = $(this).data("id2");
        var last_name = $(this).text();

        edit_data(id, last_name, "last_name");
    });

    // On event for delete Button
    $(document).on('click', '.btn_delete', function() {
        // id3 data attribute of the current data
        var id = $(this).data("id3");

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
                    $('#result').html("<div class='alert alert-success'>"+data+"</div>");
                    
                    fetch_data();
                }
            });
        }
    });
});
</script>