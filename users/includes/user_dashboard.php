<?php

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
    <div class="col-md-12 col-lg-4">
        les 3 derniers rendez vous
        <hr>
        <span class="badge rounded-pill bg-warning">Rendez vous en attente de confirmation</span>
        <span class="badge rounded-pill bg-danger">Rendez vous annulé</span>
        <span class="badge rounded-pill bg-success">Rendez vous confirmé</span>
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

        });
        calendar.updateSize();
        calendar.render();
    });
</script>