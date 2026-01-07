<?php
namespace App\Services\ProductOption;
use App\Repositories\ProductOption\IProductOptionRepository;
use App\Services\BaseService;
class ProductOptionService extends BaseService implements IProductOptionService
{
    protected  $productOptionRepository;
    public function __construct(IProductOptionRepository $productOptionRepository)
    {
        parent::__construct($productOptionRepository);
        $this->productOptionRepository = $productOptionRepository;
    }
}
