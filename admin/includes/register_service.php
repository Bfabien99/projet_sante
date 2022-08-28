
<?php
$success = false;
$error = [];

if (isset($_POST['submit'])) {
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
    
    if(!empty($title) && !empty($details)){
        $sql = "INSERT INTO roles (titre,details) VALUES ('{$title}','{$details}')";
        $result = $db->query($sql);
        if($result){
            $success = true;
        }
    }

    
    
}
?>
    <h1>Ajouter un nouveau service</h1>
<?php if (!$success): ?>
    <form action="" method="post" style="margin:2em auto;padding:1em; background-color:white;overflow:auto;">
                <div class="form-group">
                    <label for="title">Titre du service</label>
                    <input value="<?php echo $title ?? "" ; ?>" type="text" class="form-control" name="title">
                    <?php if (isset($error['title'])) : ?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['title']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="details">Description du service</label>
                    <textarea class="form-control" name="details" id="details"><?php echo $detail ?? ""; ?></textarea>
                    <?php if (isset($error['details'])) : ?>
                        <p class="alert-danger rounded-2 p-1"><?php echo  $error['details']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="submit" value="Ajouter">
                    <a href="./services.php" class="btn btn-primary">Retour</a>
                </div>
    </form>
<?php else : ?>
    <h1 class="text-center success-box"> Enregistrement éffectué</h1>
    <a href="./services.php" class="btn btn-primary">Retour</a>
<?php endif ?>
