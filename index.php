<!DOCTYPE html>
<html>
<head>
    <title>Test Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- User defined stylesheet -->
    <link rel="stylesheet" href="style/style.css">
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

    <!-- CODE HERE -->

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebars -->
            <div class="sidenav">
                <!-- 1st Sidebar -->
                <div class="lable"><h5>Projects</h5></label></div>
                <div class="col">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                    </div>
                </div>

                <!-- 2nd Sidebar -->
                <div class="lable"><h5>Activities</h5></label></div>
                <div class="col">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages asdadasd asd</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                    </div>
                </div>

            </div>

            <!-- Charts -->
            <div class="main row">
                <!-- Chart 1 -->
                <div class="col">
                    <h2>Chart 1</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, rem unde distinctio quis maxime itaque ducimus reiciendis, autem culpa, eaque sequi? Amet impedit facilis dolorem dolor, tenetur quis adipisci ducimus.</p>
                </div>

                <!-- Chart 2 -->
                <div class="col">
                    <h2>Chart 2</h2>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio cupiditate consectetur, dolor ex animi architecto excepturi pariatur accusantium? Illo enim saepe odio excepturi natus quo sint incidunt odit facilis accusamus?</p>
                </div>

            </div>
        </div>
    </div>


    <!-- Latest compiled JavaScript and jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
</body>
</html>