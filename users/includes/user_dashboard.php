<?php
$rdvs = getUserRdvLimit($user['id']);
?>
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
    <div class="col-md-12 col-lg-4 bg-white">
        <?php if ($rdvs) : ?>
            <hr>
                Rendez-vous
            <?php foreach ($rdvs as $rdv) : ?>
                <?php if ($rdv['status'] == 'wait') : ?>
                    <div class="card border-warning my-1">
                        <div class="card-body">
                            <?php echo date('l F,j Y', strtotime($rdv['date_rdv'])) . " at " . date('H:i', strtotime($rdv['date_rdv'])); ?>
                        </div>
                    </div>
                <?php elseif ($rdv['status'] == 'confirm') : ?>
                    <div class="card border-success my-1">
                        <div class="card-body">
                            <span class="badge rounded-pill bg-success"><i class="fa fa-check"></i></span>
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
</div>
<hr>
Docteur consulter
<div class="row">

    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="box-title">Chandler</h4> -->
                <div class="card-title">Docteur consulter</div>
            </div>
        </div><!-- /.card -->
    </div>

    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="box-title">Chandler</h4> -->
                <div class="card-title">Docteur consulter</div>
            </div>
        </div><!-- /.card -->
    </div>

    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="box-title">Chandler</h4> -->
                <div class="card-title">Docteur consulter</div>
            </div>
        </div><!-- /.card -->
    </div>

</div>
<div class="row">
    graph de connexion
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