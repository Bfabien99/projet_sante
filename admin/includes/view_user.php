
<?php 
$user = getUserbyPseudo($_GET["pseudo"]); 

if(!$user){
    echo "<h4 class='alert alert-warning'>L'utilisateur <strong><< {$_GET['pseudo']} >></strong> n'est pas reconnu</h4>";
    echo "<p><a class='btn btn-secondary' href='./users.php'>Retour</a></p>";
}

?>