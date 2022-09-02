<?php

if (isset($_POST['input'])) {
    include('../includes/config.php');
    include('../includes/functions.php');
    $db = connect(
        DB_HOST,
        DB_USERNAME,
        DB_PASSWORD,
        DB_NAME
    );

    $input = escapeString($_POST['input']);

    $sql = "SELECT * FROM doctors WHERE first_name LIKE '{$input}%' OR last_name LIKE '{$input}%' OR fonction LIKE '{$input}%'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        while ($doctor = $result->fetch_assoc()) {
?>
            <div class="col-md-6 col-lg-3" style="margin:2em 0;" data-aos="fade-down">
                <div class="card shadow">
                    <h3 class="alert alert-info text-center text-uppercase border-top border-2 border-primary"><?php echo $doctor['fonction']; ?></h3>
                    <div class="bg-image hover-overlay ripple p-2 d-flex justify-content-center" data-mdb-ripple-color="light">
                        <img src="./../profiles/<?php echo $doctor['picture']; ?>" class="rounded-circle img-fluid" alt="<?php echo $doctor['first_name'] . "_" . $doctor['last_name']; ?>" style="width:140px;height:140px;object-fit:cover;" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body border-left">
                        <h5 class="card-title text-uppercase text-center text-primary"><?php echo $doctor['first_name'] . " " . $doctor['last_name']; ?></h5>
                        <hr>
                        <p class="card-text" style="overflow: hidden;height:50px;"><?php echo $doctor['description'] ?></p>
                        <a href="?d_id=<?php echo $doctor['id'] ?>" class="btn btn-primary">details</a>
                    </div>
                </div>
            </div>
<?php }
    } else {
        echo "<h6 class='text-danger text-center mt-3'>Aucune correspondance</h6>";
    }
} ?>