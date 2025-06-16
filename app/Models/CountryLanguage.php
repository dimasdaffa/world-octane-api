<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryLanguage extends Model
{
    use HasFactory;

    protected $table = 'countrylanguage';

    /**
     * Model ini tidak menggunakan timestamps (created_at, updated_at).
     *
     * @var bool
     */
    public $timestamps = false;
}
