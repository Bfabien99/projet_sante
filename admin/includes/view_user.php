
<?php 
$user = getUserbyPseudo($_GET["p_id"]); 

if(!$user){
    echo "<h4 class='alert alert-warning'>L'utilisateur n'est pas reconnu</h4>";
    echo "<p><a class='btn btn-secondary' href='./users.php'>Retour</a></p>";
}

?>