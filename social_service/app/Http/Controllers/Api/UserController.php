<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private $pathImage;

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

    public function registerUser(UserFormRequest $request)
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

    public function updatePerfilUser(Request $request)
    {
        try {
            $user = $request->user();

            if (!is_null($request->input('password'))) {
                Arr::set($request, 'password', bcrypt($request->input('password')));
            }

            $this->uploadFile($request->image, $user);

            foreach ($request->input() as $key => $value) {
                $user->$key = $value;
            }

            $user->image = $this->pathImage;
            $user->update();
            $user->token = $user->createToken($user->email)->accessToken;
            return response()->json($user, 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }

    public function uploadFile($file, $user)
    {
        $separator = DIRECTORY_SEPARATOR;
        $time = time();
        $pathDad = 'perfils';
        $directoryImage = $pathDad . $separator . 'perfil_id' . $separator . $user->id;
        $extension = substr($file, 11, strpos($file, ';') - 11);
        $path = $directoryImage . $separator . $time . '.' . $extension;

        $file = str_replace('data:image/' . $extension . ';base64,', '', $file);
        $file = base64_decode($file);

        if (!file_exists($pathDad)) {
            mkdir($pathDad, 0777);
        }

        Storage::disk('public')->put($path, $file);
        return $this->pathImage = $path;
    }
}
