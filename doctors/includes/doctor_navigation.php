
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 shadow">
    <a href="profil.php" class="navbar-brand d-flex align-items-center">

        <img class="rounded-circle" src="./../profiles/<?php echo $doctor['picture'] ?>" alt="<?php echo $doctor['pseudo'] ?>" width="50px">

        <h5><?php echo $doctor['pseudo']?></h5>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
            <a href="./" class="nav-item nav-link active"><i class="fa fa-home"></i> Home</a>
            <a href="user.php" class="nav-item nav-link"><i class="fa fa-hospital-user"></i> Patient</a>
            <a href="rdv.php" class="nav-item nav-link"><i class="fa fa-calendar"></i> Rendez-vous</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-cog"></i> Options</a>
                <div class="dropdown-menu bg-light border-0 m-0">
                    <a href="profil.php" class="dropdown-item"><i class="fa fa-user"></i> Profile</a>
                    <a href="?logout" class="dropdown-item"><i class="fa fa-arrow-left"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>