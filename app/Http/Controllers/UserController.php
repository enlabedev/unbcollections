<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }

    public function index()
    {
        return response()->json(User::all(), 200);
    }

    public function show(User $user)
    {
        return response()->json($user, 200);
    }
}
