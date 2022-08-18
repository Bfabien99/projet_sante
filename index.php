<?php
// Redirection en fonction de la route
if(isset($_GET['route']) && !empty($_GET['route'])){
    switch($_GET['route']){
        case 'login':
            include 'login_redirect.php';
            break;
        case 'register':
            include 'register.php';
            break;
        default:
            include 'home.php';
    }
}
else{
    include 'home.php';
}
?>
