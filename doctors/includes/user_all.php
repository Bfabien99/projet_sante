<h1 class="text-center">Patients consultés</h1>
<div class="row">
    <?php
    $users = getAllUser();
    if ($users) {
        foreach ($users as $user) {
    ?>
            <div class="col-md-6 col-lg-3 box-shadow" style="margin:2em 0;">
                <div class="card">
                <h5 class="alert-danger" id="blood"><?php echo $user['blood'] ?></h5>
                    <img src="./../profiles/<?php echo $user['picture'] ?>" alt="<?php echo $user['first_name'] . "_" . $user['last_name'] ?>" style="max-width:100%">
                    <div class="card-body">
                        <h4 class="card-title text-uppercase text-primary"><?php echo $user['first_name'] . " " . $user['last_name']; ?></h4>
<a href="?p_id=<?php echo $user['id'] ?>" class="btn btn-primary">details</a>
                    </div>
                    
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p class="h4 text-muted">Aucun docteur pour l'instant</p>
    <?php } ?>
</div>