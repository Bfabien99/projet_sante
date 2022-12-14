<?php
include('includes/header.php');

if ($user) {
    $id = $user['id'];
    $fname = $user['first_name'];
    $lname = $user['last_name'];
    $birth = $user['birth'];
    $contact = $user['contact'];
    $sexe = $user['sexe'];
    $email = $user['email'];
    $pseudo = $user['pseudo'];
    $emergency = $user['emergency_contact'];
    $profession = $user['profession'];
    $marital = $user['marital_status'];
    $children = $user['children'];
    $weight = $user['weight'];
    $height = $user['height'];
    $blood = $user['blood'];
    $allergy = $user['allergy'];
    $antecedant = $user['medical_background'];
    $picture = $user['picture'];
    $created = $user['created'];
}

$_sexes = ['Homme' => 'Masculin', 'Femme' => 'Feminin', 'Autre' => 'Autre'];
$_bloods = ['A', 'B', 'AB', 'O'];
$_statuts = ['Célibataire', 'Mariée', 'Veuve', 'Divorcée'];
$success = false;
$error = [];

if (isset($_POST['register'])) {
    if (empty(trim($_POST['first_name']))) {
        $error['first_name'] = 'Veuillez entrer votre nom';
    } else {
        $fname = escapeString($_POST['first_name']);
    }

    if (empty(trim($_POST['last_name']))) {
        $error['last_name'] = 'Veuillez entrer un Prénom';
    } else {
        $lname = escapeString($_POST['last_name']);
    }

    if (empty(trim($_POST['birth']))) {
        $error['birth'] = 'Veuillez entrer votre date de naissance';
    } else {
        $birth = escapeString($_POST['birth']);
    }

    if (empty(trim($_POST['contact']))) {
        $error['contact'] = 'Veuillez entrer un contact valide';
    } else {
        $contact = escapeString(filter_var($_POST['contact'], FILTER_SANITIZE_NUMBER_INT));
    }

    if (empty(trim($_POST['emergency_contact']))) {
        $error['emergency_contact'] = 'Veuillez entrer un contact valide';
    } else {
        $emergency = escapeString(filter_var($_POST['emergency_contact'], FILTER_SANITIZE_NUMBER_INT));
    }

    if (empty(trim($_POST['email'])) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'Veuillez entrer une adresse email valide';
    } elseif ($_POST['email'] != $email) {
        $email="";
        if (emailExists($_POST['email'])) {
            $error['email'] = "Cet email existe déja, veuillez en choisir un autre";
        } else {
            $email = escapeString($_POST['email']);
            $_SESSION['hp_user_email'] = $email;
        }
    }

    if (empty(trim($_POST['sexe']))) {
        $error['sexe'] = 'Faîtes un choix';
    } else {
        if ($_POST['sexe'] == "Femme") {
            $picture = "patientf.png";
        } else {
            $picture = "patient.png";
        }
        $sexe = escapeString($_POST['sexe']);
    }

    if (!empty($_FILES['profile'])) {
        $picture = cleanFile('profile');
    }


    if (empty(trim($_POST['weight']))) {
        $error['weight'] = 'Veuillez entrer votre poids en kg';
    } elseif ($_POST['weight'] < 0) {
        $error['weight'] = 'Veuillez entrer un nombre valide';
    } else {
        $weight = escapeString($_POST['weight']);
    }

    if (empty(trim($_POST['height']))) {
        $error['height'] = 'Veuillez entrer votre taille en cm';
    } elseif ($_POST['height'] < 0) {
        $error['height'] = 'Veuillez entrer un nombre valide';
    } else {
        $height = escapeString($_POST['height']);
    }

    if (empty(trim($_POST['blood']))) {
        $error['blood'] = 'Veuillez choisir votre groupe sanguin';
    } else {
        $blood = escapeString($_POST['blood']);
    }

    if (empty(trim($_POST['allergy']))) {
        $error['allergy'] = 'Veuillez remplir ce champ';
    } else {
        $allergy = escapeString($_POST['allergy']);
    }

    if (empty(trim($_POST['medical_background']))) {
        $error['medical_background'] = 'Veuillez remplir ce champ';
    } else {
        $antecedant = escapeString($_POST['medical_background']);
    }

    if (!isset($_POST['children'])) {
        $error['children'] = 'Veuillez remplir ce champs';
    } elseif ($_POST['children'] < 0) {
        $error['children'] = 'Veuillez entrer un nombre valide';
    } else {
        $children = escapeString($_POST['children']);
    }

    if (empty(trim($_POST['marital_status']))) {
        $error['marital_status'] = 'Faîtes un choix';
    } else {
        $marital = escapeString($_POST['marital_status']);
    }

    if (empty(trim($_POST['profession']))) {
        $error['profession'] = 'Veuillez entrer votre profession';
    } else {
        $profession = escapeString($_POST['profession']);
    }

    if (empty(trim($_POST['pseudo'])) || strlen($_POST['pseudo']) < 4) {
        $error['pseudo'] = "Veuillez entrer un pseudo d'au moins 4 caractères";
    } elseif ($_POST['pseudo'] != $pseudo) {
        if (pseudoExists($_POST['pseudo'])) {
            $error['pseudo'] = "Cet pseudo existe déja, veuillez en choisr un autre";
        } else {
            $pseudo = escapeString($_POST['pseudo']);
            $_SESSION['hp_user_pseudo'] = $pseudo;
        }
    }

    if (!empty(trim($_POST['password'])) && strlen($_POST['password']) < 6) {
        $error['password'] = "Veuillez entrer un mot de passe d'au moins 6 caractères";
    } elseif (!empty(trim($_POST['password'])) && strlen($_POST['password']) >= 6) {
        $password = pass_crypt($_POST['password']);
    } else {
        $password = $user['password'];
    }

    $image = $picture ?? getUserPicture($id);
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
        && !empty($weight)
        && !empty($height)
        && !empty($blood)
        && !empty($allergy)
        && !empty($antecedant)
    ) {
        if (userUpdate(
            $id,
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
            $image
        )) {
            if (!file_exists("../profiles/$image")) {
                move_uploaded_file($_FILES['profile']['tmp_name'], '../profiles/' . $picture);
            }
            $success = true;
        } else {
            $error['sqlError'] = "Impossible d'inserer les données pour l'instant... Veuillez réessayez plus tard";
        };
    }
}
?>
<div class="row flex-lg-nowrap">
    <?php if (!$success) : ?>
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="row">
                                    <div class="col-12 col-sm-auto mb-3">
                                        <div class="mx-auto" style="width: 140px;">
                                            <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                <img src="./../profiles/<?php echo $picture ?>" alt="" class="rounded-circle img-fluid" style="width: 140px;height:140px;object-fit:contain;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap text-capitalize"><?php echo $fname . " " . $lname ?></h4>
                                            <p class="mb-0">@<?php echo $pseudo ?></p>
                                            <div class="text-muted"><small><?php echo $marital ?> - <?php echo $blood ?></small></div>
                                        </div>
                                        <div class="text-center text-sm-right">
                                            <div class="text-muted"><small>Inscrit le <?php echo date('d-m-Y', strtotime($created)) ?></small></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">
                                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                                            <label for="profile">Changer d'image</label>
                                            <input class="btn btn-primary" type="file" name="profile" id="profile">
                                            <div class="row py-1">
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
                                                    <div class="row">
                                                        <div class="col form-group">
                                                            <label for="contact">Contact</label>
                                                            <input class="form-control" type="tel" name="contact" id="contact" value="<?php if (isset($contact)) echo $contact; ?>">
                                                            <?php if (isset($error['contact'])) : ?>
                                                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['contact']; ?></p>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="col form-group">
                                                            <label for="sexe">Genre</label>
                                                            <select name="sexe" id="sexe" class="form-control">
                                                                <?php foreach ($_sexes as $key => $_sexe) : ?>
                                                                    <?php if ($sexe == $key) : ?>
                                                                        <option selected value="<?php echo $key ?>"><?php echo $_sexe ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?php echo $_sexe ?>"><?php echo $_sexe ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?php if (isset($error['sexe'])) : ?>
                                                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['sexe']; ?></p>
                                                            <?php endif; ?>
                                                        </div>
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
                                                    <div class="row">
                                                        <div class="col form-group">
                                                            <label for="marital_status">Situation matrimonial</label>
                                                            <select name="marital_status" id="marital_status" class="form-control">
                                                                <?php foreach ($_statuts as $_statut) : ?>
                                                                    <?php if ($marital == $_statut) : ?>
                                                                        <option selected value="<?php echo $_statut ?>"><?php echo $_statut ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?php echo $_statut ?>"><?php echo $_statut ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?php if (isset($error['marital_status'])) : ?>
                                                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['marital_status']; ?></p>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="col form-group">
                                                            <label for="children">Enfant</label>
                                                            <input class="form-control" type="number" name="children" id="children" value="<?php if (isset($children)) echo $children; ?>" min="0">
                                                            <?php if (isset($error['children'])) : ?>
                                                                <p class="alert-danger rounded-2 p-1"><?php echo  $error['children']; ?></p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-8 col-lg-8 p-2">
                                                    <div class="form-group">
                                                        <label for="weight">Poids en kg</label>
                                                        <input class="form-control" type="number" name="weight" id="weight" value="<?php if (isset($weight)) echo $weight; ?>" min="0">
                                                        <?php if (isset($error['weight'])) : ?>
                                                            <p class="alert-danger rounded-2 p-1"><?php echo  $error['weight']; ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="height">Taille en cm</label>
                                                        <input class="form-control" type="number" name="height" id="height" value="<?php if (isset($height)) echo $height; ?>" min="0">
                                                        <?php if (isset($error['height'])) : ?>
                                                            <p class="alert-danger rounded-2 p-1"><?php echo  $error['height']; ?></p>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="col form-group">
                                                        <label for="blood">Groupe sanguin</label>
                                                        <select name="blood" id="blood" class="form-control">
                                                            <?php foreach ($_bloods as $_blood) : ?>
                                                                <?php if ($blood == $_blood) : ?>
                                                                    <option selected value="<?php echo $_blood ?>"><?php echo $_blood ?></option>
                                                                <?php else : ?>
                                                                    <option value="<?php echo $_blood ?>"><?php echo $_blood ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?php if (isset($error['blood'])) : ?>
                                                            <p class="alert-danger rounded-2 p-1"><?php echo  $error['blood']; ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="allergy">Allergie</label>
                                                        <small class="text-muted">Veuillez notez toutes vos allergies chacunes séparées d'une virgule, si vous n'en avez pas renseigner "Aucun"</small>
                                                        <textarea class="form-control" type="text" name="allergy" id="allergy"><?php if (isset($allergy)) echo $allergy; ?></textarea>
                                                        <?php if (isset($error['allergy'])) : ?>
                                                            <p class="alert-danger rounded-2 p-1"><?php echo  $error['allergy']; ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col form-group">
                                                        <label for="medical_background">Antécédants médicales</label>
                                                        <small class="text-muted">Veuillez notez tous vos antécédants chacuns séparés d'une virgule, si vous n'en avez pas renseigner "Aucun"</small>
                                                        <textarea class="form-control" type="text" name="medical_background" id="medical_background"><?php if (isset($antecedant)) echo $antecedant; ?></textarea>
                                                        <?php if (isset($error['medical_background'])) : ?>
                                                            <p class="alert-danger rounded-2 p-1"><?php echo  $error['medical_background']; ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="submit" class="btn btn-success mb-2" name="register" value="Modifier">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php else : ?>
        <p class="success-box"> Modification éffectuée</p>
        <p><a href="./" class="btn btn-primary">Retour</a></p>
    <?php endif; ?>
</div>
<script>

    $('#password').on('dblclick', function(){
        if($('#password').attr('type') == "password"){
           $('#password').attr('type','text'); 
        }else{
            $('#password').attr('type','password');
        }
        
    })
</script>
<?php
include('includes/footer.php');
?>