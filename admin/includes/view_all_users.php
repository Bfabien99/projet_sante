<?php
if (empty($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}
?>
<h1 class="text-center">Utilisateur enregistré</h1>
<div class="row">
    <div class="col-lg-12 col-xl-11">
        <div class="card px-2 box-shadow " style="margin:2em auto;padding:1em; background-color:white;overflow:auto;">
            <div class="card-body">
                <table class="table bordered hover" id="tables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Prenoms</th>
                            <th>Groupe Sanguin</th>
                            <th>Taille</th>
                            <th>Poids</th>
                            <th>Profession</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $users = getAllUser();
                        if ($users) {
                            foreach ($users as $user) {
                        ?>
                                <tr>
                                    <td><img src="./../profiles/<?php echo $user['picture'] ?>" alt="<?php echo $user['first_name'] . "_" . $user['last_name'] ?>" class="img-responsive" /></td>
                                    <td><?= $user['first_name'] ?></td>
                                    <td><?= $user['last_name'] ?></td>
                                    <td><?= $user['blood'] ?></td>
                                    <td><?= $user['height'] ?></td>
                                    <td><?= $user['weight'] ?></td>
                                    <td><?= $user['profession'] ?></td>
                                    <td><a href="?pseudo=<?php echo $user['pseudo'] ?>" class="btn btn-primary p-md-1 mb-0">Voir plus</a></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <p class="h4 text-muted">Aucun utilisateur</p>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>