<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\BaseAPIController;
use App\Services\Category\CategoryService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $category = $this->categoryService->create($request->all());
        return $this->successResponse($category, "Category created successfully", 201);
    }
    public function update(Request $request, $id)
    {
        $category = $this->categoryService->update($id, $request->all());
        if (!$category) {
            return $this->errorResponse("Category not found", 404);
        }
    }
    public function destroy($id)
    {
        $category = $this->categoryService->delete($id);
        if (!$category) {
            return $this->errorResponse("Category not found", 404);
        }
        return $this->successResponse(null, "Category deleted successfully");
    }
}
