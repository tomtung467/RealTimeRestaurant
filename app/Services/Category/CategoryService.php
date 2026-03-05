<?php
namespace App\Services\Category;

use App\Services\BaseService;
use App\Repositories\Category\ICategoryRepository;
class CategoryService extends BaseService implements ICategoryService
{
    public function __construct(ICategoryRepository $categoryRepository)
    {
        parent::__construct($categoryRepository);
    }
}
