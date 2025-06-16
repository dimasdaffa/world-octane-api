<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        // Menggunakan all() untuk mendapatkan semua record dari tabel.
        return Country::all();
    }

    /**
     * Menampilkan detail satu negara.
     * (Tidak ada perubahan di sini)
     */
    public function show(Country $country)
    {
        return $country;
    }

    /**
     * Menampilkan semua kota dari suatu negara.
     * TANPA PAGINASI.
     */
    public function citiesByCountry(Country $country)
    {
        // Langsung mengambil semua data dari relasi 'cities'
        return $country->cities;
    }
}
