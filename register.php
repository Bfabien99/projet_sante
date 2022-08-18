<?php
include('includes/header.php');

$error = [];
if(isset($_POST['register'])){
    if(empty($_POST['first_name'])){
        $error['first_name'] = 'Veuillez entrer votre nom';
    }
    if(empty($_POST['last_name'])){
        $error['last_name'] = 'Veuillez entrer un Prénom';
    }
    if(empty($_POST['birth'])){
        $error['birth'] = 'Veuillez entrer votre date de naissance';
    }
    if(empty($_POST['contact'])){
        $error['contact'] = 'Veuillez entrer un contact valide';
    }
    if(empty($_POST['emergency_contact'])){
        $error['emergency_contact'] = 'Veuillez entrer un contact valide';
    }
    if(empty($_POST['email'])){
        $error['email'] = 'Veuillez entrer votre adresse email valide';
    }
    if(empty($_POST['sexe'])){
        $error['sexe'] = 'Faîtes un choix';
    }
    if(empty($_POST['weight'])){
        $error['weight'] = 'Veuillez entrer votre poids en kg';
    }
    if(empty($_POST['height'])){
        $error['height'] = 'Veuillez entrer votre taille en cm';
    }
    if(empty($_POST['blood'])){
        $error['blood'] = 'Veuillez choisir votre groupe sanguin';
    }
    if(empty($_POST['allergy'])){
        $error['allergy'] = 'Veuillez remplir ce champ';
    }
    if(empty($_POST['medical_background'])){
        $error['medical_background'] = 'Veuillez remplir ce champ';
    }
    if(empty($_POST['children'])){
        $error['children'] = 'Veuillez remplir ce champ';
    }
    if(empty($_POST['marital_status'])){
        $error['marital_status'] = 'Faîtes un choix';
    }
    if(empty($_POST['profession'])){
        $error['profession'] = 'Veuillez entrer votre profession';
    }
    if(empty($_POST['pseudo']) || strlen($_POST['pseudo']) < 4){
        $error['pseudo'] = "Veuillez entrer un pseudo d'au moins 4 caractères";
    }
    if(empty($_POST['password'] || strlen($_POST['password']) < 6)){
        $error['password'] = "Veuillez entrer un mot de passe d'au moins 6 caractères";
    }
}
?>
<div class="container">
    <h1 class='text-center'>FORMULAIRE D'ENREGISTREMENT</h1>
    <form action="" method="post">
        <div class="row py-1">
            <div class="col-md-8 col-lg-5 p-2 m-2">
                <legend>Information d'ordre général</legend>
                <div class="form-group">
                    <label for="first_name">Nom</label>
                    <input class="form-control" type="text" name="first_name" id="first_name">
                    <?php if(isset($error['first_name'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['first_name']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="last_name">Prénoms</label>
                    <input class="form-control" type="text" name="last_name" id="last_name">
                    <?php if(isset($error['last_name'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['last_name']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="birth">Date de naissance</label>
                    <input class="form-control" type="date" name="birth" id="birth">
                    <?php if(isset($error['birth'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['birth']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="contact">Contact</label>
                        <input class="form-control" type="tel" name="contact" id="contact">
                        <?php if(isset($error['contact'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['contact']; ?></p>
                    <?php endif; ?>
                    </div>
                    <div class="col form-group">
                        <label for="sexe">Sexe</label>
                        <select name="sexe" id="sexe" class="form-control">
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                            <option value="Autre">Autre</option>
                        </select>
                        <?php if(isset($error['sexe'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['sexe']; ?></p>
                    <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-lg-5 p-2 m-2">
                <legend>Information de connexion</legend>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">
                    <?php if(isset($error['email'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['email']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="pseudo">Pseudonyme</label>
                    <input class="form-control" type="text" name="pseudo" id="pseudo">
                    <?php if(isset($error['pseudo'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['pseudo']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input class="form-control" type="password" name="password" id="password">
                    <?php if(isset($error['password'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['password']; ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-8 col-lg-8 p-2">
                <legend>Information d'ordre personnel</legend>
                <div class="form-group">
                    <label for="emergency_contact">En cas d'urgence</label>
                    <input class="form-control" type="tel" name="emergency_contact" id="emergency_contact">
                    <?php if(isset($error['emergency_contact'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['emergency_contact']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="profession">Profession</label>
                    <small>Si vous n'en avez pas renseigner "Aucun"</small>
                    <input class="form-control" type="text" name="profession" id="profession">
                    <?php if(isset($error['profession'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['profession']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="marital_status">Situation matrimonial</label>
                        <select name="marital_status" id="marital_status" class="form-control">
                            <option value="Célibataire">Célibataire</option>
                            <option value="Mariée">Mariée</option>
                            <option value="Veuve">Veuve</option>
                            <option value="Divorcée">Divorcée</option>
                        </select>
                        <?php if(isset($error['marital_status'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['marital_status']; ?></p>
                    <?php endif; ?>
                    </div>
                    <div class="col form-group">
                        <label for="children">Enfant</label>
                        <input class="form-control" type="number" name="children" id="children">
                        <?php if(isset($error['children'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['children']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <div class="col-md-8 col-lg-8 p-2">
                <div class="form-group">
                    <label for="weight">Poids en kg</label>
                    <input class="form-control" type="number" name="weight" id="weight">
                    <?php if(isset($error['weight'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['weight']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="height">Taille en cm</label>
                    <input class="form-control" type="number" name="height" id="height">
                    <?php if(isset($error['height'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['height']; ?></p>
                    <?php endif; ?>
                </div>

                <div class="col form-group">
                    <label for="blood">Groupe sanguin</label>
                    <select name="blood" id="blood" class="form-control">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                    <?php if(isset($error['blood'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['blood']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="col form-group">
                    <label for="allergy">Allergie</label>
                    <small>Veuillez notez toutes vos allergies, si vous n'en avez pas renseigner "Aucun"</small>
                    <textarea class="form-control" type="text" name="allergy" id="allergy"></textarea>
                    <?php if(isset($error['allergy'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['allergy']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="col form-group">
                    <label for="medical_background">Antécédants médicales</label>
                    <small>Veuillez notez tous vos antécédants, si vous n'en avez pas renseigner "Aucun"</small>
                    <textarea class="form-control" type="text" name="medical_background" id="medical_background"></textarea>
                    <?php if(isset($error['medical_background'])):?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['medical_background']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <input type="submit" class="btn btn-success mb-2" name="register" value="S'enregistrer">
    </form>
</div>
<?php
include('includes/footer.php');
?>