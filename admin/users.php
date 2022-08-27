<?php
include('includes/header.php');
include('../mail.php');
if (isset($_GET['p_id'])) {
    include "includes/view_user.php";
} elseif (isset($_GET['delete'])) {
    include "includes/delete_user.php";
} elseif (isset($_GET['edit'])) {
    include "includes/edit_user.php";
}
elseif (isset($_GET['source'])) {
    $source = $_GET['source'];
}else {
    $source = '';
}




if(isset($source)) {
   switch ($source) {

    case 'add_user':
        include "includes/register_user.php";
        break;


    default:
        include "includes/view_all_users.php";
        break;
} 
}

include('includes/footer.php');

