<?php
namespace App\Repositories\Product;
use App\Repositories\BaseRepository;
use App\Models\Product;
class ProductRepository extends BaseRepository implements IProductRepository
{
    //
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }
    public function model()
    {
        return Product::class;
    }
}
