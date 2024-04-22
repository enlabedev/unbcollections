<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Http\Requests\UserRequest;
use App\Helpers\Message;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(UserRequest $request)
    {
        $this->userService->createUser($request->all());
        return redirect()->route('user.index')->with('success', 'User created successfully');
    }

    public function update(UserRequest $request, $id)
    {
        
        $this->userService->updateUser($request->all(), $id);
        return redirect()->route('user.index')->with('success', 'User updated successfully');
        
    }

    public function delete($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }

    public function index()
    {
        return $this->userService->getAllUsers();
    }

    public function show($id)
    {
        return  $this->userService->getUserById($id);
    }
}