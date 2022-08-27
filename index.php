<?php
// Redirection en fonction de la route
if(isset($_GET['route']) && !empty($_GET['route'])){
    switch($_GET['route']){
        case 'login':
            include './includes/login_redirect.php';
            break;
        case 'register':
            include './includes/register.php';
            break;
        default:
            include './includes/home.php';
    }
}
else{
    include './includes/home.php';
}
?>
