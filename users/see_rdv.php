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
?>
        <div class="col col-md-9 col-lg-7 col-xl-5" data-aos="fade-down">
            <div class="card border-2 border-primary" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <div class="row d-flex text-black">
                        <div class="col-md-12 flex-shrink-0 d-flex justify-content-center">
                            <img src="./../profiles/<?php echo $doctor['picture']; ?>" alt="<?php echo $doctor['first_name'] . "_" . $doctor['last_name']; ?>" class="img-fluid" style="width: 180px; border-radius: 10px;">
                        </div>
                        <div class="col-md-12 flex-grow-1 ms-3">
                            <h5 class="mb-1 text-uppercase"><?php echo $doctor['first_name'] . " " . $doctor['last_name']; ?></h5>
                            <p class="mb-2 pb-1 text-primary text-uppercase fst-italic" style="color: #2b2a2a;"><?php echo $doctor['fonction']; ?></p>
                            <p class="mb-2 pb-1 text-secondary" style="height: 100px;overflow: hidden;"><?php echo $doctor['description']; ?></p>
                            <hr>
                            <h5>Objet : <?php echo $rdv['objet']; ?></h5>
                            <hr>
                            <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                <p>Contact 1: <?php echo $doctor['contact1']; ?></p>
                            </div>
                            <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                <p>Contact 2: <?php echo $doctor['contact2']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php } else {
        header('location:./rdv.php');
    }
} else {
    header('location:./');
} ?>