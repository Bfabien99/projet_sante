<?php
if (empty($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}
?>
<h1>Service enregistré</h1>
<div class="row">
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

            while ($row = $select_all_roles->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['titre']?></td>
                <td><?php echo $row['details']?></td>
                <td>
                    <a href="?edit=<?php echo $row['id']?>" class="btn btn-primary">Editer</a>
                    <a href="?delete=<?php echo $row['id']?>" class="btn btn-primary">Supprimer</a>
                </td>
            </tr>
            <?php }
            ?>
        </tbody>
    </table>

    <a href='?source=add_service' class='btn btn-success'>Ajouter un nouveau service</a>
</div>