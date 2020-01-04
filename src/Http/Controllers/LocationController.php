<?php
namespace Ichtrojan\Location\Http\Controllers;

use Ichtrojan\Location\Models\City;
use Ichtrojan\Location\Models\State;
use Ichtrojan\Location\Models\Country;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getCountries() {
        $countries = Country::get(['id', 'code', 'name', 'phonecode']);
        return response()->json($countries, 200);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getCountry($id) {
        $country = Country::where('id', $id)->get(['id', 'code', 'name', 'phonecode']);
        return response()->json($country,200);
    }

    /**
     * @return JsonResponse
     */
    public function getStates() {
        $states = State::get(['id', 'name', 'country_id']);
        return response()->json($states, 200);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getState($id) {
        $states = State::where('id', $id)->get(['id', 'name', 'country_id']);
        return response()->json($states, 200);
    }

    /**
     * @return JsonResponse
     */
    public function getCities() {
        $cities = City::get(['id', 'name', 'state_id']);
        return response()->json($cities, 200);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getCity($id) {
        $country = City::where('id', $id)->get(['id', 'name', 'state_id']);
        return response()->json($country, 200);
    }

    /**
     * @param $countryId
     * @return JsonResponse
     */
    public function getStatesByCountry($countryId) {
        $countryStates = State::where('country_id', $countryId)->get(['id', 'name']);
        return response()->json($countryStates, 200);
    }

    /**
     * @param $stateId
     * @return JsonResponse
     */
    public function getCitiesByStates($stateId) {
        $stateCities = City::where('state_id', $stateId)->get(['id', 'name']);
        return response()->json($stateCities, 200);
    }

    /**
     * @param $countryId
     * @return JsonResponse
     */
    public function getCitiesByCountry($countryId) {
        $countryCities = City::where('country_id', $countryId)->get(['id', 'name']);

        return response()->json($countryCities, 200);
    }
}
