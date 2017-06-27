<?php
/**
 * Created by PhpStorm.
 * User: jonto
 * Date: 6/26/2017
 * Time: 11:50 AM
 */
$_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo isset($page_title) ? $page_title : "Fix The Page Header Reference"; ?></title>

    <!-- Bootstrap CSS -->
    <link href="libs/bootstrap-3.3.7/css/bootstrap.css" rel="stylesheet" media="screen">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- custom css for users -->
    <link href="libs/bootstrap-3.3.7/css/user.css" rel="stylesheet" media="screen">

</head>
<body>

<?php include 'navigation.php'; ?>

<!-- container -->
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="page-header">
                <h1><?php echo isset($page_title) ? $page_title : "Fix The Page Header Reference"; ?></h1>
            </div>
        </div>