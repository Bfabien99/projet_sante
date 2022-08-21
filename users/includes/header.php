<?php
session_start();
include('../includes/config.php');
include('../includes/functions.php');
if (!isset($_SESSION['hp_user_pseudo']) || !isset($_SESSION['hp_user_email'])) {
    header('Location:./../?route=login');
}
if (isset($_GET['logout'])) {
    unset($_SESSION['hp_user_pseudo'], $_SESSION['hp_user_email']);
    header('Location:./');
}
$db = connect(
    DB_HOST,
    DB_USERNAME,
    DB_PASSWORD,
    DB_NAME
);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="./../js/jquery.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="./../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>HEALTH PLUS</title>
    <style>
        body {
            background-color: #f5f7fa;
        }
    </style>
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include('includes/user_navigation.php'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">