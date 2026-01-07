<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    protected $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function getUnpaidOrdersByTable($tableId)
    {
        $orders = $this->orderService->CalculateBill($tableId);
        return response()->json(['data' => $orders], 200);
    }
}
