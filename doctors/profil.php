<?php
include('includes/header.php');
?>

<?php

if ($doctor) {
    $id = $doctor['id'];
    $fname = $doctor['first_name'];
    $lname = $doctor['last_name'];
    $birth = $doctor['birth'];
    $fonction = $doctor['fonction'];
    $sexe = $doctor['sexe'];
    $description = $doctor['description'];
    $experience = $doctor['experience'];
    $contact1 = $doctor['contact1'];
    $contact2 = $doctor['contact2'];
    $email = $doctor['email'];
    $pseudo = $doctor['pseudo'];
    $password = $doctor['password'];
    $picture = $doctor['picture'];
    $created = $doctor['created'];
}
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
        if ($_POST['sexe'] == "Femme") {
            $picture = "docteurf.png";
        } else {
            $picture = "docteur.png";
        }
        $sexe = escapeString($_POST['sexe']);
    }

    if (!empty($_FILES['profile'])) {
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

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'Veuillez entrer une adresse email valide';
    } elseif ($_POST['email'] != $email) {
        if (emailExist($_POST['email'])) {
            $error['email'] = "Cet email existe déja, veuillez en choisr un autre";
        } else {
            $email = escapeString($_POST['email']);
            $_SESSION['hp_doctor_email'] = $email;
        }
    }

    if (empty($_POST['sexe'])) {
        $error['sexe'] = 'Faîtes un choix';
    } else {
        $sexe = escapeString($_POST['sexe']);
    }

    if (empty($_POST['pseudo']) || strlen($_POST['pseudo']) < 4) {
        $error['pseudo'] = "Veuillez entrer un pseudo d'au moins 4 caractères";
    } elseif ($_POST['pseudo'] != $pseudo) {
        if (pseudoExist($_POST['pseudo'])) {
            $error['pseudo'] = "Cet pseudo existe déja, veuillez en choisr un autre";
        } else {
            $pseudo = escapeString($_POST['pseudo']);
            $_SESSION['hp_doctor_pseudo'] = $pseudo;
        }
    }

    if (!empty($_POST['password']) && strlen($_POST['password']) < 6) {
        $error['password'] = "Veuillez entrer un mot de passe d'au moins 6 caractères";
    } elseif (!empty($_POST['password']) && strlen($_POST['password']) >= 6) {
        $password = pass_crypt($_POST['password']);
    } else {
        $password = $doctor['password'];
    }

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
        && !empty($email)
        && !empty($pseudo)
        && !empty($password)
    ) {
        if (doctorUpdate(
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
            $email,
            $pseudo,
            $password,
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
                                    </div>
                                    <div class="text-center text-sm-right">
                                        <div class="text-muted"><small>Inscrit le <?php echo date('d M Y',strtotime($doctor['created']))?></small></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content pt-3">
                                <div class="tab-pane active">
                                    <?php if (!$success) : ?>
                                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                                            <label for="profile">Changer d'image</label>
                                            <input class="btn btn-primary" type="file" name="profile" id="profile">
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

                                            <input type="submit" class="btn btn-success mb-2" name="register" value="Modifier">
                                        </form>
                                    <?php else : ?>
                                        <p class="success-box"> Modification éffectuée</p>
                                        <a href="./" class="btn btn-primary">Retour</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include('includes/footer.php');
?>