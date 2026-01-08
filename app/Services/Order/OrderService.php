<?php
namespace App\Services\Order;
use App\Services\BaseService;
use App\Repositories\Order\IOrderRepository;
use App\Events\OrderItemStatusUpdated;
use App\Events\OrderPaid;

class OrderService extends BaseService implements IOrderService
{
    //
    protected $orderRepository;
    public function __construct(IOrderRepository $orderRepository)
    {
        parent::__construct($orderRepository);
        $this->orderRepository = $orderRepository;
    }
    public function CalculateBill($tablenumber)
    {
        // Business logic to calculate the bill for the order
        $orders = $this->orderRepository->getUnpaidOrdersByTable($tablenumber);
        if ($orders->isEmpty()) {
            throw new \Exception("No unpaid orders found for this table");
        }
        return $orders;
    }
    public function placeOrder($tablenumber, $items)
    {
        $order = $this->orderRepository->createOrder($tablenumber, $items);
        return $order;
    }
    public function updateitemstatus($itemId, $status)
    {
        $orderItem = $this->orderRepository->updateitemstatus($itemId, $status);
        if (!$orderItem) {
            throw new \Exception("Order item not found");
        }
        event(new OrderItemStatusUpdated($orderItem));

    return $orderItem;
    }
    public function markOrderAsPaid($orderId)
    {
        $order = $this->orderRepository->getById($orderId);
        if (!$order) {
            throw new \Exception("Order not found");
        }
        $order->status = 'paid';
        $order->save();
        event(new OrderPaid($order));
        return $order;
    }
}
