<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Foxwind\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "MainController@index");
$router->get('/login/', "UserController@showLogin");
$router->get('/register/', "UserController@showRegister");
$router->get('/logout/', "UserController@logout");
$router->get('/eolienne', "MainController@eolienne");
//$router->get('/blog', "placeholder@placeholder");
//$router->get('/article/:id', "placeholder@placeholder");
//$router->get('/team', "placeholder@placeholder");
$router->get('/contact', "MainController@contact");
//$router->get('/cart', "placeholder@placeholder");
//$router->get('/checkout', "placeholder@placeholder");


$router->post('/valideUser/:username', "UserController@isUserNameValide");
$router->post('/login/', "UserController@login");
$router->post('/register/', "UserController@register");
//$router->post('/addCart', "placeholder@placeholder");
//$router->post('/checkout', "placeholder@placeholder");
//$router->post('/contact', "placeholder@placeholder");

$router->run();
