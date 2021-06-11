<?php

chdir(__DIR__); // Change le dossier
$pathex = pathinfo($_SERVER["SCRIPT_FILENAME"]); // Récupération du nom du script potentiel
$filePath = realpath(ltrim($_SERVER["REQUEST_URI"], '/')); // Récupération du fichier dans le "/"
if ($filePath && is_file($filePath)) {
    // 1. Check si le fichier est bien dans le dossier pour la sécurité
    // 2. Check si le fichier n'est pas le router
    // 3. Check si ce n'est pas un dotfiles
    if (strpos($filePath, __DIR__ . DIRECTORY_SEPARATOR) === 0 &&
        $filePath != __DIR__ . DIRECTORY_SEPARATOR &&
        substr(basename($filePath), 0, 1) != '.'
    ) {
        if (strtolower(substr($filePath, -4)) == '.php') {
            include $filePath; // Inclue le fichier php
        } else {
            return false; // Return false
        }
    }
} else {
    if ($pathex["extension"] == "el") { // Si l'extension du script correspond
        readfile($_SERVER["SCRIPT_FILENAME"]); // Lecture pour application du script
    } else if($pathex["extension"] !== "php") { // Si celui-ci n'est pas du php
        return false; // Retourn false
    }
    // rewrite to our index file
    return include __DIR__ . DIRECTORY_SEPARATOR . 'index.php';
}