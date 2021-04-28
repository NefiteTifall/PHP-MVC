<?php

function error($field) {
    return isset($_SESSION["error"][$field]) ? $_SESSION["error"][$field]: "";
}

function old($field) {
    return isset($_SESSION["old"][$field]) ? $_SESSION["old"][$field] : "";
}

function msg($field) {
    return isset($_SESSION["msg"][$field]) ? $_SESSION["msg"][$field] : "";
}

function exist($var) {
    return isset($var) ? $var : "";
}

function existFalse($var) {
    return isset($var) ? $var : false;
}

function escape($data) {
    return stripslashes(trim(htmlspecialchars($data)));
}

function slugify($str) {
    // replace non letter or digits by -
    $str = preg_replace('~[^\pL\d]+~u', '-', $str);
    // transliterate
    $str = iconv('utf-8', 'us-ascii//TRANSLIT', $str);
    // remove unwanted characters
    $str = preg_replace('~[^-\w]+~', '', $str);
    // trim
    $str = trim($str, '-');
    // remove duplicate -
    $str = preg_replace('~-+~', '-', $str);
    // lowercase
    $str = strtolower($str);
    if (empty($str)) {
        return 'n-a';
    }
    return $str;
}


function frdate($date){
    // --- Met une date en français --- \\
    return date("d-m-Y", strtotime($date));
}
