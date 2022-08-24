<?php

if (isset($_POST['input']) && isset($_POST['type'])){
    include('../includes/config.php');
    include('../includes/functions.php');
    $db = connect(
        DB_HOST,
        DB_USERNAME,
        DB_PASSWORD,
        DB_NAME
    );

    $type = $_POST['type'];
    $input = escapeString($_POST['input']);
    $rdv = getRdv($input);
    if($rdv){
        $user = getUserbyId($rdv['user_id']);
        $doctor = getDoctorbyId($rdv['doctor_id']);
    ?>
    <div class="col-md-12 col-lg-8" style="margin:2em 0;">
                <div class="card shadow">
                    <div class="bg-image hover-overlay ripple p-2" data-mdb-ripple-color="light">
                        <img src="./../profiles/<?php echo $user['picture']; ?>" class="img-responsive" alt="<?php echo $user['first_name'] . "_" . $user['last_name']; ?>" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-center"><?php echo $user['first_name'] . " " . $user['last_name']; ?></h5>
                        <?php if($type == 'confirm'):?>
                        <a href="./rdv.php" class="btn btn-success" onclick="<?php confirmRdv($rdv['rdv_id']);?>">Confirmer le rendez-vous</a>
                        <?php elseif($type == 'cancel'):?>
                            <a href="./rdv.php" class="btn btn-danger" onclick="<?php undoRdv($rdv['rdv_id']);?>">Annulez le rendez-vous</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
    <?php }
    else{
        header('location:./rdv.php');
    }
    }
    else{
        header('location:./');
    }?>
