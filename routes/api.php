<?php

use App\Http\Controllers\Api\V1\CityController;
use App\Http\Controllers\Api\V1\CountryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Grouping routes by version
Route::prefix('v1')->group(function () {
    // Route untuk resource Country
    Route::apiResource('countries', CountryController::class);
    Route::get('countries/{country}/cities', [CountryController::class, 'citiesByCountry']);

    // Route untuk resource City
    Route::apiResource('cities', CityController::class);
});
