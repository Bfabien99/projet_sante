<?php
$doctor = getUserbyId($_GET["p_id"]);

if (!$doctor) {
    echo "<h4 class='alert alert-warning'>Le patient n'est pas reconnu</h4>";
    echo "<p><a class='btn btn-secondary' href='./user.php'>Retour</a></p>";
} else {
    $allergies = getAllergy($doctor['id']);
    $antecedants = getAntecedant($doctor['id']);
?>
    <div class="row">
        <div class="col-12 col-lg-12" style="padding:2em;">
            <div class="col-12">
                <div class="col-12 col-lg-6" style="display:flex;flex-direction:column;align-items:center;gap:1em">
                    <img style="max-height: 300px;" src="./../profiles/<?php echo $doctor['picture']; ?>" alt="<?php echo $doctor['first_name'] . "_" . $doctor['last_name']; ?>">
                    <a href="" class="btn btn-success">Voir carnet</a>
                </div>
                <div class="col-12 col-lg-6">
                    <table class="table" style="word-wrap: break-word;">
                        <tr class="text-uppercase">
                            <td>
                                <h5 class="text-bold">Nom :</h5>
                            </td>
                            <td>
                                <h4><?php echo $doctor['first_name']; ?></h4>
                            </td>
                        </tr>
                        <tr class="text-uppercase">
                            <td>
                                <h5 class="text-bold">Prenoms :</h5>
                            </td>
                            <td>
                                <h4><?php echo $doctor['last_name']; ?></h4>
                            </td>
                        </tr>
                        <tr class="text-uppercase">
                            <td>
                                <h5 class="text-bold">Née le :</h5>
                            </td>
                            <td>
                                <h4><?php echo $doctor['birth']; ?></h4>
                            </td>
                        </tr>
                        <tr class="text-uppercase">
                            <td>
                                <h5 class="text-bold">Sex :</h5>
                            </td>
                            <td>
                                <h4><?php echo $doctor['sexe']; ?></h4>
                            </td>
                        </tr>
                        <tr class="text-uppercase">
                            <td>
                                <h5 class="text-bold">Contact :</h5>
                            </td>
                            <td>
                                <h4><?php echo $doctor['contact']; ?></h4>
                            </td>
                        </tr>
                        <tr class="text-uppercase">
                            <td>
                                <h5 class="text-bold">Groupe Sanguin :</h5>
                            </td>
                            <td>
                                <h4><?php echo $doctor['blood']; ?></h4>
                            </td>
                        </tr>
                        <tr class="text-uppercase">
                            <td>
                                <h5 class="text-bold">Nombre d'enfant:</h5>
                            </td>
                            <td>
                                <h4><?php echo $doctor['children']; ?></h4>
                            </td>
                        </tr>
                        <tr class="text-uppercase">
                            <td>
                                <h5 class="text-bold">Situation Matrimoniale :</h5>
                            </td>
                            <td>
                                <h4><?php echo $doctor['marital_status']; ?></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-12 patient_block_bottom">
                <div class="col-12 col-lg-6 text-center">
                    <h4 class="text-uppercase">Allergie</h4>
                    <ul class="list-group list-group-flush">
                    <?php foreach($allergies as $allergy):?>
                    <li class="list-group-item"><h5><?php echo $allergy ?></h5></li>
                    <?php endforeach;?>
                    </ul>
                </div>
                <div class="col-12 col-lg-6 text-center">
                    <h4 class="text-uppercase">Antécédant</h4>
                    <ul class="list-group list-group-flush">
                    <?php foreach($antecedants as $antecedant):?>
                    <li class="list-group-item"><h5><?php echo $antecedant ?></h5></li>
                    <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php } ?>