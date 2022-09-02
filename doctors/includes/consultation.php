<?php
$user = getuserbyId(escapeString($_GET["p_id"]));

if (!$user) {
    echo "<h4 class='error-box'>Le Patient n'est pas reconnu</h4>";
    echo "<p><a class='btn btn-secondary' href='./'>Retour</a></p>";
} else {
    $error = [];
    $success = false;
    $nomPatient = $user['first_name'] . " " . $user['last_name'];

    if(isset($_POST['submit'])){

        if(empty(trim($_POST['analyse']))){
            $error['analyse'] = 'Veuillez renseigner ce champs';
        }else{
            $analyse = escapeString($_POST['analyse']);
        }

        if(empty(trim($_POST['resultats']))){
            $error['resultats'] = 'Veuillez renseigner ce champs';
        }else{
            $resultats = escapeString($_POST['resultats']);
        }

        if(empty(trim($_POST['avis']))){
            $error['avis'] = 'Veuillez renseigner ce champs';
        }else{
            $avis = escapeString($_POST['avis']);
        }

        if(empty(trim($_POST['ordonnance']))){
            $error['ordonnance'] = 'Veuillez renseigner ce champs';
        }else{
            $ordonnance = escapeString($_POST['ordonnance']);
        }

        if(!empty($analyse) && !empty($resultats) && !empty($avis) && !empty($ordonnance)){
            if(consultation($user['id'],$doctor['id'],$analyse,$resultats,$avis,$ordonnance)){
                $success = true;
            }
        }
    }
?>

<?php if (!$success) : ?>
    <small class="text-primary">*S'il n'y a rien à dire renseignez "Aucun ou vide..." dans le champs correspondant</small>
    <form action="" method='post'>
        <div class="form-group">
            <label for="nomPatient">
                PATIENT
            </label>
            <input class="form-control text-uppercase" disabled type="text" value="<?php echo $nomPatient ?>">
        </div>

        <div class="row">
        <div class="col-md-12 col-lg-3">
            <label for="sangPatient">
                Groupe Sanguin
                </label>
            <input class="form-control text-uppercase" disabled type="text" value="<?php echo $user['blood'] ?>">
            </div>

            <div class="col-md-12 col-lg-3">
            <label for="genrePatient">
                Sexe
                </label>
            <input class="form-control text-uppercase" disabled type="text" value="<?php echo $user['sexe'] ?>">
            </div>
            <div class="col-md-12 col-lg-3">
            <label for="taillePatient">
                Taille en Cm
                </label>
            <input class="form-control text-uppercase" disabled type="text" value="<?php echo $user['height'] ?>">
            </div>
            
            <div class="col-md-12 col-lg-3">
            <label for="poidsPatient">
                Poids en Kg
                </label>
            <input class="form-control text-uppercase" disabled type="text" value="<?php echo $user['weight'] ?>">
            </div>

        </div>
        <hr>
        <div class="form-group">
            <label for="analyse">
                Analyse(s) effectuée(s)
            </label>
            <textarea class="form-control" name="analyse"><?php echo  $_POST['analyse'] ?? ""; ?></textarea>
            <?php if (isset($error['analyse'])) : ?>
        <p class="error-box rounded-2 p-1"><?php echo  $error['analyse']; ?></p>
    <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="resultats">
                Résultats
            </label>
            <textarea class="form-control" name="resultats"><?php echo  $_POST['resultats'] ?? ""; ?></textarea>
            <?php if (isset($error['resultats'])) : ?>
        <p class="error-box rounded-2 p-1"><?php echo  $error['resultats']; ?></p>
    <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="avis">
                Votre Interprétation
            </label>
            <textarea class="form-control" name="avis"><?php echo  $_POST['avis'] ?? ""; ?></textarea>
            <?php if (isset($error['avis'])) : ?>
        <p class="error-box rounded-2 p-1"><?php echo  $error['avis']; ?></p>
    <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="ordonnance">
                Ordonnance
            </label>
            <textarea class="form-control" name="ordonnance">
            <?php echo  $_POST['ordonnance'] ?? ""; ?>
            </textarea>
            <?php if (isset($error['ordonnance'])) : ?>
        <p class="error-box rounded-2 p-1"><?php echo  $error['ordonnance']; ?></p>
    <?php endif; ?>
        </div>
        <input class="btn btn-primary" type="submit" name="submit" value="Enregistrer">
    </form>
    <?php else: ?>
    <p class="success-box"> Données enregistrées</p>
    <p><a class="btn btn-primary" href="./user.php?p_id=<?php echo $user['id']?>">Retour</a></p>
    <?php endif; ?>
<?php } ?>