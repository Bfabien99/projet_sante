
<?php
    if(isset($_GET['delete']) && !empty($_GET['delete'])){
    $id = escapeString($_GET['delete']);
    $query = "DELETE FROM users WHERE id = '{$id}'";
    $delete_user = mysqli_query($db, $query);
    if($delete_user){
        $carnets = getUserCarnet($id);
        $rdvs = getUserRdv($id);
        foreach($carnets as $carnet){
           deleteCarnet($carnet['id']); 
        }
        foreach($rdvs as $rdv){
            cancelRdv($rdv['rdv_id']); 
        }
        
?>
    <script>
        history.back()
    </script>
<?php } }?>
