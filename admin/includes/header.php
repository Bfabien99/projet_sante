<?php
session_start();
include('../includes/config.php');
include('../includes/functions.php');
include('../mail.php');
$db = connect(
    DB_HOST,
    DB_USERNAME,
    DB_PASSWORD,
    DB_NAME
);
if (!isset($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}else{
    $admin = getAdminbyPseudo($_SESSION['hp_admin_pseudo']);
    if(!$admin){
        header('Location:./../?route=login');
    }
}
if (isset($_GET['logout'])) {
    unset($_SESSION['hp_admin_pseudo']);
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
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- Bootstrap Core CSS -->
    <link href="./../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <title>Admin</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
            background-color: #f5f7fa;
        }

        #page-wrapper {
            background-color: #f5f7fa;
        }

        .success-box {
            background-color: green;
            color: white;
            padding: 0.5em;
            border-radius: 5px;
            box-shadow: 0px 0px 10px lightgrey;
            width: fit-content;
        }

        .error-box {
            background-color: red;
            color: white;
            padding: 0.5em;
            border-radius: 5px;
            box-shadow: 0px 0px 10px lightgrey;
            width: fit-content;
        }
    </style>
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include('includes/admin_navigation.php'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">