<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Country extends Model
{
    public function index()
    {
        $ttl = 3600; // Time To Live: 1 jam dalam detik

        // Gunakan Cache::remember
        return Cache::remember('countries.all', $ttl, function () {
            return Country::all();
        });
    }

    public function show(Country $country)
    {
        $ttl = 3600;

        // Key cache harus unik untuk setiap negara
        return Cache::remember('countries.' . $country->Code, $ttl, function () use ($country) {
            return $country;
        });
    }

    public function citiesByCountry(Country $country)
    {
        $ttl = 3600;

        // Key cache unik untuk relasi kota per negara
        return Cache::remember('countries.' . $country->Code . '.cities', $ttl, function () use ($country) {
            return $country->cities;
        });
    }
}
