<?php
namespace App\Repositories\ProductOption;
use App\Repositories\BaseRepository;
use App\Models\ProductOption;
class ProductOptionRepository extends BaseRepository implements IProductOptionRepository
{
    //
    public function __construct(ProductOption $model)
    {
        parent::__construct($model);
    }
    public function model()
    {
        return ProductOption::class;
    }
}
