
<?php 
$user = getUserbyId($_GET["p_id"]); 

if(!$user){
    echo "<div class=''><h1 class='error-box'>404, PAGE NOT FOUND</h1>";
    echo "<p><a class='btn btn-danger' href='./'>Retour</a></p></div>";
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
                <img src="./../profiles/<?php echo $user['picture'] ?>" style="width: 120px;height: 120px;object-fit: cover;">
                <hr>
            </div>
            <div class="col-md-12 col-lg-5">
                <div class="form-group">
                    <h5>Nom</h5>
                    <p><?php echo $user['first_name']?></p>
                </div>
                <div class="form-group">
                    <h5>Prénom</h5>
                    <p><?php echo $user['last_name']?></p>
                </div>
                <div class="form-group">
                    <h5>Sexe</h5>
                    <p><?php echo $user['sexe']?></p>
                </div>
                <div class="form-group">
                    <h5>Email</h5>
                    <p><?php echo $user['email']?></p>
                </div>
                <div class="form-group">
                    <h5>Pseudo</h5>
                    <p><?php echo $user['pseudo']?></p>
                </div>
                <div class="form-group">
                    <h5>Contact</h5>
                    <p><?php echo $user['contact']?></p>
                </div>
            </div>
            
            <div class="col-md-12 col-lg-5">
            <div class="form-group">
                    <h5>Née le </h5>
                    <p><?php echo $user['birth']?></p>
                </div>
            <div class="form-group">
                    <h5>Profession</h5>
                    <p><?php echo $user['profession']?></p>
                </div>
                <div class="form-group">
                    <h5>Groupe Sanguin</h5>
                    <p><?php echo $user['blood']?></p>
                </div>
                <div class="form-group">
                    <h5>Taille</h5>
                    <p><?php echo $user['height']?></p>
                </div>
                <div class="form-group">
                    <h5>Poids</h5>
                    <p><?php echo $user['weight']?></p>
                </div>
                <div class="form-group">
                    <h5>Inscription</h5>
                    <p><?php echo $user['created']?></p>
                </div>
            </div>
        </div>
        <a class='btn btn-primary' href='./users.php'>Retour</a>
    <?php }?>