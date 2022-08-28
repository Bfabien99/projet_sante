<div class="row">
    <div class="col-lg-12">


        <h1 class="page-header">
            Bienvenue
            <small> <?php echo $_SESSION['hp_admin_pseudo'] ?></small>
        </h1>


    </div>
</div>

<div class="row">

    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-plus fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php

                        $query = "SELECT * FROM doctors";
                        $select_all_doctors = mysqli_query($db, $query);
                        $doctor_count = mysqli_num_rows($select_all_doctors);

                        echo  "<div class='huge'>{$doctor_count}</div>"

                        ?>


                        <div>Docteur</div>
                    </div>
                </div>
            </div>
            <a href="./doctors.php">
                <div class="panel-footer">
                    <span class="pull-left">Voir detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php

                        $query = "SELECT * FROM users";
                        $select_all_users = mysqli_query($db, $query);
                        $user_count = mysqli_num_rows($select_all_users);

                        echo  "<div class='huge'>{$user_count}</div>"

                        ?>


                        <div> Utilisateur</div>
                    </div>
                </div>
            </div>
            <a href="./users.php">
                <div class="panel-footer">
                    <span class="pull-left">Voir detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-folder fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                        <?php

                        $query = "SELECT * FROM roles";
                        $select_all_roles = mysqli_query($db, $query);
                        $role_count = mysqli_num_rows($select_all_roles);

                        echo  "<div class='huge'>{$role_count}</div>"
                        ?>


                        <div> Service</div>
                    </div>
                </div>
            </div>
            <a href="./services.php">
                <div class="panel-footer">
                    <span class="pull-left">Voir detail</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

</div>
<hr>
<div class="row" style="gap: 2em;text-align: center;">

    <div class="col-lg-5 col-md-12" style="padding:1em;box-shadow:0px 0px 5px lightgrey;background-color:white;margin: 3%;">
        <h3 class="text-center">Docteurs récemments inscrits</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>-</th>
                    <th>Nom & Prénoms</th>
                    <th>Pseudo</th>
                    <th>Ajouté le</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM doctors ORDER BY created DESC LIMIT 5";
                $select_all_doctors = mysqli_query($db, $query);
                while ($row = mysqli_fetch_assoc($select_all_doctors)) {
                ?>
                    <tr>
                        <td><img src="./../profiles/<?php echo $row['picture'] ?>" class="img-responsive" alt="" width="30px" height="30px" style="border-radius:50%;object-fit: cover;"></td>
                        <td class="text-uppercase"><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                        <td><?php echo $row['pseudo'] ?></td>
                        <td><?php echo date('d-m-Y H:i', strtotime($row['created'])) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="col-lg-5 col-md-12" style="padding:1em;box-shadow:0px 0px 5px lightgrey;background-color:white;margin: 3%;">
        <h3 class="text-center">Utilisateurs récemments inscrits</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>-</th>
                    <th>Nom & Prénoms</th>
                    <th>Pseudo</th>
                    <th>Ajouté le</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $query = "SELECT * FROM users ORDER BY created DESC LIMIT 5";
                $select_all_users = mysqli_query($db, $query);
                while ($row = mysqli_fetch_assoc($select_all_users)) {
                ?>
                    <tr>
                        <td><img src="./../profiles/<?php echo $row['picture'] ?>" class="img-responsive" alt="" width="30px" height="30px" style="border-radius:50%;object-fit: cover;"></td>
                        <td class="text-uppercase"><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
                        <td><?php echo $row['pseudo'] ?></td>
                        <td><?php echo date('d-m-Y H:i', strtotime($row['created'])) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.row -->