<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\PlaceOrderRequest;
use App\Http\Resources\CalculateBillResource;
use App\Services\Order\OrderService;
use App\Traits\ApiResponseTrait;

class OrderController extends Controller
{
    //
    protected $orderService;
    use ApiResponseTrait;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function getUnpaidOrdersByTable($tablenumber)
    {
        $orders = $this->orderService->CalculateBill($tablenumber);
        return $this->successResponse(CalculateBillResource::collection($orders), "Unpaid orders retrieved successfully");
    }
    public function placeOrder(PlaceOrderRequest $request, $tablenumber)
    {
        $items = $request->validated()['items'];
        $order = $this->orderService->placeOrder($tablenumber, $items);
        return $this->successResponse($order, "Order placed successfully");
    }
    public function paidOrder($orderId)
    {
        // Logic to mark order as paid
        $this->orderService->markOrderAsPaid($orderId);
        return $this->successResponse(null, "Order marked as paid successfully");
    }
}
