<?php
namespace App\Services\Product;

use App\Services\BaseService;
use App\Repositories\Product\IProductRepository;
class ProductService extends BaseService implements IProductService
{
    //
    protected $productRepository;
    public function __construct(IProductRepository $productRepository)
    {
        parent::__construct($productRepository);
        $this->productRepository = $productRepository;
    }
}
