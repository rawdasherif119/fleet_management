<?php

namespace App\Models;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Station extends Model
{
    use HasFactory;

    protected $fillable = ['trip_id', 'start_city_id', 'end_city_id', 'order'];

    /**
     *--------------------------------------------------------------------------
     * Model Relations
     *--------------------------------------------------------------------------
     */

    /** Station Belongs To a Trip*/
    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }
}
