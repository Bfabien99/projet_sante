<?php
function pass_crypt($string)
{
    $string = md5($string);
    $string = sha1($string);
    $string = hash('gost', $string);
    return $string;
}

/** personal function to connect with db
 * @return bool|string
 */
function connect($dbHost, $dbUsername, $dbPassword, $dbName)
{
    $db = new mysqli(
        $dbHost,
        $dbUsername,
        $dbPassword,
        $dbName
    );
    if ($db->connect_error) {
        die("Cannot connect to database: \n"
            . $db->connect_error . "\n"
            . $db->connect_error);
    }
    return $db;
}

function escapeString($string)
{
    global $db;
    $new_string = mysqli_real_escape_string($db, strtolower($string));
    return $new_string;
}

##########################
// ALL FUNCTIONS FOR USERS
###########################
#######
#######
###############
#######
##

/** personal function to register a new user
 * @return bool|string
 */
function userRegister(
    $fname,
    $lname,
    $birth,
    $contact,
    $sexe,
    $email,
    $pseudo,
    $password,
    $emergency,
    $profession,
    $marital,
    $children,
    $weight,
    $height,
    $blood,
    $allergy,
    $antecedant
) {
    global $db;
    $sql = "INSERT INTO users(first_name,last_name,birth,contact,emergency_contact,email,sexe,weight,height,blood,allergy,medical_background,children,marital_status,profession,pseudo,password) ";
    $sql .= "VALUES ('{$fname}','{$lname}','{$birth}','{$contact}','{$emergency}','{$email}','{$sexe}','{$weight}','{$height}','{$blood}','{$allergy}','{$antecedant}','{$children}','{$marital}','{$profession}','{$pseudo}','{$password}')";

    if ($db->query($sql)) {
        return true;
    } else {
        return false;
        //return "<div class='alert alert-warning'>Error: " . $sql . "<br>" . "$db->error;</div>";
    }
}

/** personal function to update user information
 * @return bool
 */
function userUpdate(
    $id,
    $fname,
    $lname,
    $birth,
    $contact,
    $sexe,
    $email,
    $pseudo,
    $password,
    $emergency,
    $profession,
    $marital,
    $children,
    $weight,
    $height,
    $blood,
    $allergy,
    $antecedant
) {
    global $db;
    $sql = "UPDATE users SET ";
    $sql .= "first_name = '{$fname}', ";
    $sql .= "last_name = '{$lname}', ";
    $sql .= "birth = '{$birth}', ";
    $sql .= "contact = {$contact}, ";
    $sql .= "emergency_contact = '{$emergency}', ";
    $sql .= "email = '{$email}', ";
    $sql .= "sexe = '{$sexe}', ";
    $sql .= "weight = '{$weight}', ";
    $sql .= "height = '{$height}', ";
    $sql .= "blood = '{$blood}', ";
    $sql .= "allergy = '{$allergy}', ";
    $sql .= "medical_background = '{$antecedant}', ";
    $sql .= "children = '{$children}', ";
    $sql .= "marital_status = '{$marital}', ";
    $sql .= "profession = '{$profession}', ";
    $sql .= "pseudo = '{$pseudo}', ";
    $sql .= "password = '{$password}' ";
    $sql .= " WHERE id = '{$id}'";
    if ($db->query($sql)) {
        return true;
    } else {
        return false;
        //return "<div class='alert alert-warning'>Error: " . $sql . "<br>" . "$db->error;</div>";
    }
}

/** personal function to verify if user pseudo doesn't exist
 * @return bool
 */
function pseudoExists($pseudo)
{
    global $db;
    $sql = "SELECT pseudo FROM users WHERE pseudo = '$pseudo'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

/** personal function to to verify if user email doesn't exist
 * @return bool
 */
function emailExists($email)
{
    global $db;
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function loginUser($pseudo, $password)
{
    global $db;
    $sql = "SELECT * FROM users WHERE (email = '$pseudo' OR pseudo = '$pseudo') AND password = '$password'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION['hp_user_pseudo'] = $data['pseudo'];
        $_SESSION['hp_user_email'] = $data['email'];
        return true;
    } else {
        return false;
    }
}

function isUser($email, $pseudo)
{
    global $db;
    $sql = "SELECT * FROM users WHERE email = '$email' AND pseudo = '$pseudo'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function getUserbyPseudo($pseudo)
{
    global $db;
    $sql = "SELECT pseudo FROM users WHERE pseudo = '$pseudo'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data;
    } else {
        return false;
    }
}

function getAllUser()
{
    global $db;
    $data = [];

    $sql = "SELECT * FROM users";
    $results = $db->query($sql);

    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}


##########################
// ALL FUNCTIONS FOR DOCTORS
###########################
#######
#######
###############
#######
##

/** personal function to register a new doctor
 * @return bool|string
 */
function doctorRegister(
    $fname,
    $lname,
    $fonction,
    $sexe,
    $description,
    $experience,
    $contact1,
    $contact2,
    $email,
    $pseudo,
    $password,
    $picture,
) {
    global $db;
    $sql = "INSERT INTO doctors(first_name,last_name,fonction,sexe,description,experience,contact1,contact2,email,pseudo,password,picture) ";
    $sql .= "VALUES ('{$fname}','{$lname}','{$fonction}','{$sexe}','{$description}','{$experience}','{$contact1}','{$contact2}','{$email}','{$pseudo}','{$password}','{$picture}')";

    if ($db->query($sql)) {
        return true;
    } else {
        return false;
        //return "<div class='alert alert-warning'>Error: " . $sql . "<br>" . "$db->error;</div>";
    }
}

function doctorUpdate(
    $id,
    $fname,
    $lname,
    $fonction,
    $sexe,
    $description,
    $experience,
    $contact1,
    $contact2,
    $email,
    $pseudo,
    $password,
    $picture,
) {
    global $db;
    $sql = "UPDATE doctors SET ";
    $sql .= "first_name = '{$fname}', ";
    $sql .= "last_name = '{$lname}', ";
    $sql .= "fonction = '{$fonction}', ";
    $sql .= "sexe = '{$sexe}', ";
    $sql .= "description = '{$description}', ";
    $sql .= "experience = '{$experience}', ";
    $sql .= "contact1 = {$contact1}, ";
    $sql .= "contact2 = {$contact2}, ";
    $sql .= "email = '{$email}', ";
    $sql .= "pseudo = '{$pseudo}', ";
    $sql .= "password = '{$password}' ";
    $sql .= "password = '{$picture}' ";
    $sql .= " WHERE id = '{$id}'";
    if ($db->query($sql)) {
        return true;
    } else {
        return false;
        //return "<div class='alert alert-warning'>Error: " . $sql . "<br>" . "$db->error;</div>";
    }
}

function pseudoExist($pseudo)
{
    global $db;
    $sql = "SELECT pseudo FROM doctors WHERE pseudo = '$pseudo'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function emailExist($email)
{
    global $db;
    $sql = "SELECT email FROM doctors WHERE email = '$email'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function loginDoctor($pseudo, $password)
{
    global $db;
    $sql = "SELECT * FROM doctors WHERE (email = '$pseudo' OR pseudo = '$pseudo') AND password = '$password'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION['hp_doctor_pseudo'] = $data['pseudo'];
        $_SESSION['hp_doctor_email'] = $data['email'];
        return true;
    } else {
        return false;
    }
}

function isDoctor($email, $pseudo)
{
    global $db;
    $sql = "SELECT * FROM doctors WHERE email = '$email' AND pseudo = '$pseudo'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function getDoctorbyPseudo($pseudo)
{
    global $db;
    $sql = "SELECT pseudo FROM doctors WHERE pseudo = '$pseudo'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data;
    } else {
        return false;
    }
}

function getAllDoctor()
{
    global $db;
    $data = [];

    $sql = "SELECT * FROM doctors";
    $results = $db->query($sql);

    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}


##########################
// ALL FUNCTIONS FOR ADMIN
###########################
#######
#######
###############
#######
##

function loginAdmin($pseudo, $password)
{
    global $db;
    $sql = "SELECT * FROM admin WHERE (email = '$pseudo' OR pseudo = '$pseudo') AND password = '$password'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION['hp_admin_pseudo'] = $data['pseudo'];
        return true;
    } else {
        return false;
    }
}

function isAdmin($email, $pseudo)
{
    global $db;
    $sql = "SELECT * FROM admin WHERE email = '$email' AND pseudo = '$pseudo'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function getAdminbyPseudo($pseudo)
{
    global $db;
    $sql = "SELECT pseudo FROM admin WHERE pseudo = '$pseudo'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data;
    } else {
        return false;
    }
}
