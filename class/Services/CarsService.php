<?php declare(strict_types = 1);

namespace App\Services;

use App\Entities\Car;

class CarsService
{
    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $dataBaseService = new DataBaseService();
        $carsDTO = $dataBaseService->getCars();
        if (!empty($carsDTO)) {
            foreach ($carsDTO as $carDTO) {
                $car = new Car();
                $car->setId($carDTO['id_car']);
                $car->setBrand($carDTO['brand']);
                $car->setModel($carDTO['model']);
                $car->setColor($carDTO['color']);
                $car->setNbrSlots((int) $carDTO['nbrSlots']);
                $cars[] = $car;
            }
        }

        return $cars;
    }

    /**
     * Create or update a cars.
     */
    public function setCar(?string $id, string $brand, string $model, string $color, string $nbrSlots): string
    {
        $carId = '';

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $carId = $dataBaseService->setCar($brand, $model, $color, (int) $nbrSlots);
        } else {
            $dataBaseService->updateCar($id, $brand, $model, $color, (int) $nbrSlots);
            $carId = $id;
        }

        return $carId;
    }

    /**
     * delet a car service.
     */
    public function deleteCar(string $id): bool
    {
        $dataBaseService = new DataBaseService();

        return $dataBaseService->deleteCar($id);
    }
}
