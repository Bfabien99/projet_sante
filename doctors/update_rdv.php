<?php
if (isset($_POST['input']) && isset($_POST['type'])) {
    include('../includes/config.php');
    include('../includes/functions.php');
    $db = connect(
        DB_HOST,
        DB_USERNAME,
        DB_PASSWORD,
        DB_NAME
    );

    if($_POST['type'] == "remove"){
        undoRdv(escapeString($_POST['input']));
        return true;
    }
    if($_POST['type'] == "confirm"){
        confirmRdv(escapeString($_POST['input']));
        return true;
    }

}
?>