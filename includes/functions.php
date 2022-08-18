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
function connect($dbHost,$dbUsername, $dbPassword, $dbName){
    $db = new mysqli(
        $dbHost,
        $dbUsername,
        $dbPassword,
        $dbName
    );
    if($db->connect_error){
        die("Cannot connect to database: \n"
            . $db->connect_error . "\n"
            . $db->connect_error
        );
    }
    return $db;
}


/** personal function to register a new user
 * @return bool|string
 */
function userRegister(
    $db,
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
    ){
        $sql = "INSERT INTO users(first_name,last_name,birth,contact,emergency_contact,email,sexe,weight,height,blood,allergy,medical_background,children,marital_status,profession,pseudo,password) VALUES ('{$fname}','{$lname}','{$birth}','{$contact}','{$emergency}','{$email}','{$sexe}','{$weight}','{$height}','{$blood}','{$allergy}','{$antecedant}','{$children}','{$marital}','{$profession}','{$pseudo}','{$password}')";
        ;

        if($db->query($sql)){
            return true;
        }
        else{
            return false;
            //return "<div class='alert alert-warning'>Error: " . $sql . "<br>" . "$db->error;</div>";
        }
    }