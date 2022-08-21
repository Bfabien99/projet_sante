<?php
$doctor = getDoctorbyId($_GET["d_id"]);

if (!$doctor) {
    echo "<h4 class='alert alert-warning'>Le Docteur n'est pas reconnu</h4>";
    echo "<p><a class='btn btn-secondary' href='./doctor.php'>Retour</a></p>";
} else {
?>
    <div class="row d-flex justify-content-center" >
        <div class="col-12 col-lg-8" style="background-color: #fff;padding:2em ;">
            <div class="col-12">
                <div class="col-12 col-lg-6">
                    <img class="img-responsive" src="./../profiles/<?php echo $doctor['picture']; ?>" alt="<?php echo $doctor['first_name']."_".$doctor['last_name']; ?>">
                    <a href="#" class="btn btn-success">Prendre rendez-vous</a>
                </div>
                <div class="col-12 col-lg-6">
                    <table class="table" style="word-wrap: break-word;">
                    <tr class="text-uppercase"><td><h3 class="text-bold">Nom :</h3></td><td><h2><?php echo $doctor['first_name']; ?></h2></td></tr>
                    <tr class="text-uppercase"><td><h3 class="text-bold">Prenoms :</h3></td><td><h2><?php echo $doctor['last_name']; ?></h2></td></tr>
                    <tr class="text-uppercase"><td><h3 class="text-bold">Experience :</h3></td><td><h2><?php echo $doctor['experience']; ?></h2></td></tr>
                    <tr class="text-uppercase"><td><h3 class="text-bold">Service :</h3></td><td><h2><?php echo $doctor['fonction']; ?></h2></td></tr>
                    </table>
                </div>
            </div>
            <div class="col-12 text-center">
                <h4><?php echo $doctor['description']; ?></h4>
            </div>
        </div>
    </div>

<?php } ?>