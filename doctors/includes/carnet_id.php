<?php
$carnet = getCarnet(escapeString($_GET["c_id"]));

if (!$carnet) {
    echo "<h4 class='error-box'>Erreur, nous ne pouvons donner suite à votre requête</h4>";
    echo "<p><a class='btn btn-danger' href='./'>Retour</a></p>";
} else {
    $user = getuserbyId($carnet['user_id']);
    if(!verifyCarnet_doctor($carnet['id'],$user['id'],$doctor['id'])){
        echo "<h4 class='error-box'>Carnet inconnu</h4>";
        echo "<p><a class='btn btn-danger' href='./user.php?p_id=".$user['id']."'>Retour</a></p>";
    }else{
?>
<h3 class="text-uppercase text-center"><?php echo $user['first_name']." ".$user['last_name']?></h3>
<hr>
<div class="row">
        <div class="col-md-12 col-lg-3">
            <h5>Analyse</h5>
            <hr>
            <blockquote>
            <?php echo nl2br($carnet['analyse'])?>
            </blockquote>
        </div>

        <div class="col-md-12 col-lg-3">
            <h5>Resultats</h5>
            <hr>
            <blockquote>
            <?php echo nl2br($carnet['resultat'])?>
            </blockquote>
        </div>

        <div class="col-md-12 col-lg-3">
            <h5>Avis</h5>
            <hr>
            <blockquote>
            <?php echo nl2br($carnet['avis'])?>
            </blockquote>
        </div>

        <div class="col-md-12 col-lg-3">
            <h5>Ordonnance</h5>
            <hr>
            <blockquote>
            <?php echo nl2br($carnet['ordonnance'])?>
            </blockquote>
        </div>
</div>
<?php }}?>