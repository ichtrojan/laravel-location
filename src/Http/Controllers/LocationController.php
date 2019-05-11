<?php
namespace Ichtrojan\Location\Http\Controllers;

use Ichtrojan\Location\Models\City;
use Ichtrojan\Location\Models\State;
use Ichtrojan\Location\Models\Country;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * @return Json
     */
    public function getCountries() {
        $countries = Country::get(['id', 'code', 'name', 'phonecode']);
        return response()->json($countries, 200);
    }

    /**
     * @param $id
     * @return Json
     */
    public function getCountry($id) {
        $country = Country::where('id', $id)->get(['id', 'code', 'name', 'phonecode']);
        return response()->json($country,200);
    }

    /**
     * @return Json
     */
    public function getStates() {
        $states = State::get(['id', 'name', 'country_id']);
        return response()->json($states, 200);
    }

    /**
     * @param $id
     * @return Json
     */
    public function getState($id) {
        $states = State::where('id', $id)->get(['id', 'name', 'country_id']);
        return response()->json($states, 200);
    }

    /**
     * @return Json
     */
    public function getCities() {
        $cities = City::get(['id', 'name', 'state_id']);
        return response()->json($cities, 200);
    }

    /**
     * @param $id
     * @return Json
     */
    public function getCity($id) {
        $country = City::where('id', $id)->get(['id', 'name', 'state_id']);
        return response()->json($country, 200);
    }

    /**
     * @param $countryId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStatesByCountry($countryId) {
        $countryStates = State::where('country_id', $countryId)->get(['id', 'name']);
        return response()->json($countryStates, 200);
    }

    /**
     * @param $stateId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCitiesByStates($stateId) {
        $stateCities = City::where('state_id', $stateId)->get(['id', 'name']);
        return response()->json($stateCities, 200);
    }
}