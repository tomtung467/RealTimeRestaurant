<?php
namespace App\Repositories;
interface IBaseRepository
{
    //
    public function all(): object;
    public function paginate(int $perPage = 10, array $columns = ['*'], array $relations = [], array $conditions = []): object;
    public function getById(int $id): object;
    public function create(array $data): object;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
