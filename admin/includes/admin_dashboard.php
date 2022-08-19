

<?php
    if(empty($_SESSION['hp_admin_pseudo'])){
        header('Location:./../?route=login');
    }
?>

<div id="wrapper">

<!-- Navigation -->
<?php include('includes/admin_navigation.php'); ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Admin
                    <small>Author</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<?php
    
?>
