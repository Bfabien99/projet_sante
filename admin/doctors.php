<?php
include('includes/header.php');
if (isset($_GET['d_id'])) {
    include "includes/view_doctor.php";
} elseif (isset($_GET['edit'])) {
    include "includes/edit_doctor.php";
} 
elseif (isset($_GET['delete'])) {
    include "includes/delete_doctor.php";
}elseif (isset($_GET['source'])) {
    $source = $_GET['source'];
}else {
    $source = '';
}

if (isset($source)) {
    switch ($source) {

        case 'add_doctor':
            include "includes/register_doctor.php";
            break;

        default:
            include "includes/view_all_doctors.php";
            break;
    }
}






include('includes/footer.php');
