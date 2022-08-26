<?php
$user = getuserbyId(escapeString($_GET["pc_id"]));

if (!$user) {
    echo "<h4 class='error-box'>404, PAGE NOT FOUND</h4>";
    echo "<p><a class='btn btn-danger' href='./'>Retour</a></p>";
} else {
    $carnets = getUserCarnet_doctor($user['id'],$doctor['id']);
    if(!$carnets){
        echo "<h4 class='error-box'>Aucun carnet pour ce patient</h4>";
        echo "<p><a class='btn btn-danger' href='./user.php?p_id=".$user['id']."'>Retour</a></p>";
    }else{
?>
    <div class="row">
        <?php foreach($carnets as $carnet):?>
        <div class="col-md-12 col-lg-3">
            <div class="rounded">
                <small>résultats de la consultation du <?php echo date("Y-m-d",strtotime($carnet['date'])) . " à ". date("H:i",strtotime($carnet['date'])); ?></small>
                <hr>
                <p>Patient : <?php echo $user['first_name'] ." ". $user['last_name'];; ?></p>
                <a href="./carnet.php?c_id=<?php echo $carnet['id']?>">Voir</a>
            </div>
        </div>
            <?php endforeach;?>
    </div>

<?php }}?>