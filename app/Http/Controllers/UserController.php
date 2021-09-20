<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }

    public function update(UserRequest $request, User $user)
    {
        if (!$user) {
            return response()->json('User not found!', 404);
        }

        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function destroy(User $user)
    {
        if (!$user) {
            return response()->json('User not found!', 404);
        }
        $user->delete();

        return response()->json('User deleted!', 200);
    }

    public function countOfUser()
    {
        return response()->json(User::count(), 200);
    }

    public function search(Request $request){
        $text = strtolower($request->input('searchText'));
        $users = User::where('name', 'LIKE', "%$text%")->get();

        return response()->json($users, 200);
    }

}
