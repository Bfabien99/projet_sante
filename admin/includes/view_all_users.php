<?php
if (empty($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}
?>
<h1 class="text-center">Utilisateur enregistré</h1>
<div class="row">
    <?php
    $users = getAllUser();
    foreach ($users as $user) {
    ?>
       <div class="col-lg-3 col-md-6">
            <div class="card px-2 box-shadow" style="margin:2em 0;padding:1em; background-color:white;">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="./../profiles/<?php echo $user['picture'] ?>" alt="<?php echo $user['first_name'] . "_" . $user['last_name'] ?>" class="img-responsive" />
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bold text-uppercase"><?php echo $user['first_name'] . " " . $user['last_name'] ?></h5>
                    <hr class="my-2" />
                    <p class="card-text">
                        <table class="table">
                            <thead>
                               <tr>
                                <th>
                                    Taille
                                </th>
                                <th>
                                    Poids
                                </th>
                                <th>
                                    Profession
                                </th>
                            </tr> 
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $user['height'] ?> Cm</td>
                                    <td><?php echo $user['weight'] ?> Kg</td>
                                    <td><?php echo $user['profession'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </p>
                    <hr class="my-4" />
                    <p class="lead text-capitalize">Groupe Sanguin <strong><?php echo " ".$user['blood'] ?></strong></p>
                    <a href="?pseudo=<?php echo $user['pseudo'] ?>" class="btn btn-primary p-md-1 mb-0">Voir plus</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>