<?php
$allrdvs = getUserRdv($user['id']);
$rdvs = getUserRdvLimit($user['id']);
$userlogin = getUserLogin($user['id']);
$loginTotal = TotalUserLogin();
$carnets = getUserCarnetLimit($user['id']);
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="row d-flex justify-content-around">
    <div class="col-md-12 col-lg-5 overflow-hidden" style="max-height:400px">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="box-title">Chandler</h4> -->
                <div class="calender-cont widget-calender">
                    <div id="calendar" class="shadow p-2 rounded" style="max-height:300px"></div>
                </div>
            </div>
        </div><!-- /.card -->
    </div>

    <div class="col-md-12 col-lg-5" style="max-height:400px">
        <div class="card bg-white">
            <div class="card-body shadow">
                <canvas id="myChart" style="max-height:300px"></canvas>
            </div>
        </div>

    </div>
</div>
<hr>
<h4 class="text-center fst-italic text-secondary my-5"><i class="fa fa-calendar fs-3"></i> Détails Rendez-vous</h4>
<div class="row d-flex justify-content-center g-2">
    <?php if ($rdvs) : ?>
        <div class="col-md-12 col-lg-4 p-2 text-center overflow-auto" style="max-height:210px">
            <span class="badge rounded-pill bg-warning">rdv en attente</span>
            <?php foreach ($rdvs as $rdv) : ?>
                <?php $doctor = getDoctorbyId($rdv['doctor_id']); ?>
                <?php if ($rdv['status'] == 'wait') : ?>
                    <div class="card border-secondary my-1 shadow">
                        <div class="card-body">
                            <div>
                                <span class="badge rounded-pill bg-warning">en attente</span>
                                <?php echo date('d-m-Y', strtotime($rdv['date_rdv'])) . " à " . date('H:i', strtotime($rdv['date_rdv'])); ?>
                            </div>
                            <hr>
                            <div class="row">
                                <img class="col img-fluid rounded" src="./../profiles/<?php echo $doctor['picture'] ?>" style="max-width:100px;max-height:100px">
                                <div class="col d-flex flex-column justify-content-evenly">
                                    <h5 class="text-secondary text-uppercase"><?php echo $doctor['first_name'] . " " . $doctor['last_name'] ?></h5>
                                    <p class="fst-italic text-primary"><?php echo $doctor['fonction'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="col-md-12 col-lg-4 p-2 text-center overflow-auto" style="max-height:210px">
            <span class="badge rounded-pill bg-success">rdv confirmé</span>
            <?php foreach ($rdvs as $rdv) : ?>
                <?php $doctor = getDoctorbyId($rdv['doctor_id']); ?>
                <?php if ($rdv['status'] == 'confirm') : ?>
                    <div class="card border-secondary my-1 shadow">
                        <div class="card-body">
                            <div>
                                <span class="badge rounded-pill bg-success">confirmé</span>
                                <?php echo date('d-m-Y', strtotime($rdv['date_rdv'])) . " à " . date('H:i', strtotime($rdv['date_rdv'])); ?>
                            </div>
                            <hr>
                            <div class="row">
                                <img class="col img-fluid rounded" src="./../profiles/<?php echo $doctor['picture'] ?>" style="max-width:100px;max-height:100px">
                                <div class="col d-flex flex-column justify-content-evenly">
                                    <h5 class="text-secondary text-uppercase"><?php echo $doctor['first_name'] . " " . $doctor['last_name'] ?></h5>
                                    <p class="fst-italic text-primary"><?php echo $doctor['fonction'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="col-md-12 col-lg-4 p-2 text-center overflow-auto" style="max-height:210px">
            <span class="badge rounded-pill bg-danger">rdv annulé</span>
            <?php foreach ($rdvs as $rdv) : ?>
                <?php $doctor = getDoctorbyId($rdv['doctor_id']); ?>
                <?php if ($rdv['status'] == 'undo') : ?>
                    <div class="card border-secondary my-1 shadow">
                        <div class="card-body">
                            <div>
                                <span class="badge rounded-pill bg-danger">annulé</span>
                                <?php echo date('d-m-Y', strtotime($rdv['date_rdv'])) . " à " . date('H:i', strtotime($rdv['date_rdv'])); ?>
                            </div>
                            <hr>
                            <div class="row">
                                <img class="col img-fluid rounded" src="./../profiles/<?php echo $doctor['picture'] ?>" style="max-width:100px;max-height:100px">
                                <div class="col d-flex flex-column justify-content-evenly">
                                    <h5 class="text-secondary text-uppercase"><?php echo $doctor['first_name'] . " " . $doctor['last_name'] ?></h5>
                                    <p class="fst-italic text-primary"><?php echo $doctor['fonction'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <hr>
        Aucun rendez-vous pris
    <?php endif; ?>
</div>
<hr>
<h4 class="text-center fst-italic text-secondary my-5"><i class="fa fa-file-medical fs-3"></i> Consultations effectuées</h4>
<div class="row gap-4 d-flex justify-content-center">

    <?php if ($carnets) : ?>
        <?php foreach ($carnets as $carnet) : ?>
            <?php $doctor = getDoctorbyId($carnet['doctor_id']); ?>
            <?php if (!$doctor) {
                deleteCarnet($carnet['id']);
            } ?>
            <div class="col-md-12 col-lg-3 bg-white shadow rounded border-top border-3 border-secondary" style="max-width:300px">
                <div class="rounded">
                    <p class="text-center text-muted"><i class="fa fa-file-medical-alt"></i> Résultats du <?php echo date("Y-m-d", strtotime($carnet['date'])); ?></p>
                    <hr>
                    <div class="row">
                        <img class="col img-fluid rounded" src="./../profiles/<?php echo $doctor['picture'] ?>" style="max-width:100px;max-height:100px">
                        <div class="col d-flex flex-column justify-content-evenly">
                            <h5 class="text-uppercase"><?php echo $doctor['first_name'] . " " . $doctor['last_name'] ?></h5>
                            <p class="fst-italic text-primary"><?php echo $doctor['fonction'] ?></p>
                        </div>
                    </div>
                    <a class="btn btn-secondary m-2" href="./carnet.php?c_id=<?php echo $carnet['id'] ?>">Voir</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="col-md-12 col-lg-6">
            <p>Aucun résultat pour l'instant</p>
        </div>
    <?php endif ?>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap5',
            initialView: 'dayGridMonth',
            timeZone: 'UTC',
            events: [
                <?php if ($allrdvs) : ?>
                    <?php foreach ($allrdvs as $rdv) : ?>
                        <?php if ($rdv['status'] == 'wait') : ?> {
                                start: '<?php echo $rdv['date_rdv'] ?>',
                                backgroundColor: 'orange',
                                borderColor: 'orange'
                            },
                        <?php elseif ($rdv['status'] == 'confirm') : ?> {
                                start: '<?php echo $rdv['date_rdv'] ?>',
                                backgroundColor: 'green',
                                borderColor: 'green'
                            },
                        <?php elseif ($rdv['status'] == 'undo') : ?> {
                                start: '<?php echo $rdv['date_rdv'] ?>',
                                backgroundColor: 'red',
                                borderColor: 'red'
                            },
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            ],

        });
        calendar.updateSize();
        calendar.render();
    });
</script>
<script>
    const data = {
        labels: [
            'Visite Totale',
            'Moi',
        ],
        datasets: [{
            label: 'My First Dataset',
            data: [<?php echo $loginTotal ?? 0 ?>, <?php echo $userlogin ?? 0 ?>],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)'
            ],
            hoverOffset: 4
        }]
    };

    const config = {
        type: 'doughnut',
        data: data,
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>