
<?php
    if(isset($_GET['delete']) && !empty($_GET['delete'])){
    $id = escapeString($_GET['delete']);
    $query = "DELETE FROM doctors WHERE id = '{$id}'";
    $delete_doctor = mysqli_query($db, $query);
    if($delete_doctor){
        $carnets = getDoctorCarnet($id);
        $rdvs = getDoctorRdv($id);
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
