<?php

namespace App\Models;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'trip_id', 'start_order', 'end_order', 'seat'];

    /**
     *--------------------------------------------------------------------------
     * Model Relations
     *--------------------------------------------------------------------------
     */

    /** Reservation Belongs To a user*/
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    /** Reservation Belongs To a Trip*/
    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }
    
}
