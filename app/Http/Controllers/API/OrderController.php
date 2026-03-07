<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseAPIController;
use App\Services\Order\OrderService;
use App\Traits\ApiResponseTrait;

class OrderController extends BaseAPIController
{
    //
    protected $orderService;
    use ApiResponseTrait;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    public function index()
    {
        $orders = $this->orderService->all();
        return $this->successResponse($orders);
    }
    public function show($id)
    {
        $order = $this->orderService->find($id);
        if (!$order) {
            return $this->errorResponse("Order not found", 404);
        }
        return $this->successResponse($order);
    }
    public function store(Request $request)
    {
        $order = $this->orderService->create($request->all());
        return $this->successResponse($order, "Order created successfully", 201);
    }
    public function update(Request $request, $id)
    {
        $order = $this->orderService->update($id, $request->all());
        if (!$order) {
            return $this->errorResponse("Order not found", 404);
        }
        return $this->successResponse($order);
    }
    public function destroy($id)
    {
        $order = $this->orderService->delete($id);
        if (!$order) {
            return $this->errorResponse("Order not found", 404);
        }
        return $this->successResponse(null, "Order deleted successfully");
    }
}
