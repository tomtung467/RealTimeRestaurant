<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
abstract class BaseRepository implements IBaseRepository
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function getModel(): Model
    {
        return $this->model;
    }
    public function setModel(Model $model): void
    {
        $this->model = $model;
    }
    public function all(array $columns = ['*'], array $relations = [], array $conditions = []): object
    {
        $query = $this->model->newQuery();
        if (!empty($conditions)) {
            $query->where($conditions);
        }
        if (!empty($relations)) {
            $query->with($relations);
        }
        return $query->get($columns);
    }
    public function paginate(int $perPage = 15, array $columns = ['*'], array $relations = [], array $conditions = []): object
    {
        $query = $this->model->newQuery();
        if (!empty($conditions)) {
            $query->where($conditions);
        }
        if (!empty($relations)) {
            $query->with($relations);
        }
        return $query->paginate($perPage, $columns);
    }
    public function find(int $id, array $columns = ['*'], array $relations = []): ?object
    {
        $query = $this->model->newQuery();
        if (!empty($relations)) {
            $query->with($relations);
        }
        return $query->find($id, $columns);
    }
    public function create(array $data): object
    {
        return $this->model->create($data);
    }
    public function update(int $id, array $data): bool
    {
        $record = $this->model->find($id);
        if ($record) {
            return $record->update($data);
        }
        return false;
    }
    public function delete(int $id): bool
    {
        $record = $this->model->find($id);
        if ($record) {
            return $record->delete();
        }
        return false;
    }
}
