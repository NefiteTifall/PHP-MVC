<?php

session_start();
//Faire en sorte qu'on ne puisse pas modifier le panier en commandant trop d'éolienne
//
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
$router->get('/article/create', "ArticleController@create");
$router->get('/article/:id', "ArticleController@show");
$router->get('/team', "MainController@team");
$router->get('/contact', "MainController@contact");
$router->get('/cart', "MainController@cart");
$router->get('/checkout', "MainController@commande");

$router->get('/comment/:id/delete', "CommentController@deleteCom");
$router->get('/destroy', "MainController@destroySession"); // Développement à enlever sur la prod
$router->get('/deleteCart/:id', "MainController@deleteFromCart");

$router->post('/article/create', "ArticleController@store");

$router->post('/valideUser/:username', "UserController@isUserNameValide");
$router->post('/login/', "UserController@login");
$router->post('/register/', "UserController@register");
$router->post('/addCart', "MainController@addCart");
$router->post('/checkout', "CommandeController@store");
$router->post('/changeCart', "MainController@changeCart");
$router->post('/contact', "ContactController@store");
$router->post('/comment/:id', "CommentController@addComment");

$router->run();
