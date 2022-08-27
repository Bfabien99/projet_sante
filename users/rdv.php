<?php
include('includes/header.php');
include('../mail.php');
if (isset($_GET['r_id']) && !empty($_GET['r_id'])) {
    include "includes/rdv_id.php";
}else{
    include "includes/rdv_all.php";
}

include('includes/footer.php');