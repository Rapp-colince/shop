<?php

namespace App\Http\Controllers;

use App\Exceptions\Shop\ShopNotFoundByIdException;
use App\Models\Shops;
use App\Services\Shop\ShopService;
use Illuminate\Contracts\View\View;

class ShopsController extends Controller
{
    /**
     * @return View
     */
    public function list(): View
    {
        $shops = Shops::all();
        foreach ($shops as $shop) {
            $shop->cityInfo = $shop->city()->first(['id', 'name'])->toArray();
        }
        return view('main.shop.list', ['shops' => $shops->toArray()]);
    }

    /**
     * @param ShopService $shopService
     * @param int $id
     * @return View
     */
    public function view(ShopService $shopService, int $id): View
    {
        try {
            $shop = $shopService->findById($id);
            $city = $shop->city();
        } catch (ShopNotFoundByIdException) {
            abort(404);
        }
        return view('main.shop.view', ['shop' => $shop->toArray(), 'city' => $city->first(['id', 'name'])->toArray()]);
    }
}
