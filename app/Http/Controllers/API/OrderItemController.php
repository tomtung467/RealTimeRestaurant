<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseAPIController;
use Illuminate\Http\Request;
use App\Services\OrderItem\OrderItemService;
use App\Traits\ApiResponseTrait;

class OrderItemController extends BaseAPIController
{
    //
    protected $orderItemService;
    use ApiResponseTrait;
    public function __construct(OrderItemService $orderItemService)
    {
        $this->orderItemService = $orderItemService;
    }
    public function index()
    {
        $orderItems = $this->orderItemService->all();
        return $this->successResponse($orderItems);
    }
    public function show($id)
    {
        $orderItem = $this->orderItemService->find($id);
        if (!$orderItem) {
            return $this->errorResponse("OrderItem not found", 404);
        }
    }
    public function store(Request $request)
    {
        $orderItem = $this->orderItemService->create($request->all());
        return $this->successResponse($orderItem, "OrderItem created successfully", 201);
    }
    public function update(Request $request, $id)
    {
        $orderItem = $this->orderItemService->update($id, $request->all());
        if (!$orderItem) {
            return $this->errorResponse("OrderItem not found", 404);
        }
    }
    public function destroy($id)
    {
        $orderItem = $this->orderItemService->delete($id);
        if (!$orderItem) {
            return $this->errorResponse("OrderItem not found", 404);
        }
        return $this->successResponse(null, "OrderItem deleted successfully");
    }
}
