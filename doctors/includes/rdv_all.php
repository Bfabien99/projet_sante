<?php
$rdvs = getDoctorRdv($doctor['id']);
foreach ($rdvs as $rd) {
    if (strtotime($rd['date_rdv']) <= time()) {
        // supprime le rendez-vous si la date est passée
        cancelRdv($rd['rdv_id']);
    }
}
?>
<div class="row d-flex justify-content-evenly g-2">
    <div class="col-md-12 col-lg-3 p-2 text-center border-top border-3 border-secondary rounded">
        <span class="badge rounded-pill bg-success"><i class="fa fa-check"></i> Rendez-vous confirmé</span>
        <div class="col p-2" style="max-height:200px; overflow: auto;">
            <?php foreach ($rdvs as $rdv) : ?>
                <?php if ($rdv['status'] == 'confirm') : ?>
                    <div class="card border-success my-1">
                        <div class="card-body">
                            <?php echo date('D M,jS Y', strtotime($rdv['date_rdv'])) . " at " . date('H:i', strtotime($rdv['date_rdv'])); ?>
                            <span><i class="d-inline text-success rounded fa fa-eye" onclick="see(<?php echo $rdv['rdv_id'] ?>,'cancel')"></i></span>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-md-12 col-lg-3 p-2 text-center border-top border-3 border-secondary rounded">
        <span class="badge rounded-pill bg-warning"><i class="fa fa-exclamation"></i> Rendez-vous en attente de confirmation</span>
        <div class="col p-2" style="max-height:200px; overflow: auto;">
            <?php foreach ($rdvs as $rdv) : ?>
                <?php if ($rdv['status'] == 'wait') : ?>
                    <div class="card border-warning my-1">
                        <div class="card-body">
                            <?php echo date('D M,jS Y', strtotime($rdv['date_rdv'])) . " at " . date('H:i', strtotime($rdv['date_rdv'])); ?>
                            <span><i class="d-inline text-warning rounded fa fa-eye" onclick="see(<?php echo $rdv['rdv_id'] ?>,'confirm')"></i></span>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-md-12 col-lg-3 p-2 text-center border-top border-3 border-secondary rounded">
        <span class="badge rounded-pill bg-danger"><i class="fa fa-close"></i> Rendez-vous annuler</span>
        <div class="col p-2" style="max-height:200px; overflow: auto;">
            <?php foreach ($rdvs as $rdv) : ?>
                <?php if ($rdv['status'] == 'undo') : ?>
                    <div class="card border-danger my-1">
                        <div class="card-body">
                            <?php echo date('D M,jS Y', strtotime($rdv['date_rdv'])) . " at " . date('H:i', strtotime($rdv['date_rdv'])); ?>
                            <span><i class="d-inline text-danger rounded fa fa-eye" onclick="see(<?php echo $rdv['rdv_id'] ?>,'undo')"></i></span>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

</div>
<hr>
<div class="row d-flex justify-content-center align-items-center h-100" id="result">
    <p>Details rendez-vous</p>
</div>
<script>
    function see(id, type) {
        var input = id;

        if (input != "") {
            $.ajax({
                url: "see_rdv.php",
                method: "POST",
                data: {
                    input: input,
                    type: type
                },
                success: function(data) {
                    if (data) {
                        $("#result").html(data);
                    }

                }
            })
        } else {
            window.location.reload()
        }
    }
</script>