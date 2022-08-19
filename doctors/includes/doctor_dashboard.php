

<?php
if(empty($_SESSION['hp_doctor_email']) && empty($_SESSION['hp_doctor_email'])){
    header('Location:./../?route=login');
}
?>
    <div class="container">
    <?php
    include('includes/doctor_navigation.php');
?>
    <h1>Doctor Dashboard</h1>
    </div>
