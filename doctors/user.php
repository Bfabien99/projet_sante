<?php
include('includes/header.php');
if (isset($_GET['p_id']) && !empty($_GET['p_id'])) {
    include "includes/user_id.php";
}else{
    include "includes/user_all.php";
}

include('includes/footer.php');
