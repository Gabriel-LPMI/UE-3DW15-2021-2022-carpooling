<?php declare(strict_types = 1);

use App\Controllers\UsersController;

require __DIR__ . '/vendor/autoload.php';

$loader = new Twig_loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$controller = new UsersController();
$message_delete_user = $controller->deleteUser();

echo $twig->render('userDelete.html.twig', [
    'message' => $message_delete_user,
]);
