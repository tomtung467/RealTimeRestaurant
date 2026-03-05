<?php
namespace App\Repositories\Food;
use App\Repositories\BaseRepository;
use App\Models\Food;
class FoodRepository extends BaseRepository implements IFoodRepository
{
    public function __construct(Food $model)
    {
        parent::__construct($model);
    }
}
