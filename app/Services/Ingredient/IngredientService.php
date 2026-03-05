<?php
namespace App\Services\Ingredient;

use App\Repositories\Ingredient\IngredientRepository;
use App\Services\BaseService;

class IngredientService extends BaseService implements IIngredientService
{
    public function __construct(IngredientRepository $ingredientRepository)
    {
        parent::__construct($ingredientRepository);
    }
}
