<?php
namespace App\Repositories\OrderItem;

use App\Repositories\BaseRepository;
use App\Models\OrderItem;;
class OrderItemRepository extends BaseRepository implements IOrderItemRepository
{
    //
    public function __construct(OrderItem $model)
    {
        parent::__construct($model);
    }
    public function model()
    {
        return OrderItem::class;
    }
}
