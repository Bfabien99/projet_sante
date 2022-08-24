<?php
include('includes/header.php');
?>
<?php
include('includes/navigation.php');
?>

<section class="page-section bg-primary" id="about">
<div class="row d-flex justify-content-evenly">
        <div class="col-lg-5 bg-light rounded shadow p-2">
            <h2>Login as user</h2>
            <a class="btn btn-primary" href="./users/login.php">Continue</a>
        </div>
        <div class="col-lg-5 bg-light rounded shadow p-2">
            <h2>Login as doctor</h2>
            <a class="btn btn-primary" href="./doctors/login.php">Continue</a>
        </div>
    </div>
</section>

<?php
include('includes/footer.php');
?>