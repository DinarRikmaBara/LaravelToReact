<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = validator::make($request->all(),[
            'nama' => 'required',
            'email' => 'required',
            'statusUser' => 'required',
            'role' => 'required',  
            'password' => 'required|min:8',
        ]);

        $user = $validator->validated();
        User::create($user);
        // kirim response ke pengguna
        return response()->json(["msg"=> "Berhasil"],200);

    }
    
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if ((Auth::attempt($validator->validated()))) {
            $payload =[
                'idUsers'=> Auth::user()->idUsers,
                'email'=> Auth::user()->email,
                'role'=>Auth::user()->role,
                'iat'=> now()->timestamp, // waktu  di buat
                'exp'=>now()->timestamp + 2592000 // waktu token kadaluarsa (30hari setelah token dibuat)
            ];
            $token = JWT::encode($payload,env('JWT_SECRET_KEY'),'HS256');
            
            return response()->json(["token"=> "Bearer {$token}"],200);

        }
        return response()->json("email atau password salah",422);
    }
}
