<?php
namespace App\Services\Order;

use App\Services\BaseService;
use App\Repositories\Order\IOrderRepository;
class OrderService extends BaseService implements IOrderService
{
    public function __construct(IOrderRepository $orderRepository)
    {
        parent::__construct($orderRepository);
    }
}
