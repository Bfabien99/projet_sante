<?php
if (!$user) {
    echo "<div class=''><h1 class='error-box'>404, PAGE NOT FOUND</h1>";
    echo "<p><a class='btn btn-danger' href='./'>Retour</a></p></div>";
} else {
    $carnets = getUserCarnet($user['id']);
    if(!$carnets){
        echo "<h4 class=''>Aucun résultat</h4>";
        echo "<p><a class='btn btn-danger' href='./'>Retour</a></p>";
    }else{
?>
    <h3 class="text-center text-uppercase my-4">Liste des consultations effectuées</h3>
    <div class="row gap-4">
        <?php foreach($carnets as $carnet):?>
            <?php $doctor = getDoctorbyId($carnet['doctor_id']); ?>
        <div class="col-md-12 col-lg-3 bg-white shadow rounded border-top border-3 border-primary" style="max-width:300px">
            <div class="rounded">
                <p class="text-center text-muted"><i class="fa fa-file-medical-alt"></i> Résultats du <?php echo date("Y-m-d",strtotime($carnet['date'])); ?></p>
                <hr>
                <div class="row">
                                <img class="col img-fluid rounded" src="./../profiles/<?php echo $doctor['picture']?>" style="max-width:100px;max-height:100px">
                                <div class="col d-flex flex-column justify-content-evenly">
                                    <h5 class="text-uppercase"><?php echo $doctor['first_name'] . " ". $doctor['last_name']?></h5>
                                    <p class="fst-italic text-primary"><?php echo $doctor['fonction']?></p>
                                </div>
                            </div>
                <a class="btn btn-primary m-2" href="./carnet.php?c_id=<?php echo $carnet['id']?>">Voir</a>
            </div>
        </div>
            <?php endforeach;?>
    </div>

<?php }}?>