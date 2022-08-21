
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
        $error['last_name'] = 'Veuillez entrer un Prénom';
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
            $picture = "patientf.png";
        }else{
            $picture = "patient.png";
        }
        $sexe = escapeString($_POST['sexe']); 
    }

    if (empty($_POST['contact'])) {
        $error['contact'] = 'Veuillez entrer un contact valide';
    } else {
        $contact = escapeString(filter_var($_POST['contact'], FILTER_SANITIZE_NUMBER_INT));
    }

    if (empty($_POST['emergency_contact'])) {
        $error['emergency_contact'] = 'Veuillez entrer un contact valide';
    } else {
        $emergency = escapeString(filter_var($_POST['emergency_contact'], FILTER_SANITIZE_NUMBER_INT));
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'Veuillez entrer une adresse email valide';
    } elseif (emailExists($_POST['email'])) {
        $error['email'] = "Cet email existe déja, veuillez en choisr un autre";
    } else {
        $email = escapeString($_POST['email']);
    }

    if (empty($_POST['sexe'])) {
        $error['sexe'] = 'Faîtes un choix';
    } else {
        $sexe = escapeString($_POST['sexe']);
    }

    if (empty($_POST['weight'])) {
        $error['weight'] = 'Veuillez entrer votre poids en kg';
    } elseif ($_POST['weight'] < 0) {
        $error['weight'] = 'Veuillez entrer un nombre valide';
    } else {
        $weight = escapeString($_POST['weight']);
    }

    if (empty($_POST['height'])) {
        $error['height'] = 'Veuillez entrer votre taille en cm';
    } elseif ($_POST['height'] < 0) {
        $error['height'] = 'Veuillez entrer un nombre valide';
    } else {
        $height = escapeString($_POST['height']);
    }

    if (empty($_POST['blood'])) {
        $error['blood'] = 'Veuillez choisir votre groupe sanguin';
    } else {
        $blood = escapeString($_POST['blood']);
    }

    if (empty($_POST['allergy'])) {
        $error['allergy'] = 'Veuillez remplir ce champ';
    } else {
        $allergy = escapeString($_POST['allergy']);
    }

    if (empty($_POST['medical_background'])) {
        $error['medical_background'] = 'Veuillez remplir ce champ';
    } else {
        $antecedant = escapeString($_POST['medical_background']);
    }

    if (empty($_POST['children'])) {
        $error['children'] = 'Veuillez remplir ce champ';
    } elseif ($_POST['children'] < 0) {
        $error['children'] = 'Veuillez entrer un nombre valide';
    } else {
        $children = escapeString($_POST['children']);
    }

    if (empty($_POST['marital_status'])) {
        $error['marital_status'] = 'Faîtes un choix';
    } else {
        $marital = escapeString($_POST['marital_status']);
    }

    if (empty($_POST['profession'])) {
        $error['profession'] = 'Veuillez entrer votre profession';
    } else {
        $profession = escapeString($_POST['profession']);
    }

    if (empty($_POST['pseudo']) || strlen($_POST['pseudo']) < 4) {
        $error['pseudo'] = "Veuillez entrer un pseudo d'au moins 4 caractères";
    } elseif (pseudoExists($_POST['pseudo'])) {
        $error['pseudo'] = "Cet pseudo existe déja, veuillez en choisr un autre";
    } else {
        $pseudo = escapeString($_POST['pseudo']);
    }

    if (empty($_POST['password']) || strlen($_POST['password']) < 6) {
        $error['password'] = "Veuillez entrer un mot de passe d'au moins 6 caractères";
    } else {
        $password = pass_crypt($_POST['password']);
    }

    if (
        !empty($fname)
        && !empty($lname)
        && !empty($birth)
        && !empty($contact)
        && !empty($sexe)
        && !empty($email)
        && !empty($pseudo)
        && !empty($password)
        && !empty($emergency)
        && !empty($profession)
        && !empty($marital)
        && !empty($children)
        && !empty($weight)
        && !empty($height)
        && !empty($blood)
        && !empty($allergy)
        && !empty($antecedant)
    ) {
        if (userRegister(
            $fname,
            $lname,
            $birth,
            $contact,
            $sexe,
            $email,
            $pseudo,
            $password,
            $emergency,
            $profession,
            $marital,
            $children,
            $weight,
            $height,
            $blood,
            $allergy,
            $antecedant,
            $picture
        )) {
            $success = true;
        } else {
            $error['sqlError'] = "Impossible d'inserer les données pour l'instant... Veuillez réessayez plus tard";
        };
    }
}
?>
    <h1 class='text-center'>AJOUTER UN NOUVEL UTILISATEUR</h1>
    <?php if (!$success) : ?>
        <form action="" method="post" autocomplete="off" class="" >
            <div class="row py-1" style="margin:2em auto;padding:1em; background-color:white;overflow:auto;">
                <div class="col-md-8 col-lg-5 p-2 m-2" >
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
                            <label for="contact">Contact</label>
                            <input class="form-control" type="tel" name="contact" id="contact" value="<?php if (isset($contact)) echo $contact; ?>">
                            <?php if (isset($error['contact'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['contact']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="sexe">Sexe</label>
                            <select name="sexe" id="sexe" class="form-control">
                                <option value="">--</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                                <option value="Autre">Autre</option>
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
                    <legend>Information d'ordre personnel</legend>
                    <div class="form-group">
                        <label for="emergency_contact">En cas d'urgence</label>
                        <input class="form-control" type="tel" name="emergency_contact" id="emergency_contact" value="<?php if (isset($emergency)) echo $emergency; ?>">
                        <?php if (isset($error['emergency_contact'])) : ?>
                            <p class="alert-danger rounded-2 p-1"><?php echo  $error['emergency_contact']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="profession">Profession</label>
                        <small>Si vous n'en avez pas renseigner "Aucun"</small>
                        <input class="form-control" type="text" name="profession" id="profession" value="<?php if (isset($profession)) echo $profession; ?>">
                        <?php if (isset($error['profession'])) : ?>
                            <p class="alert-danger rounded-2 p-1"><?php echo  $error['profession']; ?></p>
                        <?php endif; ?>
                    </div>
                        <div class="form-group">
                            <label for="marital_status">Situation matrimonial</label>
                            <select name="marital_status" id="marital_status" class="form-control">
                                <option value="">--</option>
                                <option value="Célibataire">Célibataire</option>
                                <option value="Mariée">Mariée</option>
                                <option value="Veuve">Veuve</option>
                                <option value="Divorcée">Divorcée</option>
                            </select>
                            <?php if (isset($error['marital_status'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['marital_status']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="children">Enfant</label>
                            <input class="form-control" type="number" name="children" id="children" value="<?php if (isset($children)) echo $children; ?>">
                            <?php if (isset($error['children'])) : ?>
                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['children']; ?></p>
                            <?php endif; ?>
                        </div>

                </div>

                <div class="col-md-8 col-lg-8 p-2">
                    <div class="form-group">
                        <label for="weight">Poids en kg</label>
                        <input class="form-control" type="number" name="weight" id="weight" value="<?php if (isset($weight)) echo $weight; ?>">
                        <?php if (isset($error['weight'])) : ?>
                            <p class="alert-danger rounded-2 p-1"><?php echo  $error['weight']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="height">Taille en cm</label>
                        <input class="form-control" type="number" name="height" id="height" value="<?php if (isset($height)) echo $height; ?>">
                        <?php if (isset($error['height'])) : ?>
                            <p class="alert-danger rounded-2 p-1"><?php echo  $error['height']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="col form-group">
                        <label for="blood">Groupe sanguin</label>
                        <select name="blood" id="blood" class="form-control">
                            <option value="">--</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                        <?php if (isset($error['blood'])) : ?>
                            <p class="alert-danger rounded-2 p-1"><?php echo  $error['blood']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col form-group">
                        <label for="allergy">Allergie</label>
                        <small>Veuillez notez toutes vos allergies, si vous n'en avez pas renseigner "Aucun"</small>
                        <textarea class="form-control" type="text" name="allergy" id="allergy"><?php if (isset($allergy)) echo $allergy; ?></textarea>
                        <?php if (isset($error['allergy'])) : ?>
                            <p class="alert-danger rounded-2 p-1"><?php echo  $error['allergy']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="col form-group">
                        <label for="medical_background">Antécédants médicales</label>
                        <small>Veuillez notez tous vos antécédants, si vous n'en avez pas renseigner "Aucun"</small>
                        <textarea class="form-control" type="text" name="medical_background" id="medical_background"><?php if (isset($antecedant)) echo $antecedant; ?></textarea>
                        <?php if (isset($error['medical_background'])) : ?>
                            <p class="alert-danger rounded-2 p-1"><?php echo  $error['medical_background']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-success mb-2" name="register" value="Enregistrer">
        </form>
    <?php else : ?>
        <h1 class="text-center alert-success"> Enregistrement éffectué</h1>
        <a href="./users.php" class="btn btn-primary">Retour</a>
    <?php endif; ?>

