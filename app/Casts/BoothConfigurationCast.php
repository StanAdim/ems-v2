<?php

namespace App\Casts;
use App\Models\JSON\Booth;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class BoothConfigurationCast implements CastsAttributes
{
    /**
     * Summary of get
     * @param mixed $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return \Illuminate\Support\Collection|Booth[]
     */
    public function get($model, string $key, $value, array $attributes)
    {
        $data = json_decode($value, true);

        return collect($data)->map(function ($item) {
            return new Booth(
                $item['name'],
                $item['size'],
                $item['price'],
                $item['booking_id'] ?? null,
            );
        });
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return json_encode(collect($value)->map(function ($item) {
            return $item;
        }));
    }
}
