<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\BaseAPIController;
use App\Services\Food\FoodService;
use App\Traits\ApiResponseTrait;

class FoodController extends BaseAPIController
{
    protected $foodService;
    use ApiResponseTrait;
    public function __construct(FoodService $foodService)
    {
        $this->foodService = $foodService;
    }
    public function index()
    {
        $foods = $this->foodService->all();
        return $this->successResponse($foods);
    }
    public function show($id)
    {
        $food = $this->foodService->find($id);
        if (!$food) {
            return $this->errorResponse("Food not found", 404);
        }
        return $this->successResponse($food);
    }
}
