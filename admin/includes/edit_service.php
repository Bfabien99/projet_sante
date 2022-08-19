<?php
if (empty($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}
?>
<?php
$success = false;
$error = [];

if (isset($_POST['update_category'])) {
    if(empty($_POST['title']) || strlen($_POST['title']) < 4){
        $error['title'] = "Veuillez entrer un titre d'au moins 4 caractères" ;
    }else{
        $title = escapeString($_POST['title']);
    }

    if(empty($_POST['details']) || strlen($_POST['details']) < 10){
        $error['details'] = "Veuillez entrer un text d'au moins 10 caractères" ;
    }else {
        $details = escapeString($_POST['details']);
    }

    $id = escapeString($_GET['edit']);
    
    if(!empty($title) && !empty($details)){
        $sql = "UPDATE roles SET titre = '{$title}', details = '{$details}' WHERE id = '{$id}'";

        if($db->query($sql)){
            $success = true;
        }
    }

    
    
}
?>
<?php if (isset($_GET['edit']) && !empty($_GET['edit'])) : ?>
    <h1>Modifier le service</h1>
<?php else : ?>
    <a href="./" class="btn btn-primary">Retour</a>
<?php endif; ?>
<?php if (!$success): ?>
    <form action="" method="post">
        <?php

        if (isset($_GET['edit']) && !empty($_GET['edit'])) {

            $cat_id = escapeString($_GET['edit']);

            $query = "SELECT * FROM roles WHERE id = $cat_id ";
            $select_service_id = mysqli_query($db, $query);

            while ($row = mysqli_fetch_assoc($select_service_id)) {
                $cat_title = $row['titre'];
                $cat_detail = $row['details'];
        ?>
                <div class="form-group">
                    <label for="title">Titre du service</label>
                    <input value="<?php echo $cat_title ; ?>" type="text" class="form-control" name="title">
                    <?php if (isset($error['title'])) : ?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['title']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="details">Description du service</label>
                    <textarea class="form-control" name="details" id="details"><?php echo $cat_detail; ?></textarea>
                    <?php if (isset($error['details'])) : ?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['details']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="update_category" value="Modifier">
                </div>
        <?php }
        } ?>
    </form>
<?php else : ?>
    <h3 class="alert-success">Modification effectuée!</h3>
    <a href="./services.php" class="btn btn-primary">Retour</a>
<?php endif ?>