<?php declare(strict_types = 1);
require_once 'vendor/autoload.php';

$loader = new Twig_loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

use App\Controllers\UsersController;
use App\Services\CarsService;

$carsService = new CarsService();
$cars = $carsService->getCars();

$userController = new UsersController();
$messageUserCreation = $userController->createUser();

foreach ($cars as $car) {
    $carName[] = $car->getBrand();
    $carBrand = $car->getModel();
    $carColor = $car->getColor();
    $carId[] = $car->getId();
}

echo $twig->render('formUserCreate.html.twig', [
    'carName' => $carName,
    'carId' => $carId,
    'message' => $messageUserCreation,
]);
