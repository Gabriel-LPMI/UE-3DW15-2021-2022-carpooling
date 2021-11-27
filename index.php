<?php

use App\Controllers\CarsController;
use App\Controllers\UsersController;

require_once 'vendor/autoload.php';

$loader = new Twig_loader_Filesystem(__DIR__.'/templates');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$controller = new UsersController();
$users = $controller->getUsers();

$controller = new CarsController();
$cars =  $controller->getCars();

$controller = new UsersController();
$message = $controller->createUser();


echo $twig->render('home.html.twig', [
    'users' => $users,
    'cars'=>$cars,
    'message' => $message
]);