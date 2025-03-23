<?php

namespace App\Models\JSON;

use Illuminate\Contracts\Support\Arrayable;
use Livewire\Wireable;

class EventModelConfiguration implements Arrayable, Wireable
{
    public const UPCOMING_CARD_LAYOUT_MAIN_BANNER_WITH_TEXT = 'main-banner-with-text';
    public const UPCOMING_CARD_LAYOUT_MAIN_BANNER_ONLY = 'main-banner-only';
    function __construct(
        public string $upcomingCardLayout,
        public array $previousEditionsIds,
    ) {
    }

    public function toArray(): array
    {
        return [
            'upcomingCardLayout' => $this->upcomingCardLayout,
            'previousEditionsIds' => $this->previousEditionsIds,
        ];
    }

    public function toLivewire()
    {
        return $this->toArray();
    }

    public static function fromArray($value)
    {
        return new self(
            $value['upcomingCardLayout'] ?? self::UPCOMING_CARD_LAYOUT_MAIN_BANNER_WITH_TEXT,
            $value['previousEditionsIds'] ?? [],
        );
    }

    public static function fromLiveWire($value)
    {
        return self::fromArray($value);
    }

    public static function getUpComingCardLayoutOptions()
    {
        return [
            self::UPCOMING_CARD_LAYOUT_MAIN_BANNER_ONLY => 'Main Banner Only',
            self::UPCOMING_CARD_LAYOUT_MAIN_BANNER_WITH_TEXT => 'Main Banner with Description Text',
        ];
    }
}
