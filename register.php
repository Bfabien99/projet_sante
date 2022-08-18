<?php
include('includes/header.php');
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
                </div>
                <div class="form-group">
                    <label for="last_name">Prénoms</label>
                    <input class="form-control" type="text" name="last_name" id="last_name">
                </div>
                <div class="form-group">
                    <label for="birth">Date de naissance</label>
                    <input class="form-control" type="date" name="birth" id="birth">
                </div>
                <div class="row">
                    <div class="col form-group">
                        <label for="contact">Contact</label>
                        <input class="form-control" type="tel" name="contact" id="contact">
                    </div>
                    <div class="col form-group">
                        <label for="sexe">Sexe</label>
                        <select name="sexe" id="sexe" class="form-control">
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-lg-5 p-2 m-2">
                <legend>Information de connexion</legend>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="pseudo">Pseudonyme</label>
                    <input class="form-control" type="text" name="pseudo" id="pseudo">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
            </div>

            <div class="col-md-8 col-lg-8 p-2">
                <legend>Information d'ordre personnel</legend>
                <div class="form-group">
                    <label for="emergency_contact">En cas d'urgence</label>
                    <input class="form-control" type="tel" name="emergency_contact" id="emergency_contact">
                </div>
                <div class="form-group">
                    <label for="profession">Profession</label>
                    <input class="form-control" type="text" name="profession" id="profession">
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
                    </div>
                    <div class="col form-group">
                        <label for="children">Enfant</label>
                        <input class="form-control" type="number" name="children" id="children">
                    </div>
                </div>

            </div>

            <div class="col-md-8 col-lg-8 p-2">
                <div class="form-group">
                    <label for="weight">Poids en kg</label>
                    <input class="form-control" type="number" name="weight" id="weight">
                </div>
                <div class="form-group">
                    <label for="height">Taille en cm</label>
                    <input class="form-control" type="number" name="height" id="height">
                </div>

                <div class="col form-group">
                    <label for="blood">Groupe sanguin</label>
                    <select name="blood" id="blood" class="form-control">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>
                <div class="col form-group">
                    <label for="allergy">Allergie</label>
                    <small>Veuillez notez toutes vos allergies</small>
                    <textarea class="form-control" type="text" name="allergy" id="allergy"></textarea>
                </div>
                <div class="col form-group">
                    <label for="medical_background">Antécédants médicales</label>
                    <small>Veuillez notez tous vos antécédants</small>
                    <textarea class="form-control" type="text" name="medical_background" id="medical_background"></textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success mb-2">S'enregistrer</button>
    </form>
</div>
<?php
include('includes/footer.php');
?>