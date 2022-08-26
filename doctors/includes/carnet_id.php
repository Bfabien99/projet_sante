<?php
$user = getuserbyId(escapeString($_GET["p_id"]));

if (!$user) {
    echo "<h4 class='error-box'>Le Patient n'est pas reconnu</h4>";
    echo "<p><a class='btn btn-secondary' href='./'>Retour</a></p>";
} else {
?>

<?php }?>