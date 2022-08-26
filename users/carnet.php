<?php
include('includes/header.php');
if (isset($_GET['c_id']) && !empty($_GET['c_id'])) {
    include "includes/carnet_id.php";
}
else{
    include "includes/all_carnet.php";
}

include('includes/footer.php');