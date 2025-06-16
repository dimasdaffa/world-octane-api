<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    public function index()
    {
        $ttl = 3600; // 1 jam

        return Cache::remember('cities.all.with.country', $ttl, function () {
            // Eager load tetap penting sebelum di-cache
            return City::with('country:Code,Name')->get();
        });
    }

    public function show(City $city)
    {
        $ttl = 3600;

        return Cache::remember('cities.' . $city->ID . '.with.country', $ttl, function () use ($city) {
            return $city->load('country:Code,Name');
        });
    }
}
