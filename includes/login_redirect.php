<?php
include('includes/header.php');
?>
<?php
include('includes/navigation.php');
?>

<section class="page-section bg-primary" id="about">
    <h1 class="text-light text-center text-uppercase text-decoration-underline">Espace connexion</h1>
    <h3 class="text-light text-center text-uppercase">Choisissez votre section</h3>
</section>

<div class="row d-flex justify-content-around p-2 m-3">
    <div class="row col-md-4 col-lg-5 bg-light rounded shadow p-3 my-2" style="max-width:500px">
        <div class="col-8">
            <h2>Espace utilisateur</h2>
        <a class="btn btn-secondary" href="./users/login.php">Continue</a>
        </div>
        <i class="col-4 fa fa-user text-primary" style="font-size:5.3em"></i>
    </div>
    <div class="row col-md-4 col-lg-5 bg-light rounded shadow p-3 my-2" style="max-width:500px">
        <div class="col-8">
            <h2>Espace docteur</h2>
            <a class="btn btn-success" href="./doctors/login.php">Continue</a>
        </div>
        <i class="col-4 fa fa-user-md text-primary" style="font-size:5.3em"></i>
    </div>
    
</div>

<?php
include('includes/footer.php');
?>