<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\City;
use App\Models\Client;
use App\Models\Hotel;
use function App\Sabaawy\responseJson;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function register(ClientRequest $request)
    {
        $request->password = bcrypt($request->password);
        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
//            'api_token'
        ]);
        return responseJson('200' ,'good',$request->all());
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email','password']);
//        return $credentials;
         $token = Auth::guard('api')->attempt($credentials);
        if (!$token)
        {
            return responseJson('0','no user');
        }
        $client = Auth::guard('api')->user();
        return responseJson('1', 'done success',[
            'client' => $client,
            'token' => $token
        ]);
    }
}
