<?php
if (empty($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}
?>
<h1>Service enregistré</h1>
<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Intitulé</th>
                <th>Detail</th>
                <th colspan="2">Actions</th>
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
                <td colspan="2">
                    <a href="?edit=<?php echo $row['id']?>" class="btn btn-primary">Editer</a>
                    <a href="?delete=<?php echo $row['id']?>" class="btn btn-primary">Supprimer</a>
                </td>
            </tr>
            <?php }
            ?>
        </tbody>
    </table>

</div>