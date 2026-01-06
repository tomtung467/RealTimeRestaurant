<?php

namespace App\Enums\Orders;

enum Status:string
{
    //
    case PAID = 'paid';
    case UNPAID = 'unpaid';
    public FUNCtion label(): string
    {
        return match($this) {
            Status::PAID => 'Đã thanh toán',
            Status::UNPAID => 'Chưa thanh toán',
        };
    }
    public function color(): string
    {
        return match($this) {
            Status::PAID => 'green',
            Status::UNPAID => 'red',
        };
    }
    public function isPaid(): bool
    {
        return $this === Status::PAID;
    }
    public function isUnpaid(): bool
    {
        return $this === Status::UNPAID;
    }
}
