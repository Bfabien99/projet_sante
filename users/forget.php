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
$success = false;
if (isset($_POST['update'])) {
    if (empty($_POST['pseudo'])) {
        $error['pseudo'] = 'Veuillez entrer votre pseudo';
    } else {
        $pseudo = escapeString($_POST['pseudo']);
    }

    if (empty($_POST['email'])) {
        $error['email'] = 'Veuillez entrer votre email';
    } else {
        $email = escapeString($_POST['email']);
    }

    if (empty($_POST['birth'])) {
        $error['birth'] = 'Veuillez entrer votre date de naissance';
    } else {
        $birth = escapeString($_POST['birth']);
    }

    if (empty($_POST['password'])) {
        $error['password'] = 'Veuillez entrer votre mot de passe';
    } else {
        $password = pass_crypt($_POST['password']);
    }

    if (!empty($pseudo) && !empty($email) && !empty($password) && !empty($birth)) {
        if (updateUserPass($pseudo, $email, $birth, $password)) {
            header('Location:./login.php');
        } else {
            $error['both'] = "Les informations saisies sont incorrectes, veuillez reessayer";
        }
    }
}


?>

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
    <title>UTILISATEUR LOGIN</title>
    <style>
        body {
            background-image: linear-gradient(to right top, #6ba0c2, #6da4d1, #75a7e0, #82a8ed, #94a9f8);
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
        <p>HealthPlus | Mot de passe oublié</p>
    </div>
    <div class="container-fluid d-flex flex-column justify-content-center bg-gray" style="position:relative;min-height:100vh;">
        <h1 class="text-center text-light">Identifiez-vous</h1>
        <?php if($success):?>
            <h4 class='success-box'>Vous venez de modifiez votre mot de passe</h4>
        <?php else :?>
        <form action="" method="post" autocomplete="off" style="margin:0 auto; background:#fafafa;max-width:600px" class="rounded col-md-6 col-lg-6 shadow p-4">
            <?php if (isset($error['both'])) : ?>
                <p class="error-box rounded-2 p-1"><?php echo  $error['both']; ?></p>
            <?php endif; ?>
            <div class="form-group my-3">
                <label for="email">Entrez votre email</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php if (isset($email)) echo $email; ?>">
                <?php if (isset($error['email'])) : ?>
                    <p class="error-box rounded-2 p-1"><?php echo  $error['email']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group my-3">
                <label for="pseudo">Entrez votre pseudo</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo" value="<?php if (isset($pseudo)) echo $pseudo; ?>">
                <?php if (isset($error['pseudo'])) : ?>
                    <p class="error-box rounded-2 p-1"><?php echo  $error['pseudo']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group my-3">
                <label for="birth">Entrez votre date de naissance</label>
                <input type="date" class="form-control" name="birth" id="birth" value="<?php if (isset($birth)) echo $birth; ?>">
                <?php if (isset($error['birth'])) : ?>
                    <p class="error-box rounded-2 p-1"><?php echo  $error['birth']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group my-3">
                <label for="password">Entrez votre nouveau mot de passe</label>
                <input type="password" class="form-control" name="password" id="password" style="position: relative;">
                <?php if (isset($error['password'])) : ?>
                    <p class="error-box rounded-2 p-1"><?php echo  $error['password']; ?></p>
                <?php endif; ?>
            </div>
            <input type="submit" name="update" value="Modifier" class="btn btn-primary my-2">
        </form>
        <?php endif ?>
    </div>
    <!-- /.container-fluid -->
</body>
<script src="./../js/bootstrap.min.js"></script>
</html>