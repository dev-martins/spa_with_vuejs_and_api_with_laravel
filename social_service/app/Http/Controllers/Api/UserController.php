<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{
    public function getAllUsers()
    {
        try {
            $users = User::all();
            return response()->json($users, 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function login(Request $request)
    {
        try {

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user(); 
                $user->token = $user->createToken($user->email)->accessToken;
                return response()->json($user, 200);
            }
            return response()->json(["msg" => "Credenciais inválidas"], 401);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function createUser(UserFormRequest $request)
    {
        try {

            Arr::set($request, 'password', bcrypt($request->input('password')));
            $user = User::create($request->input());
            $user->token = $user->createToken($user->email)->accessToken;
            return response()->json($user, 201);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function updateUser(Request $request, $id)
    {
        try {
            if (!is_null($request->input('password'))) {
                Arr::set($request, 'password', bcrypt($request->input('password')));
            }
            $user = User::find($id);
            $user->update($request->all());
            return response()->json($user, 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
}
