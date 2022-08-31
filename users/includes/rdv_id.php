<div class="row d-flex justify-content-center">
    <?php
    $date_rdv = [];
    $id = escapeString($_GET['r_id']);
    $doctor = getDoctorbyId($id);
    $occuped = false;// Le Docteur est disponible 
    if($doctor){
        $rdvs = getDoctorRdv($doctor['id']);
        foreach ($rdvs as $date) {
            $date_rdv[] = $date['date_rdv'];//Recupere toutes les dates des rdv
        }
    }
    $error = [];
    $success = false;
    if (isset($_POST['submit'])) {

        if (empty(trim($_POST['objet']))) {
            $error['objet'] = "Veuillez donnez la raison du rendez-vous";
        } else {
            $objet = escapeString($_POST['objet']);
        }

        if (empty($_POST['date'])) {
            $error['date'] = "Veuillez entre la date du rendez-vous";
        } else {
            $date = escapeString($_POST['date']);
        }

        if (empty($_POST['time'])) {
            $error['time'] = "Veuillez donnez l'heure du rendez-vous";
        } else {
            $time = escapeString($_POST['time']);
        }


        if (!empty($objet) && !empty($date) && !empty($time)) {
            $_date = date("Y-m-d", strtotime($date));
            $_time = date("H:i", strtotime($time));

            $_fulldate = $_date . " " . $_time;
            $fulldate = strtotime($_fulldate);

            $timeUnix = time();

            //Vérifie si la date du rendez-vous n'est pas déjà prise
            if(!empty($date_rdv)){
                foreach ($date_rdv as $_rdv) {
                if((strtotime($_rdv) <= strtotime($_fulldate)) && ((strtotime($_rdv) +3600 )>= strtotime($_fulldate))){
                    $occuped = true;
                    break;
                }
            }
            }
            
            if ($fulldate <= $timeUnix) {
                $error['time'] = "L'heure n'est pas valide";
            }elseif($occuped){
                $error['time'] = "Le Docteur n'est pas disponible à cette date";
            }else {
                if (setRdv($user['id'], $doctor['id'], $objet, $_fulldate)) {
                    $success = true;
                    sendMail('Rendez-vous', 'Notifications pour un rendez-vous le ' . date('Y-m-d', strtotime($_fulldate)). " avec ".strtoupper($user['first_name']) . " " .strtoupper($user['last_name']), $doctor['email']);
                }
            }
        }
    }

    if ($doctor) {
    ?>
        <div class="col-md-12 col-lg-6 card">
            <legend class="text-center">Prendre un rendez-vous</legend>
            <hr>
            <?php if (!$success) : ?>
                <form action="" method="post" data-aos="fade-left">
                    <div class="form-group p-1">
                        <label for="">Rendez-vous demandez par:</label>
                        <input disabled class="form-control text-uppercase" type="text" value="<?php echo $user['first_name'] . " " . $user['last_name'] ?>">
                    </div>
                    <div class="form-group p-1">
                        <label for="">Au docteur</label>
                        <input disabled class="form-control text-uppercase" type="text" value="<?php echo $doctor['first_name'] . " " . $doctor['last_name'] ?>">
                    </div>
                    <hr>
                    <div class="form-group p-1">
                        <label for="objet">La raison du rendez-vous</label>
                        <textarea type="text" class="form-control" name="objet" id="objet"><?php if (isset($objet)) echo $objet; ?></textarea>
                        <?php if (isset($error['objet'])) : ?>
                            <p class="alert-danger rounded-2 p-1"><?php echo  $error['objet']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group p-1">
                                <label for="date">Choisissez la date</label>
                                <input type="date" class="form-control" name="date" min="<?php echo date('Y-m-d'); ?>" value="<?php if (isset($date)) echo $date; ?>">
                                <?php if (isset($error['date'])) : ?>
                                    <p class="alert-danger rounded-2 p-1"><?php echo  $error['date']; ?></p>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div class="col">
                            <div class="form-group p-1">
                                <label for="time">Choisissez l'heure</label>
                                <input type="time" class="form-control" name="time" value="<?php if (isset($time)) echo $time; ?>">
                                <?php if (isset($error['time'])) : ?>
                                    <p class="alert-danger rounded-2 p-1"><?php echo  $error['time']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <input class="btn btn-success m-2" type="submit" name="submit" value="Soumettre">
                </form>
            <?php else : ?>
                <div>
                    <p class="success-box">Votre rendez-vous vient d'être notifié au docteur, vous recevrez une notification après que le docteur ai confirmé</p>
                    <a href="./" class="btn btn-primary">Retour</a>
                </div>
            <?php endif; ?>
        </div>
    <?php } else { ?>
        <div class=''>
            <h1 class='error-box'>404, PAGE NOT FOUND</h1>
            <p><a class='btn btn-danger' href='./'>Retour</a></p>
        </div>
    <?php } ?>
</div>