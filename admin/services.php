<?php
include('includes/header.php');
if (isset($_GET['edit'])) {
    include "includes/edit_service.php";
} elseif (isset($_GET['source'])) {
    $source = $_GET['source'];
} else {
    $source = '';
}




if(isset($source)) {
   switch ($source) {

    case 'add_service':
        include "includes/service_register.php";
        break;

    default:
        include "includes/view_all_services.php";
        break;
}
}

include('includes/footer.php');