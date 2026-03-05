<?php
namespace App\Services\Food;
use App\Repositories\Food\IFoodRepository;
use App\Services\BaseService;
class FoodService extends BaseService implements IFoodService
{
    public function __construct(IFoodRepository $foodRepository)
    {
        parent::__construct($foodRepository);
    }
}
