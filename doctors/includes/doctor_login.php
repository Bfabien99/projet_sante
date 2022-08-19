<?php

$error = [];
if (isset($_POST['login'])) {
    if (empty($_POST['identifiant'])) {
        $error['identifiant'] = 'Veuillez entrer votre pseudo ou votre email';
    } else {
        $identifiant = escapeString($_POST['identifiant']);
    }

    if (empty($_POST['password'])) {
        $error['password'] = 'Veuillez entrer votre mot de passe';
    } else {
        $password = pass_crypt($_POST['password']);
    }

    if (empty($_POST['identifiant']) || empty($_POST['password'])) {
        $error['code'] = "Veuillez votre code d'accès";
    }


    if (!empty($identifiant) && !empty($password)) {
        if (!empty($_POST['code'])) {
            $code = escapeString($_POST['code']);
            if (loginDoctor($identifiant, $password, $code)) {
                header('Location:./');
            } else {
                $error['both'] = "Les informations saisies sont incorrectes, veuillez reessayer";
            }
        } else {
            if (loginAdmin($identifiant, $password)) {
                header('Location:./../admin');
            } else {
                $error['code'] = "Veuillez votre code d'accès";
            }
        }
    }
}


?>
<div class="container">
    <h1 class="text-center">Doctor Connexion</h1>
    <form action="" method="post" autocomplete="off">
        <?php if (isset($error['both'])) : ?>
            <p class="alert-warning rounded-2 p-1"><?php echo  $error['both']; ?></p>
        <?php endif; ?>
        <div class="form-group">
            <label for="identifiant">Entrez votre pseudo ou votre email</label>
            <input type="text" class="form-control" name="identifiant" id="identifiant" value="<?php if (isset($identifiant)) echo $identifiant; ?>">
            <?php if (isset($error['identifiant'])) : ?>
                <p class="alert-danger rounded-2 p-1"><?php echo  $error['identifiant']; ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="identifiant">Entrez votre mot de passe</label>
            <input type="password" class="form-control" name="password" id="password">
            <?php if (isset($error['password'])) : ?>
                <p class="alert-danger rounded-2 p-1"><?php echo  $error['password']; ?></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="identifiant">Entrez le code</label>
            <input type="password" class="form-control" name="code" id="code">
            <?php if (isset($error['code'])) : ?>
                <p class="alert-danger rounded-2 p-1"><?php echo  $error['code']; ?></p>
            <?php endif; ?>
        </div>
        <input type="submit" name="login" value="Se connecter" class="btn btn-primary my-2">
    </form>
</div>