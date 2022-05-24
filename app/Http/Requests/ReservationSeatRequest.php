<?php

namespace App\Http\Requests;

use App\Enums\BusSeats;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class ReservationSeatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'trip_id'       => ['required','integer', 'exists:trips,id'],
            'start_city_id' => ['required','integer', 'exists:cities,id'],
            'end_city_id'   => ['required','integer', 'exists:cities,id', 'different:start_city_id'],
            'seat'          => ['required','integer', new EnumValue(BusSeats::class, false)],
        ];
    }
}
