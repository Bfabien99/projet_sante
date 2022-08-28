
<h1>Service enregistré</h1>
<div class="row">
    <div class="col-lg-12 col-xl-11">
        <div class="card px-2 box-shadow " style="margin:2em auto;padding:1em; background-color:white;overflow:auto;">
            <div class="card-body">
                <table class="table bordered hover" id="tables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Intitulé</th>
                            <th>Detail</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $query = "SELECT * FROM roles";
                        $select_all_roles = mysqli_query($db, $query);

                        if($select_all_roles){
                        while ($row = $select_all_roles->fetch_assoc()) {
                        ?>
                            <tr>
                                <td class="text-uppercase"><?php echo $row['titre'] ?></td>
                                <td><?php echo $row['details'] ?></td>
                                <td>
                                    <a href="?edit=<?php echo $row['id'] ?>" class="btn btn-primary">Editer</a>
                                    <a href="?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        <?php }}
                        else{
                            echo "<h2 class='text-center text-muted'>Aucun service enregistré pour l'instant</h2>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href='?source=add_service' class='btn btn-success'>Ajouter un nouveau service</a>
    </div>
    
</div>