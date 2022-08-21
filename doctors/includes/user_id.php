<?php
$doctor = getUserbyId($_GET["p_id"]);

if (!$doctor) {
    echo "<h4 class='alert alert-warning'>Le patient n'est pas reconnu</h4>";
    echo "<p><a class='btn btn-secondary' href='./user.php'>Retour</a></p>";
} else {
    $allergies = getAllergy($doctor['id']);
    $antecedants = getAntecedant($doctor['id']);
?>
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-8" style="background-color: #fff;padding:2em ;">
            <div class="col-12">
                <div class="col-12 col-lg-6 d-flex justify-content-center">
                    <img style="max-height: 300px;" src="./../profiles/<?php echo $doctor['picture']; ?>" alt="<?php echo $doctor['first_name'] . "_" . $doctor['last_name']; ?>">
                </div>
                <div class="col-12 col-lg-6">
                    <table class="table" style="word-wrap: break-word;">
                        <tr class="text-uppercase">
                            <td>
                                <h3 class="text-bold">Nom :</h3>
                            </td>
                            <td>
                                <h2><?php echo $doctor['first_name']; ?></h2>
                            </td>
                        </tr>
                        <tr class="text-uppercase">
                            <td>
                                <h3 class="text-bold">Prenoms :</h3>
                            </td>
                            <td>
                                <h2><?php echo $doctor['last_name']; ?></h2>
                            </td>
                        </tr>
                        <tr class="text-uppercase">
                            <td>
                                <h3 class="text-bold">Née le :</h3>
                            </td>
                            <td>
                                <h2><?php echo $doctor['birth']; ?></h2>
                            </td>
                        </tr>
                        <tr class="text-uppercase">
                            <td>
                                <h3 class="text-bold">Sex :</h3>
                            </td>
                            <td>
                                <h2><?php echo $doctor['sexe']; ?></h2>
                            </td>
                        </tr>
                        <tr class="text-uppercase">
                            <td>
                                <h3 class="text-bold">Contact :</h3>
                            </td>
                            <td>
                                <h2><?php echo $doctor['contact']; ?></h2>
                            </td>
                        </tr>
                        <tr class="text-uppercase">
                            <td>
                                <h3 class="text-bold">Groupe Sanguin :</h3>
                            </td>
                            <td>
                                <h2><?php echo $doctor['blood']; ?></h2>
                            </td>
                        </tr>
                        <tr class="text-uppercase">
                            <td>
                                <h3 class="text-bold">Nombre d'enfant:</h3>
                            </td>
                            <td>
                                <h2><?php echo $doctor['children']; ?></h2>
                            </td>
                        </tr>
                        <tr class="text-uppercase">
                            <td>
                                <h3 class="text-bold">Situation Matrimoniale :</h3>
                            </td>
                            <td>
                                <h2><?php echo $doctor['marital_status']; ?></h2>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="col-12 text-center col-lg-6">
                    <h3 class="text-uppercase">Allergie</h3>
                    <ul>
                    <?php foreach($allergies as $allergy):?>
                    <li><h4><?php echo $allergy ?></h4></li>
                    <?php endforeach;?>
                    </ul>
                </div>
                <div class="col-12 text-center col-lg-6">
                    <h3 class="text-uppercase">Antécédant</h3>
                    <ul>
                    <?php foreach($antecedants as $antecedant):?>
                    <li><h4><?php echo $antecedant ?></h4></li>
                    <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php } ?>