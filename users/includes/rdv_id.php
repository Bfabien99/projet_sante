<div class="row d-flex justify-content-center">
    <?php
    $id = $_GET['r_id'];
    $doctor = getDoctorbyId($id);
    $error = [];
    $success = false;
    if (isset($_POST['submit'])) {
        $success = true;
    }

    if ($doctor) {
    ?>
        <div class="col-md-12 col-lg-6 card">
        <legend class="text-center">Prendre un rendez-vous</legend>
            <hr>
            <?php if(!$success):?>
            <form action="" method="post">
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
                    <textarea type="text" class="form-control" name="objet" id="objet"></textarea>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group p-1">
                            <label for="date">Choisissez la date</label>
                            <input type="date" class="form-control" name="date" min="<?php echo date('Y-m-d');?>">
                        </div>

                    </div>
                    <div class="col">
                        <div class="form-group p-1">
                            <label for="time">Choisissez l'heure</label>
                            <input type="time" class="form-control" name="time">
                        </div>
                    </div>
                </div>
                <input class="btn btn-success m-2" type="submit" name="submit" value="Soumettre">
            </form>
            <?php else:?>
                <div class="success-box">
                    <p>Votre rendez-vous vient d'être notifié, vous recevrez une notification après que le docteur ai confirmé</p>
                </div>
            <?php endif;?>
        </div>
    <?php } else { ?>
        <p class="h4 text-muted">Docteur inconnu</p>
    <?php } ?>
</div>