<?php

namespace App\Models;

use App\Models\Station;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['start_city_id', 'end_city_id'];

    /**
     *--------------------------------------------------------------------------
     * Model Relations
     *--------------------------------------------------------------------------
     */

    /** Trip Belongs To an city as start point*/
    public function startCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'start_city_id');
    }

    /** Trip Belongs To an city as end point*/
    public function endCity(): BelongsTo
    {
        return $this->belongsTo(City::class, 'end_city_id');
    }

    /** Trip Has Many Stations*/
    public function stations(): HasMany
    {
        return $this->hasMany(Station::class, 'trip_id');
    }

    /** Trip Has Many Reservations*/
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'trip_id');
    }

}
