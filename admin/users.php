<?php
include('includes/header.php');
if(isset($_GET['source'])){

$source = $_GET['source'];

} else {

$source = '';

}

switch($source) {
    
    case 'add_user':
        include "includes/user_register.php";
    break; 
    
    
    case 'edit_user':
        include "includes/user_edit.php";
    break;
    
    case '200';
    echo "NICE 200";
    break;
    
    default:
        include "includes/view_all_users.php";
    break;
    
    
    
    
}






include('includes/footer.php');
