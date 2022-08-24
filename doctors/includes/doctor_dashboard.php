<?php
$rdvs = getdoctorRdvLimit($doctor['id']);
$doctorlogin = getdoctorLogin($doctor['id']);
$loginTotal = TotaldoctorLogin();
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="row">
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="box-title">Chandler</h4> -->
                <div class="calender-cont widget-calender">
                    <div id="calendar"></div>
                </div>
            </div>
        </div><!-- /.card -->
    </div>

    <div class="col-md-12 col-lg-4">
        <?php if ($rdvs) : ?>
            <hr>
                Rendez-vous
            <?php foreach ($rdvs as $rdv) : ?>
                <?php if ($rdv['status'] == 'wait') : ?>
                    <div class="card border-warning my-1 bg-white">
                        <div class="card-body">
                        <span class="badge rounded-pill bg-warning"><i class="fa fa-exclamation"></i></span>
                            <?php echo date('l F,j Y', strtotime($rdv['date_rdv'])) . " at " . date('H:i', strtotime($rdv['date_rdv'])); ?>
                        </div>
                    </div>
                <?php elseif ($rdv['status'] == 'confirm') : ?>
                    <div class="card border-success my-1 bg-white">
                        <div class="card-body">
                            <span class="badge rounded-pill bg-success"><i class="fa fa-check"></i></span>
                            <?php echo date('l F,j Y', strtotime($rdv['date_rdv'])) . " at " . date('H:i', strtotime($rdv['date_rdv'])); ?>
                        </div>
                    </div>
                    <?php elseif ($rdv['status'] == 'undo') : ?>
                    <div class="card border-danger my-1 bg-white">
                        <div class="card-body">
                            <span class="badge rounded-pill bg-danger"><i class="fa fa-close"></i></span>
                            <?php echo date('l F,j Y', strtotime($rdv['date_rdv'])) . " at " . date('H:i', strtotime($rdv['date_rdv'])); ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php else: ?>
                <hr>
                Aucun rendez-vous pris
        <?php endif; ?>
    </div>

    <div class="col-md-12 col-lg-4">
        <div class="card bg-white">
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    
    </div>
</div>
<hr>
Docteur consulter
<div class="row">

    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="box-title">Chandler</h4> -->
                <div class="card-title">Patient consulter</div>
            </div>
        </div><!-- /.card -->
    </div>


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

