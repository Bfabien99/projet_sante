<?php
session_start();
include('../includes/config.php');
include('../includes/functions.php');
if (!isset($_SESSION['hp_doctor_pseudo']) || !isset($_SESSION['hp_doctor_email'])) {
    header('Location:./../?route=login');
}
if (isset($_GET['logout'])) {
    unset($_SESSION['hp_doctor_pseudo'], $_SESSION['hp_doctor_email']);
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
    <!-- Custom CSS -->
    <link href="./../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>Docteur</title>
    <style>
        body{
            background-color: #fff;
        }

        .container-fluid{
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
        }

        .card #blood{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            position: absolute;
            right: 5px;
            font-size:2em;
        }

        .patient_block_bottom{
            margin: 1em auto;
            padding: 2em;
            display: grid;
            grid-template-columns: repeat(2,1fr);
            justify-items: center;
        }

        .patient_block_bottom div{
            background-color: #fff;
        }
    </style>
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include('includes/doctor_navigation.php'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">