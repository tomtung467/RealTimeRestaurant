<?php
namespace App\Repositories\Table;
use App\Repositories\BaseRepository;
use App\Models\Table;
class TableRepository extends BaseRepository implements ItableRepository
{
    //
    public function __construct(Table $model)
    {
        parent::__construct($model);
    }
    public function model()
    {
        return Table::class;
    }
    public function all(): object
    {
        return $this->model->orderBy('table_number', 'asc')->get();
    }
}
