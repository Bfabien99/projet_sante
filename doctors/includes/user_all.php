<h1 class="text-center text-uppercase">Liste des patients</h1>
<input type="search" class="form-control" name="search" id="live_search" placeholder="Rechercher un patient">
<div class="row" id="searchresult">
    <?php
    $users = getAllUser();
    if ($users) {
        foreach ($users as $user) {
    ?>
            <div class="col-md-6 col-lg-3" style="margin:2em 0;" data-aos="fade-up">
                <div class="card shadow">
                    <h3 class="badge round-pill bg-danger text-uppercase">Groupe sanguin: <?php echo $user['blood']; ?></h3>
                    <div class="bg-image hover-overlay ripple p-2 d-flex justify-content-center" data-mdb-ripple-color="light">
                        <img src="./../profiles/<?php echo $user['picture']; ?>" class="rounded-circle img-fluid" alt="<?php echo $user['first_name'] . "_" . $user['last_name']; ?>" style="width:140px;height:140px;object-fit:cover;" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-uppercase text-center"><?php echo $user['first_name'] . " " . $user['last_name']; ?></h5>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <h5>Taille</h5>
                                <p class="text-primary"><?php echo $user['height'] ?> Cm</p>
                            </div>
                            <div class="col">
                                <h5>Poids</h5>
                                <p class="text-primary"><?php echo $user['weight'] ?> Kg</p>
                            </div>
                            <div class="col">
                                <h5>Sexe</h5>
                                <p class="text-primary"><?php echo $user['sexe'] ?></p>
                            </div>
                        </div>
                        <a href="?p_id=<?php echo $user['id'] ?>" class="btn btn-primary">details</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p class="h4 text-muted">Aucun patient consult??</p>
        <a href="./" class="btn btn-primary">Retour</a>
    <?php } ?>
</div>
<script>
    $(document).ready(function() {

        $("#live_search").keyup(function() {
            var input = $(this).val();

            if (input != "") {
                $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {
                        input: input
                    },
                    success: function(data) {
                        if (data) {
                            $("#searchresult").html(data);
                        }

                    }
                })
            } else {
                window.location.reload()
            }
        })
    })
</script>