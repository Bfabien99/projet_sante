<?php
$user = getuserbyId(escapeString($_GET["pc_id"]));

if (!$user) {
    echo "<div class=''><h1 class='error-box'>404, PAGE NOT FOUND</h1>";
    echo "<p><a class='btn btn-danger' href='./'>Retour</a></p></div>";
} else {
    $carnets = getUserCarnet_doctor($user['id'], $doctor['id']);
    if (!$carnets) {
        echo "<div class=''><h4 class='error-box'>Aucun carnet pour ce patient</h4>";
        echo "<p><a class='btn btn-danger' href='./user.php?p_id=" . $user['id'] . "'>Retour</a></p></div>";
    } else {
?>
        <h3 class="text-center text-uppercase my-4">Liste des consultations effectuées</h3>
        <div class="row g-2 d-flex justify-content-center">
            <?php foreach ($carnets as $carnet) : ?>
                <div class="col-md-12 col-lg-4 bg-white shadow rounded border-top border-3 border-primary m-1" style="max-width:300px" data-aos="fade-up">
                    <div class="rounded">
                        <p class="text-center text-muted"><i class="fa fa-file-medical-alt"></i> Résultats du <?php echo date("Y-m-d", strtotime($carnet['date'])); ?></p>
                        <hr>
                        <div class="row">
                            <img class="col img-fluid rounded" src="./../profiles/<?php echo $user['picture'] ?>" style="max-width:100px;max-height:100px">
                            <div class="col d-flex flex-column justify-content-evenly">
                                <h5 class="text-uppercase"><?php echo $user['first_name'] . " " . $user['last_name'] ?></h5>
                                <p class="fst-italic text-primary"><?php echo $user['profession'] ?></p>
                            </div>
                        </div>
                        <a class="btn btn-primary m-2" href="./carnet.php?c_id=<?php echo $carnet['id'] ?>">Voir</a>

                    </div>
                </div>
            <?php endforeach; ?>

    <?php }
} ?>