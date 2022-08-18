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
    mysqli $db,
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

    }