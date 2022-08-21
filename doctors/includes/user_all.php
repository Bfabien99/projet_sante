<h1 class="text-center">Docteur enregistré</h1>
<div class="row">
    <?php
    $users = getAllUser();
    if ($users) {
        foreach ($users as $user) {
    ?>
            <div class="col-md-6 col-lg-3 box-shadow" style="margin:2em 0;">
                <div class="card" style="padding:2em;">
                    <img src="./../profiles/<?php echo $user['picture'] ?>" alt="<?php echo $user['first_name'] . "_" . $user['last_name'] ?>" style="max-width:100px">
                    <h4 class="card-title text-uppercase"><?php echo $user['first_name'] . "_" . $user['last_name']; ?></h4>
                    <hr>
                    <div class="card-body">
                    <h5><?php echo $user['blood'] ?></h5>
                    <hr>
                    <h5><?php echo $user['profession'] ?></h5>
                    <h6><?php echo $user['marital_status'] ?> années d'expérience</h6>
                    </div>
                    <a href="?p_id=<?php echo $user['id'] ?>" class="btn btn-primary">details</a>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p class="h4 text-muted">Aucun docteur pour l'instant</p>
    <?php } ?>
</div>