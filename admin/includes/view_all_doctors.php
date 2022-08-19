<?php
if (empty($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}
?>
    <h1>Docteur enregistré</h1>