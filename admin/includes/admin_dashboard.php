

<?php
    if(empty($_SESSION['hp_admin_pseudo'])){
        header('Location:./../?route=login');
    }
?>
    <div class="container">
    <?php
    include('includes/admin_navigation.php');
?>
    <h1>Admin Dashboard</h1>
    </div>
<?php
    
?>
