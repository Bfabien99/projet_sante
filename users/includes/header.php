<?php
session_start();
include('../includes/config.php');
include('../includes/functions.php');
$db = connect(
    DB_HOST,
    DB_USERNAME,
    DB_PASSWORD,
    DB_NAME
);
if (!isset($_SESSION['hp_user_pseudo']) || !isset($_SESSION['hp_user_email'])) {
    header('Location:./../?route=login');
}
else{
    $user = getUserbyPseudo($_SESSION['hp_user_pseudo']);
}
if (isset($_GET['logout'])) {
    unset($_SESSION['hp_user_pseudo'], $_SESSION['hp_user_email']);
    header('Location:./');
}

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

    <!-- Calendar -->
    
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.js'></script>

    <!-- Bootstrap Core CSS & JS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Custom Fonts -->
    <link href="./../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>HEALTH PLUS</title>
    <style>
        body {
            margin: 0;
        }

        @media screen and (max-width:720px) {

        }

        /*.container-fluid{
            background-color: #f5f7fa;
        }

        .card{
            position: relative;
            background-color: #fff;
            box-shadow: 0 0 10px lightgrey;
            max-width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1em;
            border-radius: 5px;
            margin:0 auto;
        }

        .table{
            position: relative;
            background-color: #fff;
            box-shadow: 0 0 10px lightgrey;
            max-width: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1em;
            border-radius: 5px;
            margin:2px auto;
        }*/
    </style>
</head>

<body>
    <?php include('includes/user_navigation.php'); ?>

    <!-- Navigation -->
    <div class="container">