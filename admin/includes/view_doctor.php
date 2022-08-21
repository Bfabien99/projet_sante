<?php 
$doctor = getDoctorbyId($_GET["d_id"]); 

if(!$doctor){
    echo "<h4 class='alert alert-warning'>Le Docteur n'est pas reconnu</h4>";
    echo "<p><a class='btn btn-secondary' href='./doctors.php'>Retour</a></p>";
}

?>