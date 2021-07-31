<?php

session_start();

include_once('config.php');

if (!isset($_SESSION['ID'])) {
    header("Location:login.php");
    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Infantry</title>
</head>

<body>
<div id="page-container" class="main-admin">
    <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed w-100">
        <a class="navbar-brand" href="#"></a>
        <div id="open-menu" class="menu-bar">
            <div class="bars"></div>
        </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown ets-right-0">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">

                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="logout.php">Deconnection</a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
        </ul>
    </nav>
    <div class="side-bar">
        <div class="side-bar-links">
            <div class="side-bar-logo text-center py-3">
                <img src="" class="img-fluid rounded-circle border bg-secoundry mb-3">
                <h5>Photo de profil </h5>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-links d-block"><i class="fa fa-home pr-2"></i> HOME</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-links d-block"><i class="fa fa-home pr-2"></i> Autes</a>
                </li>

                </li>
            </ul>
        </div>
        <div class="side-bar-icons">

            <div class="icons d-flex flex-column align-items-center">
                <a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-home"></i></a>
                <a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-users"></i></a>
                <a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-list"></i></a>
                <a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-sticky-note-o"></i></a>
                <a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-file-text"></i></a>
                <a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-sticky-note-o"></i></a>
                <a href="#" class="set-width text-center display-inline-block my-1"><i class="fa fa-database"></i></a>
            </div>
        </div>
    </div>

    <div class="main-body-content w-100 ets-pt">
        <div class="container">
            <div class="card text-center" style="padding:10px; margin-top:10px;">
                <h3 class="text-primary"></h3>
                <div class="row">
                    <div class="col-md-12 text-center" style="padding:10px;">
                        <h3>Bienvenue dans votre espace Admin
                            <span class="text-success"><?php echo ucwords($_SESSION['NAME']) . " " ; ?></span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive bg-light">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>lorem</th>
                    <th>ipssum</th>
                    <th>Dollor</th>
                </tr>
                <tr>
                    <td>Vinay</td>
                    <td>Sharma</td>
                    <td>lorem ipssum dollor dummy</td>
                    <td>lorem ipssum dollor dummy</td>
                    <td>lorem ipssum dollor dummy</td>
                </tr>
                <tr>
                    <td>Vinay</td>
                    <td>Sharma</td>
                    <td>lorem ipssum dollor dummy</td>
                    <td>lorem ipssum dollor dummy</td>
                    <td>lorem ipssum dollor dummy</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery("#open-menu").click(function () {
            if (jQuery('#page-container').hasClass('show-menu')) {
                jQuery("#page-container").removeClass('show-menu');
            } else {
                jQuery("#page-container").addClass('show-menu');
            }
        });
    });
</script>
</body>
</html>
