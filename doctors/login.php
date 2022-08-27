<?php
session_start();
include('../includes/config.php');
include('../includes/functions.php');
$db = connect(
    DB_HOST,
    DB_USERNAME,
    DB_PASSWORD,
    DB_NAME
);
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

    if (!empty($_POST['code'])) {
        $code = escapeString($_POST['code']);
    } else {
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
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="./../js/jquery.js"></script>

<!-- Bootstrap Core CSS & JS-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/1f88d87af5.js" crossorigin="anonymous"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<title>DOCTEUR LOGIN</title>
<style>
    body {
        background-image: linear-gradient(to right top, #6bc26f, #72bd61, #79b952, #81b343, #88ae34);
    }

    .success-box {
        background-color: green;
        color: white;
        padding: 0.5em;
        border-radius: 5px;
        box-shadow: 0px 0px 10px lightgrey;
        width: fit-content;
    }

    .error-box {
        background-color: red;
        color: white;
        padding: 0.5em;
        border-radius: 5px;
        box-shadow: 0px 0px 10px lightgrey;
        width: fit-content;
    }
</style>
</head>

<body>
<div class="d-flex bg-light justify-content-evenly p-2 shodow-bottom fixed-top">
                <a class="" href="./../"><i class="h2 fa fa-hand-holding-medical text-dark"></i></a>
                <p>HealthPlus | Page de connexion Docteur</p>
            </div>
        <div class="container-fluid d-flex flex-column justify-content-center bg-gray" style="position:relative;min-height:100vh;">
                <h1 class="text-center text-light">Connectez-vous</h1>
                <form action="" method="post" autocomplete="off" style="margin:0 auto; background:#fafafa;max-width:600px" class="rounded col-md-6 col-lg-6 shadow p-4">
                    <?php if (isset($error['both'])) : ?>
                        <p class="error-box rounded-2 p-1"><?php echo  $error['both']; ?></p>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="identifiant">Entrez votre pseudo ou votre email</label>
                        <input type="text" class="form-control" name="identifiant" id="identifiant" value="<?php if (isset($identifiant)) echo $identifiant; ?>">
                        <?php if (isset($error['identifiant'])) : ?>
                            <p class="error-box rounded-2 p-1"><?php echo  $error['identifiant']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="identifiant">Entrez votre mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password">
                        <?php if (isset($error['password'])) : ?>
                            <p class="error-box rounded-2 p-1"><?php echo  $error['password']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="identifiant">Entrez votre code d'accès</label>
                        <input type="password" class="form-control" name="code" id="code" value="<?php if (isset($code)) echo $code; ?>">
                        <?php if (isset($error['code'])) : ?>
                            <p class="error-box rounded-2 p-1"><?php echo  $error['code']; ?></p>
                        <?php endif; ?>
                    </div>
                    <input type="submit" name="login" value="Se connecter" class="btn btn-primary my-2">
                </form>
            </div>
</body>
<script src="./../js/bootstrap.min.js"></script>

</html>