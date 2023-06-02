<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Middleware;

class LoginController extends Controller{
    public function index(){
        return view('log');
    }
    public function user(Request $request){
        if($request->has('search')){
            $data = User::where('name', 'LIKE', '%' .$request->search. '%')->paginate(5);
        }else{
            $data = User::latest()->paginate(5);
        }
        return view('Datauser', compact('data'));
    }
    public function tambahuser(Request $request){
        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'notel' => $request->notel,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);
        return redirect()->route('log');
    }
    public function register(){
        return view('regist');
    }

    public function loginproses(Request $request){
        if(Auth::attempt($request -> only('email', 'password'))){
            return redirect('/home');
        }
        return redirect('/log');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    
    public function hapususer($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->route('datauser');
    }
}

    

