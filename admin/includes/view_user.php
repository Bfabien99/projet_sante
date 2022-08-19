<?php
if (empty($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}
?>

<?php 
$user = getUserbyPseudo($_GET["pseudo"]); 

if(!$user){
    echo "<h4 class='alert alert-warning'>L'utilisateur <strong><< {$_GET['pseudo']} >></strong> n'est pas reconnu</h4>";
    echo "<p><a class='btn btn-secondary' href='./?route=users'>Retour</a></p>";
}

?>