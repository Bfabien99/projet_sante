<?php
if (empty($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}
?>
    <h1>Utilisateur enregistré</h1>
    <div class="row">
    <?php
        $users = getAllUser();
        foreach ($users as $user) {
    ?>
        <div class="col-lg-4 col-md-6">
                <div class="card" style="border: 1px solid lightgrey;margin:2em 0;">
                    <div class="img-top">
                        <img class="img-responsive" src="./../profiles/<?php echo $user['picture'] ?? ""; ?>" alt="<?php echo $user['first_name'] ."_". $user['last_name'] ?>" style="width:100px;">
                    </div>
                    <div class="card-body">
                        <h4 class="text-secondary"><?php echo $user['first_name'] ." ". $user['last_name'] ?></h4>
                        <h4 class="alert alert-danger"><?php echo $user['blood']?></h4>
                    </div>
                    <a href="./?route=users&pseudo=<?php echo $user['pseudo']?>">
                            <div class="panel-footer">
                                <span class="pull-left">Voir detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                </div>
        </div>
    <?php }?>
</div>