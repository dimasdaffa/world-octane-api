<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    /**
     * Nama tabel yang terhubung dengan model.
     *
     * @var string
     */
    protected $table = 'city';

    /**
     * Primary key untuk model.
     *
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * Model ini tidak menggunakan timestamps (created_at, updated_at).
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Mendefinisikan relasi 'belongsTo' ke model Country.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'CountryCode', 'Code');
    }
}
