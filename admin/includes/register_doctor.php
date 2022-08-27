
<?php
$success = false;
$error = [];

if (isset($_POST['register'])) {
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
    } else {
        if($_POST['sexe'] == "Femme"){
            $picture = "docteurf.png";
        }else{
            $picture = "docteur.png";
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

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'Veuillez entrer une adresse email valide';
    } elseif (emailExist($_POST['email'])) {
        $error['email'] = "Cet email existe déja, veuillez en choisr un autre";
    } else {
        $email = escapeString($_POST['email']);
    }

    if (empty($_POST['sexe'])) {
        $error['sexe'] = 'Faîtes un choix';
    } else {
        $sexe = escapeString($_POST['sexe']);
    }

    if (empty($_POST['pseudo']) || strlen($_POST['pseudo']) < 4) {
        $error['pseudo'] = "Veuillez entrer un pseudo d'au moins 4 caractères";
    } elseif (pseudoExist($_POST['pseudo'])) {
        $error['pseudo'] = "Cet pseudo existe déja, veuillez en choisr un autre";
    } else {
        $pseudo = escapeString($_POST['pseudo']);
    }

    if (empty($_POST['password'])) {
        $_POST['password']="good_doctor";
        $password = pass_crypt($_POST['password']);
    } else {
        $password = pass_crypt($_POST['password']);
    }

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
        && !empty($email)
        && !empty($pseudo)
        && !empty($password)
    ) {
        if (doctorRegister(
            $fname,
            $lname,
            $birth,
            $sexe,
            $fonction,
            $description,
            $experience,
            $contact1,
            $contact2,
            $email,
            $pseudo,
            $password,
            $picture
        )) {
            $success = true;
            sendMail('Création de compte',"Votre compte vient d'être créé,votre pseudonyme est: $pseudo, votre mot de passe est ".$_POST['password'],$email);
        } else {
            $error['sqlError'] = "Impossible d'inserer les données pour l'instant... Veuillez réessayez plus tard";
        };
    }
}
?>
<h1 class='text-center'>AJOUTER UN NOUVEAU DOCTEUR</h1>
<?php if (!$success) : ?>
    <form action="" method="post" autocomplete="off" class="">
        <div class="row py-1" style="margin:2em auto;padding:1em; background-color:white;overflow:auto;">
            <div class="col-md-8 col-lg-5 p-2 m-2">
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
                            <option value="">--</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                        <?php if (isset($error['sexe'])) : ?>
                            <p class="alert-danger rounded-2 p-1"><?php echo  $error['sexe']; ?></p>
                        <?php endif; ?>
                    </div>
            </div>

            <div class="col-md-8 col-lg-5 p-2 m-2">
                <legend>Information de connexion</legend>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" value="<?php if (isset($email)) echo $email; ?>">
                    <?php if (isset($error['email'])) : ?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['email']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="pseudo">Pseudonyme</label>
                    <input class="form-control" type="text" name="pseudo" id="pseudo" value="<?php if (isset($pseudo)) echo $pseudo; ?>">
                    <?php if (isset($error['pseudo'])) : ?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['pseudo']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input class="form-control" type="password" name="password" id="password">
                    <?php if (isset($error['password'])) : ?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['password']; ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-8 col-lg-8 p-2">
                <legend>Informations d'ordre personnel</legend>
                <div class="form-group">
                    <label for="fonction">Service</label>
                    <select name="fonction" id="fonction" class="form-control">
                        <option value="">--</option>
                        <?php

                        $query = "SELECT * FROM roles";
                        $select_all_roles = mysqli_query($db, $query);

                        while ($row = $select_all_roles->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $row['titre'] ?>"><?php echo $row['titre'] ?></option>
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

        <input type="submit" class="btn btn-success mb-2" name="register" value="S'enregistrer">
    </form>
<?php else : ?>
    <h1 class="text-center alert-success"> Enregistrement éffectué</h1>
    <a href="./doctors.php" class="btn btn-primary">Retour</a>
<?php endif; ?>