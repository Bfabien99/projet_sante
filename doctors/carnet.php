<?php
include('includes/header.php');
if (isset($_GET['p_id']) && !empty($_GET['p_id'])) {
    include "includes/consultation.php";
} elseif (isset($_GET['pc_id']) && !empty($_GET['pc_id'])) {
    include "includes/all_carnet_id.php";
} elseif (isset($_GET['c_id']) && !empty($_GET['c_id'])) {
    include "includes/carnet_id.php";
} else {
    echo "<div class=''><h1 class='error-box'>404, PAGE NOT FOUND</h1>";
    echo "<p><a class='btn btn-danger' href='./'>Retour</a></p></div>";
}

include('includes/footer.php');
