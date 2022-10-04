<?php

namespace App\Services\Shop;

use App\Exceptions\Shop\ShopNotFoundByIdException;
use App\Models\Shops;

class ShopService
{
    /**
     * @param int $id
     * @return Shops
     * @throws ShopNotFoundByIdException
     */
    public function findById(int $id): Shops
    {
        $shop = Shops::where('id', $id)->first();
        if (is_null($shop)) {
            throw new ShopNotFoundByIdException();
        }
        return $shop;
    }

}
