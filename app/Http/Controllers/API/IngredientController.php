<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\BaseAPIController;
use App\Services\Ingredient\IngredientService;
use App\Traits\ApiResponseTrait;

class IngredientController extends BaseAPIController
{
    protected $ingredientService;
    use ApiResponseTrait;
    public function __construct(IngredientService $ingredientService)
    {
        $this->ingredientService = $ingredientService;
    }
    public function index()
    {
        $ingredients = $this->ingredientService->all();
        return $this->successResponse($ingredients, 'Ingredients retrieved successfully');
    }
    public function show($id)
    {
        $ingredient = $this->ingredientService->find($id);
        if (!$ingredient) {
            return $this->errorResponse('Ingredient not found', 404);
        }
        return $this->successResponse($ingredient, 'Ingredient retrieved successfully');
    }
}
