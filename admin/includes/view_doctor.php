

<?php 
$doctor = getDoctorbyPseudo($_GET["pseudo"]); 

if(!$doctor){
    echo "<h4 class='alert alert-warning'>L'utilisateur <strong><< {$_GET['pseudo']} >></strong> n'est pas reconnu</h4>";
    echo "<p><a class='btn btn-secondary' href='./doctors.php'>Retour</a></p>";
}

?>