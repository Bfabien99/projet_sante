<?php
if (empty($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}
?>
<h1 class="text-center">Docteur enregistré</h1>
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
                            <th>pseudo</th>
                            <th>Service</th>
                            <th>Experience</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $doctors = getAllDoctor();
                        if ($doctors) {
                            foreach ($doctors as $doctor) {
                        ?>
                                <tr>
                                    <td><img src="./../profiles/<?php echo $doctor['picture'] ?>" alt="<?php echo $doctor['first_name'] . "_" . $doctor['last_name'] ?>" style="width:50px" /></td>
                                    <td><?= $doctor['first_name'] ?></td>
                                    <td><?= $doctor['last_name'] ?></td>
                                    <td><?= $doctor['pseudo'] ?></td>
                                    <td><?= $doctor['fonction'] ?></td>
                                    <td><?= $doctor['experience'] ?></td>
                                    <td><a href="?pseudo=<?php echo $doctor['pseudo'] ?>" class="btn btn-primary p-md-1 mb-0">Voir plus</a>
                                    <a href="?delete=<?php echo $doctor['id']?>" class="btn btn-danger">Supprimer</a></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <p class="h4 text-muted">Aucun docteur</p>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
