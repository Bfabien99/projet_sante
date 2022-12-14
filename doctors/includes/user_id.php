<?php
$user = getuserbyId($_GET["p_id"]);

if (!$user) {
    echo "<div class=''><h1 class='error-box'>404, PAGE NOT FOUND</h1>";
    echo "<p><a class='btn btn-danger' href='./'>Retour</a></p></div>";
} else {
    $allergies = getAllergy($user['id']);
    $antecedants = getAntecedant($user['id']);
?>
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row" data-aos="fade-down">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-sm-auto mb-3">
                                        <div class="mx-auto" style="width: 140px;">
                                            <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                <img src="./../profiles/<?php echo $user['picture'] ?>" alt="" class="img-fluid" style="width: 140px;height:140px;object-fit:cover;">
                                            </div>
                                            <h6 class="pt-sm-2 pb-1 mb-0 text-nowrap text-uppercase"><?php echo $user['first_name'] ?> <?php echo $user['last_name'] ?></h6>
                                            <small class="text-muted text-center">Inscrit le <?php echo date('d/m/Y', strtotime($user['created'])) ?></small>
                                            <div class="m-2 d-flex flex-column align-items-center g-2">
                                               <a href="carnet.php?pc_id=<?php echo $user['id'] ?>" class="btn btn-primary text-center">Voir carnet</a>
                                            <a href="carnet.php?p_id=<?php echo $user['id'] ?>" class="btn btn-success text-center">Remplir carnet</a> 
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-9 d-flex flex-column flex-sm-row mb-3">
                                        <div class="text-md-center text-sm-right">
                                            <div class="tab-content pt-3">
                                                <div class="tab-pane active">
                                                    <div class="row my-0 mx-auto g-2 d-flex justify-content-around" style="max-width:700px;">
                                                        <legend class="text-center">Information</legend>
                                                        <div class="col-md-12 col-lg-5 p-2 m-2 d-flex flex-column align-items-center" style="margin:0 auto;">
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="first_name">Nom</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $user['first_name'] ?></p>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="last_name">Pr??noms</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $user['last_name'] ?></p>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="birth">Date de naissance</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $user['birth'] ?></p>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="contact1">Contact</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $user['contact'] ?></p>

                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="contact2">En cas d'urgence</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $user['emergency_contact'] ?></p>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="sexe">Sexe</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $user['sexe'] ?></p>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="email">Email</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $user['email'] ?></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 col-lg-5 p-2 m-2 d-flex flex-column align-items-center" style="margin:0 auto;">
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="fonction">Groupe Sanguin</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $user['blood'] ?></p>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="description">Allergies</h6>
                                                                <ul style="width:150px;text-align:justify">
                                                                    <?php foreach ($allergies as $allergy) : ?>
                                                                        <li class="list-item">
                                                                            <?php echo $allergy ?>
                                                                        </li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="experience">Ant??c??dants</h6>
                                                                <ul style="width:150px;text-align:justify">
                                                                    <?php foreach ($antecedants as $antecedant) : ?>
                                                                        <li class="list-item">
                                                                            <?php echo $antecedant ?>
                                                                        </li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php } ?>