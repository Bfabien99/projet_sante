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
if (!isset($_SESSION['hp_doctor_pseudo']) || !isset($_SESSION['hp_doctor_email'])) {
    header('Location:./../?route=login');
}else{
    $doctor = getDoctorbyPseudo($_SESSION['hp_doctor_pseudo']);
    if(!$doctor){
        header('Location:./../?route=login');
    }
}
if (isset($_GET['logout'])) {
    unset($_SESSION['hp_doctor_pseudo'], $_SESSION['hp_doctor_email']);
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
    <title>Docteur</title>
    <style>
        body {
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

        .fc-toolbar-title, #fc-dom-1{
        font-size: 12px;
        
    }
    .fc-daygrid-day{
        border: 1px solid lightgrey !important;
        border-radius: 5px !important;
    }
    </style>
</head>

<body>
<?php include('includes/doctor_navigation.php'); ?>
            <div class="container p-2">