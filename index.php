<?php
// Redirection en fonction de la route
if(isset($_GET['route']) && !empty($_GET['route'])){
    switch($_GET['route']){
        case 'login':
            include 'includes/login_redirect.php';
            break;
        case 'register':
            include 'includes/register.php';
            break;
        default:
        echo "<div class=''><h1 class='error-box'>404, PAGE NOT FOUND</h1>";
        echo "<p><a class='btn btn-danger' href='./'>Retour</a></p></div>";
    }
}
else{
    include 'includes/home.php';
}
