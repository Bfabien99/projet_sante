<?php
include('includes/header.php');
if (isset($_GET['pseudo'])) {
    include "includes/view_user.php";
} elseif (isset($_GET['delete'])) {
    include "includes/delete_user.php";
}elseif (isset($_GET['source'])) {
    $source = $_GET['source'];
}else {
    $source = '';
}




if(isset($source)) {
   switch ($source) {

    case 'add_user':
        include "includes/user_register.php";
        break;


    case 'edit_user':
        include "includes/user_edit.php";
        break;

    default:
        include "includes/view_all_users.php";
        break;
} 
}

include('includes/footer.php');







include('includes/footer.php');
