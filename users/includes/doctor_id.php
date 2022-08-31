<?php
$doctor = getDoctorbyId($_GET["d_id"]);

if (!$doctor) {
    echo "<div class=''><h1 class='error-box'>404, PAGE NOT FOUND</h1>";
    echo "<p><a class='btn btn-danger' href='./'>Retour</a></p></div>";
} else {
?>
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row" data-aos="fade-down">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-sm-auto mb-3">
                                        <div class="mx-auto" style="width: 140px;">
                                            <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                <img src="./../profiles/<?php echo $doctor['picture'] ?>" alt="" class="img-fluid" style="width: 140px;height:140px;object-fit:cover;">
                                            </div>
                                            <h6 class="pt-sm-2 pb-1 mb-0 text-nowrap text-uppercase"><?php echo $doctor['first_name'] ?> <?php echo $doctor['last_name'] ?></h6>
                                            <a href="rdv.php?r_id=<?php echo $doctor['id'] ?>" class="btn btn-success">Prendre rendez-vous</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-9 d-flex flex-column flex-sm-row mb-3">
                                        <div class="text-md-center text-sm-right">
                                            <div class="tab-content pt-3">
                                                <div class="tab-pane active">
                                                    <div class="row my-0 mx-auto g-2 d-flex justify-content-around" style="max-width:700px;">
                                                        <legend class="text-center">Information</legend>
                                                        <div class="col-md-12 col-lg-5 p-2 m-2 d-flex flex-column align-items-center" style="margin:0 auto;">
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="first_name">Nom</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $doctor['first_name'] ?></p>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="last_name">Prénoms</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $doctor['last_name'] ?></p>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="birth">Date de naissance</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $doctor['birth'] ?></p>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="contact1">Contact1</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $doctor['contact1'] ?></p>

                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="contact2">Contact2</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $doctor['contact2'] ?></p>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="sexe">Sexe</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $doctor['sexe'] ?></p>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="email">Email</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $doctor['email'] ?></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 col-lg-5 p-2 m-2 d-flex flex-column align-items-center" style="margin:0 auto;">
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="fonction">Service</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $doctor['fonction'] ?></p>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="description">Description</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $doctor['description'] ?></p>
                                                            </div>
                                                            <div class="form-group d-flex justify-content-between" style="width: 320px">
                                                                <h6 for="experience">Année d'Expérience</h6>
                                                                <p style="width:150px;text-align:justify"><?php echo $doctor['experience'] ?> ans</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php } ?>