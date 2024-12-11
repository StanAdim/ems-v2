<?php

namespace App\Enums;
use Filament\Support\Contracts\HasLabel;

enum EventState: string implements HasLabel
{
    case Created = 'created';
    case Registration = 'registration';
    case Participation = 'participation';
    case ParticipationAndRegistration = 'participation-and-registration';
    case Ended = 'ended';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Created => 'Created',
            self::Registration => 'Open for Registration',
            self::Participation => 'Open for Participation',
            self::ParticipationAndRegistration => 'Open for Participation and Registration',
            self::Ended => 'Ended',
        };
    }
}
