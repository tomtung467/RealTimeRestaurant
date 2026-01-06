<?php
namespace App\Repositories\Order;
use App\Repositories\BaseRepository;
use App\Models\Order;
class OrderRepository extends BaseRepository implements IOrderRepository
{
    //
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }
    public function model()
    {
        return Order::class;
    }
}
