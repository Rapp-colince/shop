<?php

namespace App\Http\Controllers;

use App\Events\OrderShipped;
use App\Exceptions\City\CityNotFoundByIdException;
use App\Http\Requests\City\SearchRequest;
use App\Models\City;
use App\Services\City\CityService;
use Illuminate\Contracts\View\View;

class CityController extends Controller
{
    /**
     * @return View
     */
    public function list(): View
    {
        // Event для примера
        // OrderShipped::dispatch(new City);

        $cities = City::all();
        return view('main.city.list', ['cities' => $cities->toArray()]);
    }

    /**
     * @param CityService $cityService
     * @param int $id
     * @return View
     */
    public function view(CityService $cityService, int $id): View
    {
        try {
            $city = $cityService->findById($id);
            $shops = $city->shops()->select(['id', 'name'])->get()->toArray();
        } catch (CityNotFoundByIdException) {
            abort(404);
        }
        return view('main.city.view', ['city' => $city, 'shops' => $shops]);
    }

    /**
     * @param SearchRequest $request
     * @param CityService $cityService
     * @return View
     */
    public function search(SearchRequest $request, CityService $cityService): View
    {
        $searchResult = $cityService->findByName($request->post('search-query'))->toArray();
        $view = view('main.city.search-result', ['searchResult' => $searchResult]);
        if (empty($searchResult)) {
            $view->withErrors(['Ничего не найдено :(']);
        }
        return $view;
    }
}
