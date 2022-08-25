<h1 class="text-center">La liste des docteurs</h1>
    <input type="search" class="form-control" name="search" id="live_search" placeholder="Rechercher un docteur">
<div class="row" id="searchresult">
    <?php
    $doctors = getAllDoctor();
    if ($doctors) {
        foreach ($doctors as $doctor) {
    ?>
            <div class="col-md-6 col-lg-3" style="margin:2em 0;">
                <div class="card shadow">
                    <h3 class="alert alert-info text-center text-uppercase"><?php echo $doctor['fonction']; ?></h3>
                    <div class="bg-image hover-overlay ripple p-2 d-flex justify-content-center" data-mdb-ripple-color="light">
                        <img src="./../profiles/<?php echo $doctor['picture']; ?>" class="rounded-circle img-fluid" alt="<?php echo $doctor['first_name'] . "_" . $doctor['last_name']; ?>" style="width:140px;height:140px;object-fit:cover;"/>
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-center"><?php echo $doctor['first_name'] . " " . $doctor['last_name']; ?></h5>
                        <hr>
                        <p class="card-text"><?php echo $doctor['description'] ?></p>
                        <a href="?d_id=<?php echo $doctor['id'] ?>" class="btn btn-primary">details</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p class="h4 text-muted">Aucun docteur pour l'instant</p>
    <?php } ?>
</div>
<script>
    $(document).ready(function(){

        $("#live_search").keyup(function(){
            var input = $(this).val();
            
            if(input != ""){
                $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{input: input},
                    success:function(data){
                        if(data){
                          $("#searchresult").html(data);  
                        }
                        
                    }
                })
            }else{
                window.location.reload()
            }
        })
    })
</script>