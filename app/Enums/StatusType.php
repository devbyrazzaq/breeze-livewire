<?php

namespace App\Enums;

enum StatusType: string
{

    case STARTED = 'STARTED';

    case IN_PROGRESS = 'IN PROGRESS';

    case DONE = 'DONE';

    public function color(): string
    {
        return match ($this) {
            self::STARTED => 'border-blue-500',
            self::IN_PROGRESS => 'border-yellow-500',
            self::DONE => 'border-green-500',
        };
    }
}
