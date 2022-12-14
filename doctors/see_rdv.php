<?php

if (isset($_POST['input']) && isset($_POST['type'])) {
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
    if ($rdv) {
        $doctor = getDoctorbyId($rdv['doctor_id']);
        $user = getUserbyId($rdv['user_id']);
?>
        <div class="col col-md-9 col-lg-7 col-xl-5" data-aos="fade-down">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <div class="row d-flex text-black text-center">
                        <div class="col-md-12 flex-shrink-0 d-flex justify-content-center">
                            <img src="./../profiles/<?php echo $user['picture']; ?>" alt="<?php echo $user['first_name'] . "_" . $user['last_name']; ?>" class="img-fluid" style="width: 180px; border-radius: 10px;">
                        </div>
                        <div class="col-md-12 flex-grow-1 ms-3">
                            <h5 class="mb-1 text-uppercase"><?php echo $user['first_name'] . " " . $user['last_name']; ?></h5>
                            <p class="mb-2 pb-1" style="color: #2b2a2a;"><?php echo $user['profession']; ?></p>
                            <hr>
                            <h5>Objet : <?php echo $rdv['objet']; ?></h5> 
                            <hr>
                            <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                <div>
                                    <p class="small text-muted mb-1">Taille</p>
                                    <p class="mb-0"><?php echo $user['height']; ?></p>
                                </div>
                                <div class="px-3">
                                    <p class="small text-muted mb-1">Poids</p>
                                    <p class="mb-0"><?php echo $user['weight']; ?></p>
                                </div>
                                <div>
                                    <p class="small text-muted mb-1">N???? le</p>
                                    <p class="mb-0"><?php echo $user['birth']; ?></p>
                                </div>
                            </div>
                            <div class="d-flex pt-1">
                                <?php if ($type == 'confirm') : ?>
                                    <i class="confirm btn btn-success flex-grow-1" >Confirmer le rendez-vous</i>
                                    <i class="remove btn btn-outline-danger me-1 flex-grow-1" >Annulez le rendez-vous</i>
                                <?php elseif ($type == 'cancel') : ?>
                                    <i class="remove btn btn-outline-danger me-1 flex-grow-1" >Annulez le rendez-vous</i>
                                    <i class="done btn btn-outline-primary me-1 flex-grow-1" >Fait</i>
                                <?php elseif ($type == 'undo') : ?>
                                    <i class="confirm btn btn-success flex-grow-1" >Confirmer le rendez-vous</i>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('.remove').on('click',function(){
                $.ajax({
                url: "update_rdv.php",
                method: "POST",
                data: {
                    input: <?php echo $rdv['rdv_id'] ?>,
                    type: 'remove'
                },
                success: function(data) {
                    if(data){
                        location.reload();
                    }
                }
            })
            })
            
            $('.confirm').on('click',function(){
                $.ajax({
                url: "update_rdv.php",
                method: "POST",
                data: {
                    input: <?php echo $rdv['rdv_id'] ?>,
                    type: 'confirm'
                },
                success: function(data) {
                    location.reload();
                }
            })
            })

            $('.done').on('click',function(){
                $.ajax({
                url: "update_rdv.php",
                method: "POST",
                data: {
                    input: <?php echo $rdv['rdv_id'] ?>,
                    user: <?php echo $user['id'] ?>,
                    doctor: <?php echo $doctor['id'] ?>,
                    type: 'done'
                },
                success: function(data) {
                    location.reload();
                }
            })
            })
        </script>
<?php } else {
        header('location:./rdv.php');
    }
} else {
    header('location:./');
} ?>