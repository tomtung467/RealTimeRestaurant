<?php
namespace App\Repositories\User;
use App\Repositories\BaseRepository;
use App\Models\User;
class UserRepository extends BaseRepository implements IUserRepository
{
    //
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
    public function model()
    {
        return User::class;
    }
}
