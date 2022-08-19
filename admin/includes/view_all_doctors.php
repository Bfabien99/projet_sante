<?php
if (empty($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}
?>
<h1>Docteur enregistré</h1>
<div class="row">
    <?php
    $doctors = getAllDoctor();
    foreach ($doctors as $doctor) {
    ?>
        <div class="col-lg-4 col-md-6">
            <div class="card" style="border: 1px solid lightgrey;margin:2em 0;">
                <div class="img-top">
                    <img class="img-responsive" src="./../profiles/<?php echo $doctor['picture'] ?>" alt="<?php echo $doctor['first_name'] . "_" . $doctor['last_name'] ?>" style="width:100px;">
                </div>
                <div class="card-body">
                    <h4 class="text-secondary"><?php echo $doctor['first_name'] . " " . $doctor['last_name'] ?></h4>
                    <h4 class="alert alert-info"><?php echo $doctor['fonction'] ?></h4>
                </div>
                <a href="?pseudo=<?php echo $doctor['pseudo'] ?>">
                    <div class="panel-footer">
                        <span class="pull-left">Voir detail</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    <?php } ?>
</div>