<?php
    $rdvs = getUserRdv($user['id']);
?>
<div class="row d-flex justify-content-evenly">
    <div class="col-md-12 col-lg-4 p-2 text-center bg-white">
        <span class="badge rounded-pill bg-success"><i class="fa fa-check"></i> Rendez vous confirmé</span>
        <div class="col p-2" style="max-height:200px; overflow: auto;">
            <?php foreach ($rdvs as $rdv):?>
            <?php if($rdv['status'] == 'confirm'):?>
        <div class="card border-success my-1">
            <div class="card-body">
            <?php echo date('l F,j Y',strtotime($rdv['date_rdv']))." at ".date('H:i',strtotime($rdv['date_rdv'])); ?>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach;?>
        </div>
        
        
    </div>
    <div class="col-md-12 col-lg-4 p-2 text-center bg-white"> 
        <span class="badge rounded-pill bg-warning"><i class="fa fa-exclamation"></i> Rendez vous en attente de confirmation</span>
        <div class="col p-2" style="max-height:200px; overflow: auto;">
            <?php foreach ($rdvs as $rdv):?>
            <?php if($rdv['status'] == 'wait'):?>
        <div class="card border-warning my-1">
            <div class="card-body">
                <?php echo date('l F,j Y',strtotime($rdv['date_rdv']))." at ".date('H:i',strtotime($rdv['date_rdv'])); ?>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach;?>
        </div>
        

    </div>
</div>
<hr>
<div class="row">

</div>