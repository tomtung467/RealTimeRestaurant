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
    public function GetunpaidOrdersByTable($tablenumber)
    {
        return $this->model->where('table_number', $tablenumber)
                           ->where('status', 'unpaid')
                           ->with('orderItems.product')
                           ->get();
    }
    public function updateitemstatus($itemId, $status)
    {
        $orderItem = $this->model->orderItems()->find($itemId);
        if ($orderItem) {
            $orderItem->status = $status;
            $orderItem->save();
            return $orderItem;
        }
        return null;
    }
    public function createOrder($tablenumber, $items)
    {
        $order = $this->model->create([
            'table_number' => $tablenumber,
            'status' => 'unpaid',
        ]);
        foreach ($items as $item) {
            $order->orderItems()->create([
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'status' => 'pending',
            ]);
        }
        return $order;
    }
}
