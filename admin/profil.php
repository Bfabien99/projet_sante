<?php
include('includes/header.php');

if ($admin) {
    $email = $admin['email'];
    $pseudo = $admin['pseudo'];
    $code = getCode();
}

$error = [];
$success1 = false;
$success2 = false;

if (isset($_POST['editinfo'])) {
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'Veuillez entrer une adresse email valide';
        $email = "";
    } else {
        $email = escapeString($_POST['email']);
    }

    if (empty($_POST['pseudo']) || strlen($_POST['pseudo']) < 4) {
        $error['pseudo'] = "Veuillez entrer un pseudo valide d'au moins 4 caractères";
        $pseudo = "";
    } else {
        $pseudo = escapeString($_POST['pseudo']);
        $_SESSION['hp_admin_pseudo'] = $pseudo;
    }

    if (empty($_POST['password'])) {
        $password = $admin['password'];
    } elseif (!empty($_POST['password']) && strlen($_POST['password']) < 6) {
        $error['password'] = "Veuillez entrer un mo de passe valide d'au moins 6 caractères";
    } else {
        $password = pass_crypt($_POST['password']);
    }

    if (!empty($email) && !empty($pseudo) && !empty($password)) {
        if (updateAdmin($email, $pseudo, $password)) {
            $success1 = true;
        }
    }
}

if (isset($_POST['editcode'])) {
    if (empty($_POST['code']) || strlen($_POST['code']) < 6) {
        $error['code'] = "Veuillez entrer un code valide d'au moins 6 caractères";
        $code = "";
    } else {
        $code = escapeString($_POST['code']);
    }

    if (!empty($code)) {
        if (updateCode($code)) {
            $success2 = true;
        }
    }
}

?>
<p><a href="./" class="btn btn-secondary">Retour</a></p>
<div class="row">
    <div class="col-md-12 col-lg-5" style="margin:1em 2%;max-width:500px;box-shadow:0px 0px 5px lightgrey;background-color:white;padding:10px;border-radius:5px">
        <?php if ($success1) : ?>
            <p class="success-box"> Modification éffectuée</p>
        <?php endif; ?>
        <form action="" method="post">
            <h3 class="text-center">Modifier vos informations de connexion</h3>
            <div class="form-group">
                <label for="email">
                    Entrer votre Email
                </label>
                <input class="form-control" type="email" name="email" value="<?php if (isset($email)) echo $email; ?>">
                <?php if (isset($error['email'])) : ?>
                    <p class="error-box rounded-2 p-1"><?php echo  $error['email']; ?></p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="pseudo">
                    Entrer votre Pseudo
                </label>
                <input class="form-control" type="text" name="pseudo" value="<?php if (isset($pseudo)) echo $pseudo; ?>">
                <?php if (isset($error['pseudo'])) : ?>
                    <p class="error-box rounded-2 p-1"><?php echo  $error['pseudo']; ?></p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password">
                    Entrer votre Mot de passe
                </label>
                <input class="form-control" type="password" name="password">
                <?php if (isset($error['password'])) : ?>
                    <p class="error-box rounded-2 p-1"><?php echo  $error['password']; ?></p>
                <?php endif; ?>
            </div>
            <input class="btn btn-primary" type="submit" name="editinfo" value="Modifier">
        </form>
    </div>

    <div class="col-md-12 col-lg-5" style="margin:1em 2%;max-width:500px;box-shadow:0px 0px 5px lightgrey;background-color:white;padding:10px;border-radius:5px">
        <?php if ($success2) : ?>
            <p class="success-box"> Modification éffectuée</p>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="code">
                    Modifer le code d'accès
                </label>
                <input class="form-control" type="code" name="code" value="<?php if (isset($code)) echo $code; ?>">
                <?php if (isset($error['code'])) : ?>
                    <p class="error-box rounded-2 p-1"><?php echo  $error['code']; ?></p>
                <?php endif; ?>
            </div>
            <input class="btn btn-primary" type="submit" name="editcode" value="Changer le code d'accès">
        </form>
    </div>
</div>

<?php
include('includes/footer.php');
?>