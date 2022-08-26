<?php
if (!$user) {
    echo "<h4 class='error-box'>404, PAGE NOT FOUND</h4>";
    echo "<p><a class='btn btn-danger' href='./'>Retour</a></p>";
} else {
    $carnets = getUserCarnet($user['id']);
    if(!$carnets){
        echo "<h4 class='error-box'>Aucun résultat</h4>";
        echo "<p><a class='btn btn-danger' href='./'>Retour</a></p>";
    }else{
?>
    <div class="row">
        <?php foreach($carnets as $carnet):?>
            <?php $doctor = getDoctorbyId($carnet['doctor_id']); ?>
        <div class="col-md-12 col-lg-3">
            <div class="rounded">
                <small>résultats de la consultation du <?php echo date("Y-m-d",strtotime($carnet['date'])); ?></small>
                <hr>
                <p>Docteur : <?php echo $doctor['first_name'] ." ". $doctor['last_name'];; ?></p>
                <a href="./carnet.php?c_id=<?php echo $carnet['id']?>">Voir</a>
            </div>
        </div>
            <?php endforeach;?>
    </div>

<?php }}?>