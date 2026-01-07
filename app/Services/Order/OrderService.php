<?php
namespace App\Services\Order;
use App\Services\BaseService;
use App\Repositories\Order\IOrderRepository;
class OrderService extends BaseService implements IOrderService
{
    //
    protected $orderRepository;
    public function __construct(IOrderRepository $orderRepository)
    {
        parent::__construct($orderRepository);
        $this->orderRepository = $orderRepository;
    }
    public function CalculateBill($tableId)
    {
        // Business logic to calculate the bill for the order
        $order = $this->orderRepository->getUnpaidOrdersByTable($tableId);
        if (!$order) {
            throw new \Exception("Order not found");
        }
        $total = 0;
        foreach ($order as $item) {
            $total += $item->price * $item->quantity;
        }
        return $total;
    }
}
