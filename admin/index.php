<?php
include('includes/header.php');
// Redirection en fonction de la route
if(isset($_GET['route']) && !empty($_GET['route'])){
    switch($_GET['route']){
        case 'doctors':
            include 'includes/view_all_doctors.php';
            break;
            case 'doctor_register':
                include 'includes/doctor_register.php';
                break;
        case 'users':
            include 'includes/view_all_users.php';
            break;
            case 'user_register':
                include 'includes/user_register.php';
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