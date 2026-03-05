<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\BaseAPIController;
use App\Services\Category\CategoryService;
use App\Traits\ApiResponseTrait;

class CategoryController extends BaseAPIController
{
    //
    protected $categoryService;
    use ApiResponseTrait;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        $categories = $this->categoryService->all();
        return $this->successResponse($categories);
    }
    public function show($id)
    {
        $category = $this->categoryService->find($id);
        if (!$category) {
            return $this->errorResponse("Category not found", 404);
        }
        return $this->successResponse($category);
    }
}
