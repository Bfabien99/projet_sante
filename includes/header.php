<?php
session_start();
    include('config.php');
    include('functions.php');
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
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Accueil Health Plus</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        
        <!-- Custom Fonts -->
        <script src="https://kit.fontawesome.com/1f88d87af5.js" crossorigin="anonymous"></script>
        <style>
        body {
            background-color: #F8F9FC;
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

        .fc-toolbar-title, #fc-dom-1{
        font-size: 12px;
        
    }
    .fc-daygrid-day{
        border: 1px solid lightgrey !important;
        border-radius: 5px !important;
    }
    </style>
    </head>
    <body id="page-top">