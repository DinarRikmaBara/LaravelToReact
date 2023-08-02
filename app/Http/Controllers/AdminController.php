<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\produk;
use App\Models\pesanan;
use App\Models\complain;


class AdminController extends Controller
{
    //menu user
    public function index(){
        $user = User::where('statusUser','aktif')->get();
        return response()->json($user);
    }
    public function cari($id)
    {
            $nama = User::where('email','LIKE','%'.$id.'%')->get();
            $email = User::where('email','LIKE','%'.$id.'%')->get();
            if($nama->isEmpty()){
                if($email->isEmpty()){
                    return response()->json(['data'=>'data tidak ada'],200);
                }
            }

            $user = [];
            foreach ($nama as $datas) {
                array_push($user,$datas);
            }
            foreach ($email as $datas) {
                array_push($user,$datas);
            }
            $uniqueArray = array_unique($user);
            
            return response()->json(['data'=>$uniqueArray],200);
    }

    public function shop(){
        $shop = User::where('role','seller')->where('statusUser','aktif')->get();
        return response()->json($shop);
    }

    public function costumer(){
        $costumer = User::where('role','costumer')->where('statusUser','aktif')->get();
        return response()->json($costumer);
    }

    public function kurir(){
        $kurir = User::where('role','kurir')->where('statusUser','aktif')->get();
        return response()->json($kurir);
    }

    public function banned(){
        $banned = User::where('statusUser','banned')->get();
        return response()->json($banned);
    }

    public function register(Request $request)
    {
        $validator = validator::make($request->all(),[
            'nama' => 'required',
            'emaili' => 'required',
            'statusUser' => 'required',
            'role' => 'required',  
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json(["error"=> $validator->errors()], 400);
        }

        $user = $validator->validated();
        User::create([
            'nama'=>$user['nama'],
            'email'=>$user['emaili'],
            'statusUser'=>$user['statusUser'],
            'role'=>$user['role'],
            'password'=>$user['password'],
        ]);
        // kirim response ke pengguna
        return response()->json(["msg"=> "Berhasil"],200);
    }

    public function ban($id)
    {
        User::where('idUser',$id)->update([
            'statusUser' => 'banned'
        ]);

        return response()->json([
                "msg"=>"produk berhasil diBan"
        ],200);
    }
    public function unban($id)
    {
        User::where('idUser',$id)->update([
            'statusUser' => 'aktif'
        ]);

        return response()->json([
                "msg"=>"produk berhasil diAktifkan"
        ],200);
    }

    public function userdelete($id)
    {
        User::where('idUser',$id)->delete();

        return response()->json([
            "data"=>[
                'Berhasil di hapus'=>$id
            ],
           
        ],200);
    }




    //menu Produk
    public function makanan(){
        $makanan = produk::where('jenis','makanan')->get();
        return response()->json($makanan);
    }
    public function minuman(){
        $minuman = produk::where('jenis','minuman')->get();
        return response()->json($minuman);
    }
    public function sold(){
        $sold = pesanan::where('statusPesanan','done')->get();
        return response()->json($sold);
    }




    //menu Complain
    public function complain(){
        $complain = complain::get();
        return response()->json($complain);
    }
}
