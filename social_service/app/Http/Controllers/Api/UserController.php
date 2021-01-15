<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Content;
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
            return response()->json(["errors" => ["Credenciais inválidas"]], 401);
        } catch (\Throwable $th) {
            return response()->json(["errors" => [$th->getMessage()]], 500);
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
            return response()->json(["errors" => [$th->getMessage()]], 500);
        }
    }

    public function updatePerfilUser(Request $request)
    {
        try {
            $user = $request->user();

            if (!is_null($request->input('password'))) {
                Arr::set($request, 'password', bcrypt($request->input('password')));
            }
            if ($request->image) {
                $this->uploadFile($request->image, $user);
            }

            foreach ($request->input() as $key => $value) {
                $user->$key = $value;
            }
            if ($request->image) {
                $user->image = asset('storage' . DIRECTORY_SEPARATOR . $this->pathImage);
            }
            $user->update();
            $user->token = $user->createToken($user->email)->accessToken;
            return response()->json($user, 200);
        } catch (\Throwable $th) {
            return response()->json(["errors" => [$th->getMessage()]], 500);
        }
    }

    public function uploadFile($file, $user)
    {
        // receber a tratar arquivo base64
        $separator = DIRECTORY_SEPARATOR;
        $time = time();
        $pathDad = 'perfils';
        $directoryImage = $pathDad . $separator . 'perfil_id' . $separator . $user->id;
        $extension = substr($file, 11, strpos($file, ';') - 11);
        $path = $directoryImage . $separator . $time . '.' . $extension;

        $file = str_replace('data:image/' . $extension . ';base64,', '', $file);
        $file = base64_decode($file);

        // verificar se arquivo existe e deletar
        $this->checkIfTheFileExistsAndDelete($user);

        Storage::disk('public')->put($path, $file);
        return $this->pathImage = $path;
    }

    public function checkIfTheFileExistsAndDelete($user)
    {
        $image = explode(DIRECTORY_SEPARATOR, $user->image);
        $index = array_key_last($image);
        if (Storage::disk('public')->exists("./perfils/perfil_id/{$user->id}/")) {
            Storage::disk('public')->delete("./perfils/perfil_id/{$user->id}/{$image[$index]}");
        };
    }

    public function contentCreate(Request $request)
    {
        try {
            $user = $request->user();
            $user->content()->create($request->all());

            return response()->json($user->content, 201);
        } catch (\Throwable $th) {
            return response()->json(["errors" => [$th->getMessage()]], 500);
        }
    }

    public function friendCreate(Request $request)
    {
        try {

            $user = $request->user();
            $user->friends()->toggle($request->friend_id);

            return response()->json($user->friends, 200);
        } catch (\Throwable $th) {
            return response()->json(["errors" => [$th->getMessage()]], 500);
        }
    }

    public function userLikes(Request $request)
    {
        try {
            $content = Content::find($request->content_id);
            $user = $request->user();
            $user->likes()->toggle($request->content_id);

            return response()->json($content->likes()->count(), 200);
        } catch (\Throwable $th) {
            return response()->json(["errors" => [$th->getMessage()]], 500);
        }
    }

    public function userComments(Request $request)
    {
        try {
            $content = Content::find($request->content_id);
            $user = $request->user();
            $user->comments()->create($request->all());

            return response()->json($content->comments(), 200);
        } catch (\Throwable $th) {
            return response()->json(["errors" => [$th->getMessage()]], 500);
        }
    }

}
