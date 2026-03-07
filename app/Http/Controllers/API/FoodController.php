<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\BaseAPIController;
use App\Services\Food\FoodService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $food = $this->foodService->create($request->all());
        return $this->successResponse($food, "Food created successfully", 201);
    }
    public function update(Request $request, $id)
    {
        $food = $this->foodService->update($id, $request->all());
        if (!$food) {
            return $this->errorResponse("Food not found", 404);
        }
    }
    public function destroy($id)
    {
        $food = $this->foodService->delete($id);
        if (!$food) {
            return $this->errorResponse("Food not found", 404);
        }
        return $this->successResponse(null, "Food deleted successfully");
    }
}
