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
    $new_string = mysqli_real_escape_string($db, trim(strtolower($string)));
    return $new_string;
}


function cleanFile($file)
{
    $allowedExtensions = array('jpg', 'jpeg', 'png');
    if (!empty($_FILES[$file]) && ($_FILES[$file]['error'] == 0)) {
        if ($_FILES[$file]['size'] <= 4000000) {
            $fileInfo = pathinfo($_FILES[$file]['name']);
            $extension = $fileInfo['extension'];
        } else {
            return false;
        }

        //Verifie si l'extension est valide
        if (in_array($extension, $allowedExtensions)) {
            //On stocke le fichier
            $img = str_replace("/", "", md5(time()) . "_" . basename(str_replace([' ', '/', '@', '#', '$', "'"], ['_', '', '', '', ''], $_FILES[$file]['name'])));
            $img = str_replace(" ", "", $img);
            return $img;
        } else {
            return false;
        }
    }
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
    $antecedant,
    $picture
) {
    global $db;
    $sql = "INSERT INTO users(first_name,last_name,birth,contact,emergency_contact,email,sexe,weight,height,blood,allergy,medical_background,children,marital_status,profession,pseudo,password,picture) ";
    $sql .= "VALUES ('{$fname}','{$lname}','{$birth}','{$contact}','{$emergency}','{$email}','{$sexe}','{$weight}','{$height}','{$blood}','{$allergy}','{$antecedant}','{$children}','{$marital}','{$profession}','{$pseudo}','{$password}','{$picture}')";

    if ($db->query($sql)) {
        return true;
    } else {
        return false;
        //rereturn false;
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
    $antecedant,
    $picture
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
    $sql .= "password = '{$password}', ";
    $sql .= "picture = '{$picture}' ";
    $sql .= " WHERE id = '{$id}'";

    if ($db->query($sql)) {
        return true;
    } else {
        return false;
        //rereturn false;
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

    if ($result) {
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
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

    if ($result) {
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}

function loginUser($pseudo, $password)
{
    global $db;
    $sql = "SELECT * FROM users WHERE (email = '$pseudo' OR pseudo = '$pseudo') AND password = '$password'";
    $result = $db->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION['hp_user_pseudo'] = $data['pseudo'];
            $_SESSION['hp_user_email'] = $data['email'];
            userLogin($data['id']);
            return true;
        } else {
            return false;
        }
    }
}

function isUser($email, $pseudo)
{
    global $db;
    $sql = "SELECT * FROM users WHERE email = '$email' AND pseudo = '$pseudo'";
    $result = $db->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}

function getUserbyId($id)
{
    global $db;
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data;
    } else {
        return false;
    }
}

function getUserbyPseudo($pseudo)
{
    global $db;
    $sql = "SELECT * FROM users WHERE pseudo = '$pseudo'";
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

function getUserPicture($id)
{
    global $db;
    $sql = "SELECT picture FROM users WHERE id = '$id'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data['picture'];
    } else {
        return false;
    }
}

function getAllergy($id)
{
    global $db;
    $sql = "SELECT allergy FROM users WHERE id = '$id'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $allergies = explode(',', $data['allergy']);
        return $allergies;
    } else {
        return false;
    }
}

function getAntecedant($id)
{
    global $db;
    $sql = "SELECT medical_background FROM users WHERE id = '$id'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $antecedants = explode(',', $data['medical_background']);
        return $antecedants;
    } else {
        return false;
    }
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
    $birth,
    $sexe,
    $fonction,
    $description,
    $experience,
    $contact1,
    $contact2,
    $email,
    $pseudo,
    $password,
    $picture
) {
    global $db;
    $sql = "INSERT INTO doctors(first_name,last_name,birth,sexe,fonction,description,experience,contact1,contact2,email,pseudo,password,picture) ";
    $sql .= "VALUES ('{$fname}','{$lname}','{$birth}','{$sexe}','{$fonction}','{$description}','{$experience}','{$contact1}','{$contact2}','{$email}','{$pseudo}','{$password}','{$picture}')";

    if ($db->query($sql)) {
        return true;
    } else {
        return false;
        //rereturn false;
    }
}

function doctorUpdate(
    $id,
    $fname,
    $lname,
    $birth,
    $fonction,
    $sexe,
    $description,
    $experience,
    $contact1,
    $contact2,
    $email,
    $pseudo,
    $password,
    $picture
) {
    global $db;
    $sql = "UPDATE doctors SET ";
    $sql .= "first_name = '{$fname}', ";
    $sql .= "last_name = '{$lname}', ";
    $sql .= "birth = '{$birth}', ";
    $sql .= "fonction = '{$fonction}', ";
    $sql .= "sexe = '{$sexe}', ";
    $sql .= "description = '{$description}', ";
    $sql .= "experience = '{$experience}', ";
    $sql .= "contact1 = {$contact1}, ";
    $sql .= "contact2 = {$contact2}, ";
    $sql .= "email = '{$email}', ";
    $sql .= "pseudo = '{$pseudo}', ";
    $sql .= "password = '{$password}', ";
    $sql .= "picture = '{$picture}' ";
    $sql .= " WHERE id = '{$id}'";
    if ($db->query($sql)) {
        return true;
    } else {
        return false;
        //rereturn false;
    }
}

function pseudoExist($pseudo)
{
    global $db;
    $sql = "SELECT pseudo FROM doctors WHERE pseudo = '$pseudo'";
    $result = $db->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}

function emailExist($email)
{
    global $db;
    $sql = "SELECT email FROM doctors WHERE email = '$email'";
    $result = $db->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
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
        doctorLogin($data['id']);
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

    if ($result) {
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}

function getDoctorbyId($id)
{
    global $db;
    $sql = "SELECT * FROM doctors WHERE id = '$id'";
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

function getDoctorPicture($id)
{
    global $db;
    $sql = "SELECT picture FROM doctors WHERE id = '$id'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data['picture'];
    } else {
        return false;
    }
}

function getDoctorbyPseudo($pseudo)
{
    global $db;
    $sql = "SELECT * FROM doctors WHERE pseudo = '$pseudo'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data;
    } else {
        return false;
    }
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

    if ($result) {
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}

function getAdminbyPseudo($pseudo)
{
    global $db;
    $sql = "SELECT * FROM admin WHERE pseudo = '$pseudo'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data;
    } else {
        return false;
    }
}

function doctorUpdate_admin(
    $id,
    $fname,
    $lname,
    $birth,
    $fonction,
    $sexe,
    $description,
    $experience,
    $contact1,
    $contact2,
    $picture
) {
    global $db;
    $sql = "UPDATE doctors SET ";
    $sql .= "first_name = '{$fname}', ";
    $sql .= "last_name = '{$lname}', ";
    $sql .= "birth = '{$birth}', ";
    $sql .= "fonction = '{$fonction}', ";
    $sql .= "sexe = '{$sexe}', ";
    $sql .= "description = '{$description}', ";
    $sql .= "experience = '{$experience}', ";
    $sql .= "contact1 = {$contact1}, ";
    $sql .= "contact2 = {$contact2}, ";
    $sql .= "picture = '{$picture}' ";
    $sql .= " WHERE id = '{$id}'";
    if ($db->query($sql)) {
        return true;
    } else {
        return false;
    }
}

function userUpdate_admin(
    $id,
    $fname,
    $lname,
    $birth,
    $contact,
    $emergency,
    $sexe
) {
    global $db;
    $sql = "UPDATE users SET ";
    $sql .= "first_name = '{$fname}', ";
    $sql .= "last_name = '{$lname}', ";
    $sql .= "birth = '{$birth}', ";
    $sql .= "contact = '{$contact}', ";
    $sql .= "emergency_contact = '{$emergency}', ";
    $sql .= "sexe = '{$sexe}' ";
    $sql .= " WHERE id = '{$id}'";
    if ($db->query($sql)) {
        return true;
    } else {
        return false;
    }
}

function setRdv(
    $user_id,
    $doctor_id,
    $objet,
    $date
) {
    global $db;
    $sql = "INSERT INTO rdv (user_id, doctor_id, objet, date_rdv) ";
    $sql .= "VALUES('{$user_id}','{$doctor_id}','{$objet}','{$date}')";

    if ($db->query($sql)) {
        return true;
    } else {
        return false;
    }
}

function cancelRdv($rdv_id)
{
    global $db;
    $sql = "DELETE FROM rdv WHERE rdv_id = '$rdv_id'";

    if ($db->query($sql)) {
        return true;
    } else {
        return false;
    }
}

function confirmRdv($rdv_id)
{
    global $db;
    $sql = "UPDATE rdv SET status = 'confirm' WHERE rdv_id = '$rdv_id'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data;
    } else {
        return false;
    }
}

function undoRdv($rdv_id)
{
    global $db;
    $sql = "UPDATE rdv SET status = 'undo' WHERE rdv_id = '$rdv_id'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data;
    } else {
        return false;
    }
}

function getUserRdv($user_id)
{
    global $db;
    $sql = "SELECT * FROM rdv WHERE user_id = '$user_id'";
    $result = $db->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

function getUserRdvLimit($user_id)
{
    global $db;
    $sql = "SELECT * FROM rdv WHERE user_id = '$user_id' ORDER BY rdv_id DESC LIMIT 6";
    $result = $db->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

function getDoctorRdvLimit($doctor_id)
{
    global $db;
    $sql = "SELECT * FROM rdv WHERE doctor_id = '$doctor_id' ORDER BY rdv_id DESC LIMIT 6";
    $result = $db->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

function getDoctorRdv($doctor_id)
{
    global $db;
    $sql = "SELECT * FROM rdv WHERE doctor_id = '$doctor_id'";
    $result = $db->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

function userLogin($user_id) {
    global $db;
    $sql = "INSERT INTO user_login (user_id) ";
    $sql .= "VALUES('{$user_id}')";

    if ($db->query($sql)) {
        return true;
    } else {
        return false;
    }
}

function doctorLogin($doctor_id) {
    global $db;
    $sql = "INSERT INTO doctor_login (doctor_id) ";
    $sql .= "VALUES('{$doctor_id}')";

    if ($db->query($sql)) {
        return true;
    } else {
        return false;
    }
}

function getUserLogin($user_id)
{
    global $db;
    $sql = "SELECT * FROM user_login WHERE user_id = '$user_id'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        return $result->num_rows;
    } else {
        return false;
    }
}

function getDoctorLogin($doctor_id)
{
    global $db;
    $sql = "SELECT * FROM doctor_login WHERE doctor_id = '$doctor_id'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        return $result->num_rows;
    } else {
        return false;
    }
}

function TotalUserLogin()
{
    global $db;
    $sql = "SELECT * FROM user_login";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        return $result->num_rows;
    } else {
        return false;
    }
}

function TotalDoctorLogin()
{
    global $db;
    $sql = "SELECT * FROM doctor_login";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        return $result->num_rows;
    } else {
        return false;
    }
}

function getRdv($rdv_id){
    global $db;
    $sql = "SELECT * FROM rdv WHERE rdv_id = '$rdv_id'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        return $data;
    } else {
        return false;
    }
}