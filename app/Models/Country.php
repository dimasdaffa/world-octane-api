<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    /**
     * Nama tabel yang terhubung dengan model.
     *
     * @var string
     */
    protected $table = 'country';

    /**
     * Primary key untuk model.
     *
     * @var string
     */
    protected $primaryKey = 'Code';

    /**
     * Menunjukkan bahwa primary key bukan auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Tipe data dari primary key.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Model ini tidak menggunakan timestamps (created_at, updated_at).
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Mendefinisikan relasi 'hasMany' ke model City.
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'CountryCode', 'Code');
    }

    /**
     * Mendefinisikan relasi 'hasMany' ke model CountryLanguage.
     */
    public function languages(): HasMany
    {
        return $this->hasMany(CountryLanguage::class, 'CountryCode', 'Code');
    }
}
