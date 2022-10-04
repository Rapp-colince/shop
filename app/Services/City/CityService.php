<?php

namespace App\Services\City;

use App\Exceptions\City\CityNotFoundByIdException;
use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityService
{
    /**
     * @param int $id
     * @return City
     * @throws CityNotFoundByIdException
     */
    public function findById(int $id): City
    {
        $city = City::where('id', $id)->first();
        if (is_null($city)) {
            throw new CityNotFoundByIdException();
        }
        return $city;
    }

    /**
     * @param string $name
     * @return Collection
     */
    public function findByName(string $name): Collection
    {
        return City::where('name', 'like', '%' . $name . '%')->get();
    }
}
