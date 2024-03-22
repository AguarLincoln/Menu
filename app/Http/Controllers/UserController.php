<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function store(UserRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        return UserResource::make($user);
    }

    public function show(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
