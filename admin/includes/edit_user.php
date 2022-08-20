<?php
if (empty($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}
?>
<?php
$success = false;
$error = [];

if (isset($_POST['update_category'])) {
    if (empty($_POST['first_name'])) {
        $error['first_name'] = 'Veuillez entrer votre nom';
    } else {
        $fname = escapeString($_POST['first_name']);
    }

    if (empty($_POST['last_name'])) {
        $error['last_name'] = 'Veuillez entrer votre prénom';
    } else {
        $lname = escapeString($_POST['last_name']);
    }

    if (empty($_POST['birth'])) {
        $error['birth'] = 'Veuillez entrer votre date de naissance';
    } else {
        $birth = escapeString($_POST['birth']);
    }

    if (empty($_POST['sexe'])) {
        $error['sexe'] = 'Faîtes un choix';
    } elseif(!empty($_POST['sexe']) && empty($picture)){
        if ($_POST['sexe'] == "Femme") {
            $picture = "patient.png";
        } else {
            $picture = "patientf.png";
        }
        $sexe = escapeString($_POST['sexe']);
    }

    if (empty($_POST['fonction'])) {
        $error['fonction'] = 'Veuillez choisir votre service';
    } else {
        $fonction = escapeString($_POST['fonction']);
    }

    if (empty($_POST['description'])) {
        $error['description'] = 'Veuillez remplir ce champs';
    } else {
        $description = escapeString($_POST['description']);
    }

    if (empty($_POST['experience'])) {
        $error['experience'] = 'Veuillez remplir ce champs';
    } elseif ($_POST['experience'] < 0) {
        $error['experience'] = 'Entrez un nombre valide';
    } else {
        $experience = escapeString($_POST['experience']);
    }

    if (empty($_POST['contact'])) {
        $error['contact'] = 'Veuillez entrer un contact valide';
    } else {
        $contact = escapeString(filter_var($_POST['contact'], FILTER_SANITIZE_NUMBER_INT));
    }

    if (empty($_POST['emergency'])) {
        $error['emergency'] = 'Veuillez entrer un contact valide';
    } else {
        $emergency = escapeString(filter_var($_POST['emergency'], FILTER_SANITIZE_NUMBER_INT));
    }

    $id = escapeString($_GET['edit']);

    if (
    !empty($fname)
    && !empty($lname)
    && !empty($birth)
    && !empty($contact)
    && !empty($emergency)
    && !empty($sexe)) {
        if(userUpdate_admin(
            $id,
            $fname,
            $lname,
            $birth,
            $contact,
            $emergency,
            $sexe
        )){
            $success = true;
        }
    }
}
?>
<?php if (isset($_GET['edit']) && !empty($_GET['edit'])) : ?>
    <h1>Modifier les informations de l'utilisateur</h1>
<?php else : ?>
    <a href="./" class="btn btn-primary">Retour</a>
<?php endif; ?>
<?php if (!$success) : ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?php

        if (isset($_GET['edit']) && !empty($_GET['edit'])) {

            $id = escapeString($_GET['edit']);

            $query = "SELECT * FROM users WHERE id = $id ";
            $select_user_id = mysqli_query($db, $query);

            while ($row = mysqli_fetch_assoc($select_user_id)) {
                $fname = $row['first_name'];
                $lname = $row['last_name'];
                $birth = $row['birth'];
                $contact = $row['contact'];
                $emergency = $row['emergency_contact'];
                $sexe = $row['sexe'];
        ?>
                <div class="row py-1">
                    <div class="col-md-8 col-lg-6 p-2 m-2">
                        <legend>Information d'ordre général</legend>
                        <div class="form-group">
                            <label for="first_name">Nom</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="<?php if (isset($fname)) echo $fname; ?>">
                            <?php if (isset($error['first_name'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['first_name']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Prénoms</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="<?php if (isset($lname)) echo $lname; ?>">
                            <?php if (isset($error['last_name'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['last_name']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="birth">Date de naissance</label>
                            <input class="form-control" type="date" name="birth" id="birth" value="<?php if (isset($birth)) echo $birth; ?>">
                            <?php if (isset($error['birth'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['birth']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="contact">contact</label>
                            <input class="form-control" type="tel" name="contact" id="contact" value="<?php if (isset($contact)) echo $contact; ?>">
                            <?php if (isset($error['contact'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['contact']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="emergency">En cas d'urgence</label>
                            <input class="form-control" type="tel" name="emergency" id="emergency" value="<?php if (isset($emergency)) echo $emergency; ?>">
                            <?php if (isset($error['emergency'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['emergency']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <select name="sexe" id="sexe" class="form-control">
                                <?php if (isset($sexe) && $sexe == 'Femme') : ?>
                                    <option value="Homme">Homme</option>
                                    <option selected value="Femme">Femme</option>
                                    <option value="Autre">Autre</option>
                                <?php elseif (isset($sexe) && $sexe == 'Homme') : ?>
                                    <option selected value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                    <option value="Autre">Autre</option>
                                <?php else : ?>
                                    <option value="">--</option>
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                    <option value="Autre">Autre</option>
                                <?php endif; ?>
                            </select>
                            <?php if (isset($error['sexe'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['sexe']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="update_category" value="Modifier">
                </div>
        <?php }
        } ?>

    </form>
<?php else : ?>
    <h3 class="alert-success">Modification effectuée!</h3>
    <a href="./users.php" class="btn btn-primary">Retour</a>
<?php endif ?>