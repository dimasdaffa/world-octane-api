<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\JsonResponse; // Import JsonResponse
use Illuminate\Support\Facades\Cache;

class CityController extends Controller
{
    /**
     * Display a listing of all cities.
     * This version caches the final transformed array, which is much faster.
     */
    public function index(): JsonResponse
    {
        // The cache key remains the same, but what we store is different.
        $cities = Cache::remember('cities.all.transformed', 3600, function () {
            // 1. Fetch data from DB with eager loading.
            $data = City::with('country:Code,Name')->get();

            // 2. Transform it using the API Resource. This converts it to a plain array.
            //    This is the step we are now caching.
            return CityResource::collection($data)->resolve();
        });

        // 3. Return the already-prepared array/JSON.
        //    This skips all serialization/transformation steps on a cache hit.
        return response()->json($cities);
    }

    /**
     * Display the specified city.
     * Caches the final transformed JSON of a single city.
     */
    public function show(City $city): JsonResponse
    {
        $cityData = Cache::remember('cities.' . $city->ID . '.transformed', 3600, function () use ($city) {
            // 1. Load the relationship on the specific model instance.
            $city->load('country:Code,Name');

            // 2. Transform it into a plain array using our resource.
            return (new CityResource($city))->resolve();
        });

        // 3. Return the already-prepared data.
        return response()->json($cityData);
    }
}
