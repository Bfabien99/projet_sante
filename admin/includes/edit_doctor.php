
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
            $picture = "docteurf.png";
        } else {
            $picture = "docteur.png";
        }
        $sexe = escapeString($_POST['sexe']);
    }

    if(!empty($_FILES['profile'])){
        $picture = cleanFile('profile');
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

    if (empty($_POST['contact1'])) {
        $error['contact1'] = 'Veuillez entrer un contact valide';
    } else {
        $contact1 = escapeString(filter_var($_POST['contact1'], FILTER_SANITIZE_NUMBER_INT));
    }

    if (empty($_POST['contact2'])) {
        $error['contact2'] = 'Veuillez entrer un contact valide';
    } else {
        $contact2 = escapeString(filter_var($_POST['contact2'], FILTER_SANITIZE_NUMBER_INT));
    }

    $id = escapeString($_GET['edit']);
    $image = $picture ?? getDoctorPicture($id);
    if (
    !empty($fname)
    && !empty($lname)
    && !empty($birth)
    && !empty($sexe)
    && !empty($fonction)
    && !empty($description)
    && !empty($experience)
    && !empty($contact1)
    && !empty($contact2)
    && !empty($image)) {
        if(doctorUpdate_admin(
            $id,
            $fname,
            $lname,
            $birth,
            $fonction,
            $sexe,
            $description,
            $experience,
            $contact1,
            $contact2,
            $image
        )){
            if(!file_exists("../profiles/$image")){
                move_uploaded_file($_FILES['profile']['tmp_name'], '../profiles/' . $picture);
            }
            $success = true;
        }
    }
}
?>
<?php if (isset($_GET['edit']) && !empty($_GET['edit'])) : ?>
    <h1>Modifier les informations du docteur</h1>
<?php else : ?>
    <a href="./" class="btn btn-primary">Retour</a>
<?php endif; ?>
<?php if (!$success) : ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?php

        if (isset($_GET['edit']) && !empty($_GET['edit'])) {

            $id = escapeString($_GET['edit']);

            $query = "SELECT * FROM doctors WHERE id = $id ";
            $select_doctor_id = mysqli_query($db, $query);

            while ($row = mysqli_fetch_assoc($select_doctor_id)) {
                $fname = $row['first_name'];
                $lname = $row['last_name'];
                $birth = $row['birth'];
                $sexe = $row['sexe'];
                $fonction = $row['fonction'];
                $description = $row['description'];
                $experience = $row['experience'];
                $contact1 = $row['contact1'];
                $contact2 = $row['contact2'];
                $email = $row['email'];
                $pseudo = $row['pseudo'];
                $password = $row['password'];
                $picture = $row['picture'];

        ?>
                <div class="row py-1" style="margin:2em auto;padding:1em; background-color:white;">
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
                            <label for="contact1">Contact1</label>
                            <input class="form-control" type="tel" name="contact1" id="contact1" value="<?php if (isset($contact1)) echo $contact1; ?>">
                            <?php if (isset($error['contact1'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['contact1']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="contact2">Contact2</label>
                            <input class="form-control" type="tel" name="contact2" id="contact2" value="<?php if (isset($contact2)) echo $contact2; ?>">
                            <?php if (isset($error['contact2'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['contact2']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <select name="sexe" id="sexe" class="form-control">
                                <?php if (isset($sexe) && $sexe == 'Femme') : ?>
                                    <option value="Homme">Homme</option>
                                    <option selected value="Femme">Femme</option>
                                <?php elseif (isset($sexe) && $sexe == 'Homme') : ?>
                                    <option selected value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                <?php else : ?>
                                    <option value="">--</option>
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                <?php endif; ?>
                            </select>
                            <?php if (isset($error['sexe'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['sexe']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-8 col-lg-6 p-2">
                        <legend>Informations d'ordre personnel</legend>
                        <div>
                            <img src="<?php if(isset($picture)) echo "./../profiles/".$picture?>" alt="<?php echo $fname." ".$lname ?? ""; ?>" style="width:100px;">
                            <label for="profile">Changer d'image</label>
                            <input class="form-control" type="file" name="profile" id="profile">
                        </div>
                        <div class="form-group">
                            <label for="fonction">Service</label>
                            <select name="fonction" id="fonction" class="form-control">
                                <option value="">--</option>
                                <?php

                                $query = "SELECT * FROM roles";
                                $select_all_roles = mysqli_query($db, $query);

                                while ($row = $select_all_roles->fetch_assoc()) {
                                ?>
                                    <?php if (isset($fonction) && $fonction == $row['titre']) : ?>
                                        <option selected value="<?php echo $row['titre'] ?>"><?php echo $row['titre'] ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $row['titre'] ?>"><?php echo $row['titre'] ?></option>
                                    <?php endif; ?>
                                <?php }
                                ?>
                            </select>
                            <?php if (isset($error['fonction'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['fonction']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <small>Que pouvez vous dire de vous?</small>
                            <textarea class="form-control" type="text" name="description" id="description"><?php if (isset($description)) echo $description; ?></textarea>
                            <?php if (isset($error['description'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['description']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="experience">Année d'Expérience</label>
                            <input class="form-control" type="number" name="experience" id="experience" value="<?php if (isset($experience)) echo $experience; ?>">
                            <?php if (isset($error['experience'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['experience']; ?></p>
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
    <h1 class="text-center alert-success"> Modification éffectuée</h1>
    <a href="./doctors.php" class="btn btn-primary">Retour</a>
<?php endif ?>