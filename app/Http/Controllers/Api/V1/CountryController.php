<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CountryController extends Controller
{
    /**
     * Menampilkan semua data negara dengan caching.
     */
    public function index()
    {
        return Cache::remember('countries.all', 3600, function () {
            return Country::all();
        });
    }

    /**
     * Menampilkan detail satu negara dengan caching.
     */
    public function show(Country $country)
    {
        return Cache::remember('countries.' . $country->Code, 3600, function () use ($country) {
            return $country;
        });
    }

    /**
     * Menampilkan semua kota dari suatu negara dengan caching.
     */
    public function citiesByCountry(Country $country)
    {
        return Cache::remember('countries.' . $country->Code . '.cities', 3600, function () use ($country) {
            return $country->cities;
        });
    }
}
