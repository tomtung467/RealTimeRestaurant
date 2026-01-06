<?php

namespace App\Enums\Order_items;

enum Status:string
{
    //
    case PENDING = 'pending';
    case PREPARING = 'preparing';
    case SERVED = 'served';
    public function label(): string
    {
        return match($this) {
            Status::PENDING => 'Đang chờ',
            Status::PREPARING => 'Đang chuẩn bị',
            Status::SERVED => 'Đã phục vụ',
        };
    }
    public function color(): string
    {
        return match($this) {
            Status::PENDING => 'yellow',
            Status::PREPARING => 'blue',
            Status::SERVED => 'green',
        };
    }
    public function isPending(): bool
    {
        return $this === Status::PENDING;
    }
    public function isPreparing(): bool
    {
        return $this === Status::PREPARING;
    }
    public function isServed(): bool
    {
        return $this === Status::SERVED;
    }
}
