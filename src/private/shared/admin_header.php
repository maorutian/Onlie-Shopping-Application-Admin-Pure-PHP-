<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo htmlspecialchars($page_title) ?? 'Cakefactory Management'; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo WWW_ROOT . '/css/bootstrap_admin.css' ?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!--nav-->
<nav class="navbar navbar-default">
    <?php if($session->is_logged_in()) { ?>
    <div class="container">
        <!--for phone-->
        <div class="navbar-header ">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo WWW_ROOT . '/index.php'?>" class="navbar-brand">Mycake Admin</a>
        </div>
        <!--for desktop-->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo WWW_ROOT . '/index.php'?>">Home</a></li>
                <li><a href="<?php echo WWW_ROOT . '/products/index.php'?>">Product Management</a></li>
                <li><a href="<?php echo WWW_ROOT . '/customers/index.php'?>">Customer Management</a></li>
                <li><a href="<?php echo WWW_ROOT . '/orders/index.php'?>">Order Management</a></li>
                <li><a href="<?php echo WWW_ROOT . '/employees/index.php'?>">Employee Management</a></li>
                <li><a href="<?php echo WWW_ROOT . '/statistic/index.php'?>">Statistic</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href=""><strong><?php echo $session->first_name; ?></strong></a></li>
                <li><a href="" role="button" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Logout</a>

                </li>
            </ul>
        </div>
        <!--for desktop end-->
    </div>
    <?php } ?>
</nav>
<!--nav-->

