<!DOCTYPE html>
<html>
<head>
    <title><?php echo $config["projectName"]; ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <?php
    if($currentPage === "index") {
        echo '
            <!-- Morris Chart Style -->
            <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        ';
    }
    ?>

    <!-- Custom styles -->
    <link rel="stylesheet" href="styles/style.css">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><?php echo $config["projectName"]; ?></a>
            </div>

            <ul class="navbar-nav">
                <li class="nav-item <?php echo ($currentPage === 'index') ? 'active' : ''; ?>">
                    <a class="nav-link" href="index.php">Progression</a>
                </li>
                <li class="nav-item <?php echo ($currentPage === 'report') ? 'active' : ''; ?>">
                    <a class="nav-link" href="report.php">Report</a>
                </li>
                <li class="nav-item <?php echo ($currentPage === 'details') ? 'active' : ''; ?>">
                    <a class="nav-link" href="details.php">Add/Remove Details</a>
                </li>
                <li class="nav-item <?php echo ($currentPage === 'list') ? 'active' : ''; ?>">
                    <a class="nav-link" href="list.php">Activity List</a>
                </li>
            </ul>
        </div>
    </nav>