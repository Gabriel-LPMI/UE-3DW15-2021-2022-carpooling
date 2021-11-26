<?php

namespace App\Controllers;

use App\Services\CarsService;

class CarsController
{   
    /**
     * Create Car 
     */
     
    public function createCar(): string
    {
        $html = '';
        if (isset($_POST['brand']) &&
            isset($_POST['model']) &&
            isset($_POST['color']) &&
            isset($_POST['nbrSlots']) )
            {
                // Create the user :
                $carsService = new CarsService();
                $carsid = $carsService->setCar(
                    null,
                    $_POST['brand'],
                    $_POST['model'],
                    $_POST['color'],
                    $_POST['nbrSlots']
                );
            }
            if (isset($carsid) ) {
                $html = 'cars créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de la voiture .';
            }
        

        return $html;
    }

    /**
     * Update a car .
     */
    public function updateCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
           isset($_POST['brand']) &&
            isset($_POST['model']) &&
            isset($_POST['color']) &&
            isset($_POST['nbrSlots']) )
            {
            // Update the car :
            $carService = new CarsService();
            $isOk = $carService ->setCar(
                $_POST['id'],
                $_POST['brand'],
                $_POST['model'],
                $_POST['color'],
                $_POST['nbrSlots']
            );
            if ($isOk) {
                $html = 'car mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de car.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getCars(): string
    {
        $html = '';

        // Get all cars :
        $carsService = new CarsService();
        $cars = $carsService->getCars();

        // Get html :
        foreach ($cars as $car) {
            $carsHtml = '';
           
               
                    $carsHtml .= $car->getBrand() . ' ' . $car->getModel() . ' ' . $car->getColor() . ' '. $car->getnbrSlots();
            $html .=
                '#' . $car->getId() . ' ' .
                $car->getBrand() . ' ' .
                $car->getModel()  . ' ' .
                $car->getColor()  . ' ' .
                $car->getnbrSlots() . ' ' .
                $carsHtml . '<br />';
        }

        return $html;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the user :
            $carsService = new CarsService();
            $isOk = $carsService->deletecar($_POST['id']);
            if ($isOk) {
                $html = 'Voiture supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la voiture.';
            }
        }

        return $html;
    }
    
}
