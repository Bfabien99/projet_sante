<?php
$carnet = getCarnet(escapeString($_GET["c_id"]));

if (!$carnet) {
    echo "<div class=''><h1 class='error-box'>404, PAGE NOT FOUND</h1>";
    echo "<p><a class='btn btn-danger' href='./'>Retour</a></p></div>";
} else {
    $user = getuserbyId($carnet['user_id']);
    if (!$user) {
        echo "<div class=''><h1 class='error-box'>Utilisateur inconnu</h1>";
        echo "<p><a class='btn btn-danger' href='./'>Retour</a></p></div>";
    } else {
        if (!verifyCarnet_doctor($carnet['id'], $user['id'], $doctor['id'])) {
            echo "<h4 class='error-box'>Carnet inconnu</h4>";
            echo "<p><a class='btn btn-danger' href='./user.php?p_id=" . $user['id'] . "'>Retour</a></p>";
        } else {
?>
            <h3 class="text-uppercase text-center"><?php echo $user['first_name'] . " " . $user['last_name'] ?></h3>
            <hr>
            <div class="row d-flex justify-content-around">
                <div class="col-md-12 col-lg-3 shadow border-bottom border-2 border-secondary p-2" style="max-width:300px">
                    <h5 class="text-center text-secondary text-uppercase">Analyse</h5>
                    <hr>
                    <blockquote class="text-center text-capitalize">
                        <?php echo nl2br($carnet['analyse']) ?>
                    </blockquote>
                </div>

                <div class="col-md-12 col-lg-3 shadow border-bottom border-2 border-secondary p-2" style="max-width:300px">
                    <h5 class="text-center text-secondary text-uppercase">Resultats</h5>
                    <hr>
                    <blockquote class="text-center text-capitalize">
                        <?php echo nl2br($carnet['resultat']) ?>
                    </blockquote>
                </div>

                <div class="col-md-12 col-lg-3 shadow border-bottom border-2 border-secondary p-2" style="max-width:300px">
                    <h5 class="text-center text-secondary text-uppercase">Avis</h5>
                    <hr>
                    <blockquote class="text-center text-capitalize">
                        <?php echo nl2br($carnet['avis']) ?>
                    </blockquote>
                </div>

                <div class="col-md-12 col-lg-3 shadow border-bottom border-2 border-secondary p-2" style="max-width:300px">
                    <h5 class="text-center text-secondary text-uppercase">Ordonnance</h5>
                    <hr>
                    <blockquote class="text-center text-capitalize">
                        <?php echo nl2br($carnet['ordonnance']) ?>
                    </blockquote>
                </div>
            </div>
<?php }
    }
} ?>