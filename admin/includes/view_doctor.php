<?php 
$doctor = getDoctorbyId($_GET["d_id"]); 

if(!$doctor){
    echo "<h4 class='error-box'>Le Docteur n'est pas reconnu</h4>";
    echo "<p><a class='btn btn-primary' href='./doctors.php'>Retour</a></p>";
}else{
?>
<style>
    .form-group{
        font-size:1.2em;
    }
    h5{
        font-size:1.5em;
        font-weight:bold;
    }
</style>
<div class="row text-center" style="background-color:white;padding:2em;">
        <div class="col-md-12 col-lg-2">
            <img src="./../profiles/<?php echo $doctor['picture'] ?>" style="width: 120px;height: 120px;object-fit: cover;">
            <hr>
        </div>
        <div class="col-md-12 col-lg-5">
            <div class="form-group">
                <h5>Nom</h5>
                <p><?php echo $doctor['first_name']?></p>
            </div>
            <div class="form-group">
                <h5>Prénom</h5>
                <p><?php echo $doctor['last_name']?></p>
            </div>
            <div class="form-group">
                <h5>Sexe</h5>
                <p><?php echo $doctor['sexe']?></p>
            </div>
            <div class="form-group">
                <h5>Contact1</h5>
                <p><?php echo $doctor['contact1']?></p>
            </div>
            <div class="form-group">
                <h5>Contact2</h5>
                <p><?php echo $doctor['contact2']?></p>
            </div>
        </div>
        <div class="col-md-12 col-lg-5">
        <div class="form-group">
                <h5>Email</h5>
                <p><?php echo $doctor['email']?></p>
            </div>
            <div class="form-group">
                <h5>Pseudo</h5>
                <p><?php echo $doctor['pseudo']?></p>
            </div>
        <div class="form-group">
                <h5>Service</h5>
                <p><?php echo $doctor['fonction']?></p>
            </div>
            <div class="form-group">
                <h5>Expérience</h5>
                <p><?php echo $doctor['experience']?></p>
            </div>
            <div class="form-group">
                <h5>Inscription</h5>
                <p><?php echo $doctor['created']?></p>
            </div>
        </div>
    </div>
    <a class='btn btn-primary' href='./doctors.php'>Retour</a>
<?php }?>