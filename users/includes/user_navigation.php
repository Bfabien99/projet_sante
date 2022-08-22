<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 shadow">
    <a href="profil.php" class="navbar-brand d-flex align-items-center">

        <img class="rounded-circle" src="./../profiles/<?php echo $user['picture'] ?>" alt="<?php echo $user['pseudo'] ?>" width="50px">

        <h5><?php echo $user['pseudo']?></h5>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
            <a href="./" class="nav-item nav-link active">Home</a>
            <a href="doctor.php" class="nav-item nav-link">Docteur</a>
            <a href="carnet.php" class="nav-item nav-link">Carnet</a>
            <a href="rdv.php" class="nav-item nav-link">Rendez-vous</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Options</a>
                <div class="dropdown-menu bg-light border-0 m-0">
                    <a href="profil.php" class="dropdown-item">Profile</a>
                    <a href="?logout" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>