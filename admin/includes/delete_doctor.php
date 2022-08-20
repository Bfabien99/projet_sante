<?php
if (empty($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}
?>
<?php
    if(isset($_GET['delete']) && !empty($_GET['delete'])){
    $id = escapeString($_GET['delete']);
    $query = "DELETE FROM doctors WHERE id = '{$id}'";
    $delete_doctor = mysqli_query($db, $query);
    if($delete_doctor){
?>
    <script>
        history.back()
    </script>
<?php } }?>
