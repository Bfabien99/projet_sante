<?php
$rdvs = getdoctorRdvLimit($doctor['id']);
$doctorlogin = getdoctorLogin($doctor['id']);
$loginTotal = TotaldoctorLogin();
$carnets = getDoctorCarnet($doctor['id']);
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
Détails Rendez-vous
<div class="row d-flex justify-content-center">
        <?php if ($rdvs) : ?>
            <div class="col-md-12 col-lg-4 p-2 text-center bg-white"> 
            <?php foreach ($rdvs as $rdv) : ?>
                <?php $user = getuserbyId($rdv['user_id'])?>
                <?php if ($rdv['status'] == 'wait') : ?>
                    <div class="card border-warning my-1 shadow">
                        <div class="card-body">
                            <div>
                                <span class="badge rounded-pill bg-warning">en attente</span>
                            <?php echo date('l F,j Y', strtotime($rdv['date_rdv'])) . " at " . date('H:i', strtotime($rdv['date_rdv'])); ?>
                            </div>
                            <hr>
                            <div class="row">
                                <img class="col img-fluid rounded" src="./../profiles/<?php echo $user['picture']?>" style="max-width:100px;max-height:100px">
                                <div class="col d-flex flex-column justify-content-evenly">
                                    <h3 class="text-uppercase"><?php echo $user['first_name'] . " ". $user['last_name']?></h3>
                                    <p class="fst-italic text-primary"><?php echo $user['sexe']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            </div>
            
            <div class="col-md-12 col-lg-4 p-2 text-center bg-white"> 
            <?php foreach ($rdvs as $rdv) : ?>
            <?php if ($rdv['status'] == 'confirm') : ?>
                    <div class="card border-success my-1 shadow">
                        <div class="card-body">
                            <div>
                                <span class="badge rounded-pill bg-success">confirmé</span>
                            <?php echo date('l F,j Y', strtotime($rdv['date_rdv'])) . " at " . date('H:i', strtotime($rdv['date_rdv'])); ?>
                            </div>
                            <hr>
                            <div class="row">
                                <img class="col img-fluid rounded" src="./../profiles/<?php echo $user['picture']?>" style="max-width:100px;max-height:100px">
                                <div class="col d-flex flex-column justify-content-evenly">
                                    <h3 class="text-uppercase"><?php echo $user['first_name'] . " ". $user['last_name']?></h3>
                                    <p class="fst-italic text-primary"><?php echo $user['sexe']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            </div>

            <div class="col-md-12 col-lg-4 p-2 text-center bg-white"> 
            <?php foreach ($rdvs as $rdv) : ?>
                <?php if ($rdv['status'] == 'undo') : ?>
                    <div class="card border-danger my-1 shadow">
                        <div class="card-body">
                            <div>
                                <span class="badge rounded-pill bg-danger">annulé</span>
                            <?php echo date('l F,j Y', strtotime($rdv['date_rdv'])) . " at " . date('H:i', strtotime($rdv['date_rdv'])); ?>
                            </div>
                            <hr>
                            <div class="row">
                                <img class="col img-fluid rounded" src="./../profiles/<?php echo $user['picture']?>" style="max-width:100px;max-height:100px">
                                <div class="col d-flex flex-column justify-content-evenly">
                                    <h3 class="text-uppercase"><?php echo $user['first_name'] . " ". $user['last_name']?></h3>
                                    <p class="fst-italic text-primary"><?php echo $user['sexe']?></p>
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
<div class="row">
    <h5>Consultations effectuées</h5>
    <?php if($carnets):?>
    <?php foreach ($carnets as $carnet) : ?>
        <?php $user = getuserbyId($carnet['user_id']); ?>
        <div class="col-md-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <small>* <?php echo date("D j F Y", strtotime($carnet['date'])); ?></small>
                    <hr>
                    <p>Docteur : <?php echo $user['first_name'] . " " . $user['last_name'];; ?></p>
                </div>
            </div><!-- /.card -->
        </div>
    <?php endforeach; ?>
    <?php else:?>
        <div class="col-md-12 col-lg-6">
            <p>Aucun résultat pour l'instant</p>
        </div>
    <?php endif?>



</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap5',
            initialView: 'dayGridMonth',
            timeZone: 'UTC',
            events: [
                <?php if ($rdvs) : ?>
                    <?php foreach ($rdvs as $rdv) : ?>
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
    label: 'Login',
    data: [<?php echo $loginTotal ?? 0?>, <?php echo $doctorlogin ?? 0?>],
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

