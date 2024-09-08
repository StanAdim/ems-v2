<?php

namespace App\Models\JSON;
use App\Models\ExhibitionBooking;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 *
 * @property ExhibitionBooking|null $booking
 */
class Booth implements Arrayable
{
    function __construct(
        public ?string $name,
        public ?string $size,
        public ?string $price,
        public ?string $booking_id,
    ) {
    }

    public function isBooked(): bool
    {
        return $this->booking_id != null;
    }

    protected function booking(): Attribute
    {
        return Attribute::make(
            fn($value) => ExhibitionBooking::whereId($this->booking_id)->first(),
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'size' => $this->size,
            'price' => $this->price,
            'booking_id' => $this->booking_id,
        ];
    }
}
