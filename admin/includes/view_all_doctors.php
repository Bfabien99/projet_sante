<?php
if (empty($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}
?>
<h1 class="text-center">Docteur enregistré</h1>
<div class="row">
    <?php
    $doctors = getAllDoctor();
    foreach ($doctors as $doctor) {
    ?>
        <div class="col-lg-3 col-md-6">
            <div class="card px-2 box-shadow" style="margin:2em 0;padding:1em; background-color:white;">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="./../profiles/<?php echo $doctor['picture'] ?>" alt="<?php echo $doctor['first_name'] . "_" . $doctor['last_name'] ?>" class="img-responsive" />
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bold text-uppercase"><?php echo $doctor['first_name'] . " " . $doctor['last_name'] ?></h5>
                    <hr class="my-2" />
                    <p class="card-text">
                    <?php echo $doctor['description'] ?>
                    </p>
                    <hr class="my-4" />
                    <p class="lead text-capitalize"><strong><?php echo $doctor['fonction'] ?></strong></p>
                    <a href="?pseudo=<?php echo $doctor['pseudo'] ?>" class="btn btn-primary p-md-1 mb-0">Voir plus</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>