<?php

namespace App\Casts;

use App\Models\JSON\ExhibitionAttendee;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class AttendeeModels implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     * @return \Illuminate\Support\Collection|ExhibitionAttendee[]
     */
    public function get(Model $model, string $key, mixed $value, array $attributes)
    {
        $data = json_decode($value, true);

        return collect($data)->map(function ($item) use ($model) {
            $item['exhibition_booking_id'] ??= $model->id;

            return ExhibitionAttendee::fromArray($item);
        });
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        return json_encode(collect($value)->map(function ($item) {
            return $item;
        }));
    }
}
