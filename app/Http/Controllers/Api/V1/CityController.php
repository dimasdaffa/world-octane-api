<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CityController extends Controller
{
    /**
     * Menampilkan semua data kota dengan caching.
     */
    public function index()
    {
        return Cache::remember('cities.all.with.country', 3600, function () {
            // Eager load relasi country
            return City::with('country:Code,Name')->get();
        });
    }

    /**
     * Menampilkan detail satu kota dengan caching.
     */
    public function show(City $city)
    {
        return Cache::remember('cities.' . $city->ID . '.with.country', 3600, function () use ($city) {
            // Eager load relasi country
            return $city->load('country:Code,Name');
        });
    }
}
