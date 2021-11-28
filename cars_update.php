<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->updateCar();

?>
<p>Updated'une voiture</p>
<form method="post" action="cars_update.php" name ="carsUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <label for="brand">brand:</label>
    <input type="text" name="brand">
    <br />
    <label for="model">model:</label>
    <input type="text" name="model">
    <br />
    <label for="color">color :</label>
    <input type="text" name="color">
    <br />
    <label for="nbrSlots">nbrSlots:</label>
    <input type="number" name="nbrSlots">
    <input type="submit" value="updateune Voiteur">
</form>