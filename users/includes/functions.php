<?php
/** personal function to encrypt a password
 * @var string
 * @return string
 */
function pass_crypt($string)
{
    $string = md5($string);
    $string = sha1($string);
    $string = hash('gost', $string);
    return $string;
}

