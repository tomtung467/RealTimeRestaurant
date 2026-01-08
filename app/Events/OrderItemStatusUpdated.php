<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderItemStatusUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $orderItem;

    public function __construct($orderItem)
    {
        $this->orderItem = $orderItem;
    }

    // Phát vào channel riêng của từng bàn để tránh khách bàn khác thấy
    public function broadcastOn()
    {
        // Use table_number to match frontend subscription pattern private-table.{table_number}
        return new PrivateChannel('table.' . $this->orderItem->order->table_number);
    }

    public function broadcastAs()
    {
        return 'status.updated';
    }
}
