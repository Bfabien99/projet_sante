
<?php
    if(isset($_GET['delete']) && !empty($_GET['delete'])){
    $id = escapeString($_GET['delete']);
    $query = "DELETE FROM roles WHERE id = '{$id}'";
    $delete_role = mysqli_query($db, $query);
    if($delete_role){
?>
    <script>
        history.back()
    </script>
<?php } }?>
