<h1 class="text-center">Docteur enregistré</h1>
<div class="row">
    <?php
    $doctors = getAllDoctor();
    if ($doctors) {
        foreach ($doctors as $doctor) {
    ?>
            <div class="col-md-6 col-lg-3 box-shadow" style="margin:2em 0;">
                <div class="card" style="padding:2em;">
                    <img src="./../profiles/<?php echo $doctor['picture'] ?>" alt="<?php echo $doctor['first_name'] . "_" . $doctor['last_name'] ?>" style="max-width:100px">
                    <h4 class="card-title text-uppercase"><?php echo $doctor['first_name'] . "_" . $doctor['last_name']; ?></h4>
                    <hr>
                    <div class="card-body">
                    <h5><?php echo $doctor['fonction'] ?></h5>
                    <hr>
                    <h5><?php echo $doctor['description'] ?></h5>
                    <h6><?php echo $doctor['experience'] ?> années d'expérience</h6>
                    </div>
                    <a href="?d_id=<?php echo $doctor['id'] ?>" class="btn btn-primary">details</a>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p class="h4 text-muted">Aucun docteur pour l'instant</p>
    <?php } ?>
</div>