<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Services\User\UserService;

class UserController extends Controller
{
    //
    use ApiResponseTrait;
    protected $userService;
    public function index()
    {
        return $this->successResponse(['message' => 'User index']);
    }
    public function show($id)
    {
        return $this->successResponse(['message' => "Showing user with ID: $id"]);
    }
    public function store(Request $request)
    {
        return $this->successResponse(['message' => 'User created', 'data' => $request->all()]);
    }
    public function update(Request $request, $id)
    {
        return $this->successResponse(['message' => "User with ID: $id updated", 'data' => $request->all()]);
    }
    public function destroy($id)
    {
        return $this->successResponse(['message' => "User with ID: $id deleted"]);
    }
}
