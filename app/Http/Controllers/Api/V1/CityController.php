<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
   /**
     * Menampilkan semua data kota.
     * TANPA PAGINASI.
     */
    public function index()
    {
        // Menggunakan get() untuk mengeksekusi query dan mendapatkan semua hasil.
        return City::with('country:Code,Name')->get();
    }

    /**
     * Menampilkan detail satu kota.
     * (Tidak ada perubahan di sini)
     */
    public function show(City $city)
    {
        return $city->load('country:Code,Name');
    }
}
