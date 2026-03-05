<?php
namespace App\Repositories\Ingredient;
use App\Repositories\BaseRepository;
use App\Models\Ingredient;
class IngredientRepository extends BaseRepository implements IIngredientRepository
{
    public function __construct(Ingredient $model)
    {
        parent::__construct($model);
    }
}
