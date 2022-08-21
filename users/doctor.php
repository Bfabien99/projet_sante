<?php
include('includes/header.php');
if (isset($_GET['d_id']) && !empty($_GET['d_id'])) {
    include "includes/doctor_id.php";
}else{
    include "includes/doctor_all.php";
}

include('includes/footer.php');
