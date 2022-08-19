<?php
if (empty($_SESSION['hp_admin_pseudo'])) {
    header('Location:./../?route=login');
}
?>



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
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php

                                    $query = "SELECT * FROM doctors";
                                    $select_all_comments = mysqli_query($db, $query);
                                    $comment_count = mysqli_num_rows($select_all_comments);

                                    echo  "<div class='huge'>{$comment_count}</div>"

                                    ?>


                                    <div>Docteur</div>
                                </div>
                            </div>
                        </div>
                        <a href="./?route=doctors">
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
                        <a href="./?route=users">
                            <div class="panel-footer">
                                <span class="pull-left">Voir detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
            <!-- /.row -->

        
    <?php

    ?>