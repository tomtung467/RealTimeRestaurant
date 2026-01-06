<?php
namespace App\Repositories\Category;
use App\Repositories\BaseRepository;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    //
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
    public function model()
    {
        return Category::class;
    }
}
