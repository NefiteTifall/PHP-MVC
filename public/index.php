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
$router->get('/blog', "ArticleController@index");
$router->get('/article/:id', "ArticleController@show");
$router->get('/team', "MainController@team");
$router->get('/contact', "MainController@contact");
$router->get('/cart', "MainController@cart");
//$router->get('/checkout', "placeholder@placeholder");
$router->get('/deleteCart/:id', "MainController@deleteFromCart");


$router->post('/valideUser/:username', "UserController@isUserNameValide");
$router->post('/login/', "UserController@login");
$router->post('/register/', "UserController@register");
//$router->post('/addCart', "placeholder@placeholder");
//$router->post('/checkout', "placeholder@placeholder");
$router->post('/contact', "ContactController@store");

$router->run();
