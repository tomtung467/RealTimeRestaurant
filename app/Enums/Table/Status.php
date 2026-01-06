<?php

namespace App\Enums\Table;

enum Status:string
{
    //
    case EMPTY = 'empty';
    case OCCUPIED = 'occupied';
    public function label(): string
    {
        return match($this) {
            Status::EMPTY => 'Trống',
            Status::OCCUPIED => 'Đã có khách',
        };
    }
    public function color(): string
    {
        return match($this) {
            Status::EMPTY => 'green',
            Status::OCCUPIED => 'red',
        };
    }
    public function isOccupied(): bool
    {
        return $this === Status::OCCUPIED;
    }
    public function isEmpty(): bool
    {
        return $this === Status::EMPTY;
    }
}
