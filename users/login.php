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

    if (!empty($identifiant) && !empty($password)) {
        if (loginUser($identifiant, $password)) {
            header('Location:./');
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <title>HEALTH PLUS</title>
    <style>
        body {
            background-color: #f5f7fa;
        }
    </style>
</head>

<body>
    <div id="wrapper">

        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="container">
                    <h1 class="text-center">Connexion</h1>
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
                        <input type="submit" name="login" value="Se connecter" class="btn btn-primary my-2">
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
    </div>
</body>
<script src="./../js/bootstrap.min.js"></script>

</html>