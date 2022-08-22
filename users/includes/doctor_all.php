<h1 class="text-center">La liste des docteurs</h1>
<div class="row">
    <?php
    $doctors = getAllDoctor();
    if ($doctors) {
        foreach ($doctors as $doctor) {
    ?>
            <div class="col-md-6 col-lg-3" style="margin:2em 0;">
                <div class="card shadow">
                    <h3 class="alert alert-info text-center text-uppercase"><?php echo $doctor['fonction']; ?></h3>
                    <div class="bg-image hover-overlay ripple p-2" data-mdb-ripple-color="light">
                        <img src="./../profiles/<?php echo $doctor['picture']; ?>" class="img-fluid" alt="<?php echo $doctor['first_name'] . "_" . $doctor['last_name']; ?>"/>
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-center"><?php echo $doctor['first_name'] . " " . $doctor['last_name']; ?></h5>
                        <hr>
                        <p class="card-text"><?php echo $doctor['description'] ?></p>
                        <a href="?d_id=<?php echo $doctor['id'] ?>" class="btn btn-primary">details</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p class="h4 text-muted">Aucun docteur pour l'instant</p>
    <?php } ?>
</div>