<?php
include('includes/header.php');
// Redirection en fonction de la route
if(isset($_GET['route']) && !empty($_GET['route'])){
    switch($_GET['route']){
        case 'doctors':
            include 'includes/doctor_page.php';
            break;
        case 'users':
            include 'includes/user_page.php';
            break;
        default:
            include 'includes/admin_dashboard.php';
    }
}
else{
    include 'includes/admin_dashboard.php';
}
include('includes/footer.php');
?>