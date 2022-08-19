

<?php
    if(empty($_SESSION['hp_user_email']) && empty($_SESSION['hp_user_email'])){
        header('Location:./../?route=login');
    }
?>
    <div class="container">
    <?php
    include('includes/user_navigation.php');
?>
    <h1>User Dashboard</h1>
    </div>
