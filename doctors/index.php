<?php
include('includes/header.php');
// Redirection en fonction de la route
if(isset($_GET['route']) && !empty($_GET['route'])){
    switch($_GET['route']){
        case 'login':
            include 'includes/doctor_login.php';
            break;
        default:
            include 'includes/doctor_dashboard.php';
    }
}
else{
    include 'includes/doctor_dashboard.php';
}
include('includes/footer.php');
?>