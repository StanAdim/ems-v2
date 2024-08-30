<?php

namespace App\Enums;
use Filament\Support\Contracts\HasLabel;

enum PaymentOrderStatus: string implements HasLabel
{
    case Pending = 'Pending';
    case Paid = 'Paid';

    public function getLabel(): ?string
    {
        return $this->value;
    }
}
