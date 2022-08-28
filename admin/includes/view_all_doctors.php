
<h1 class="text-center">Docteur enregistré</h1>
<div class="row">
    <div class="col-lg-12 col-xl-11">
        <div class="card px-2 box-shadow " style="margin:2em auto;padding:1em; background-color:white;overflow:auto;">
            <div class="card-body">
                <table class="table bordered hover" id="tables" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-uppercase">
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
                                    <td><a href="?d_id=<?php echo $doctor['id'] ?>"><img src="./../profiles/<?php echo $doctor['picture'] ?>" alt="<?php echo $doctor['first_name'] . "_" . $doctor['last_name'] ?>" style="width:50px" /></a></td>
                                    <td class="text-uppercase"><?= $doctor['first_name'] ?></td>
                                    <td class="text-uppercase"><?= $doctor['last_name'] ?></td>
                                    <td><?= $doctor['pseudo'] ?></td>
                                    <td class="text-uppercase"><?= $doctor['fonction'] ?></td>
                                    <td><?= $doctor['experience'] ?></td>
                                    <td><a href="?edit=<?php echo $doctor['id'] ?>" class="btn btn-primary p-md-1 mb-0">Editer</a>
                                    <a href="?delete=<?php echo $doctor['id']?>" class="btn btn-danger">Supprimer</a></td>
                                </tr>
                            
                            <?php } ?>
                        <?php } else { ?>
                            <h2 class="text-center text-muted">Aucun docteur enregistré pour l'instant</h2>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
