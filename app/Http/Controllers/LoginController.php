<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Middleware;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller{

    public function index()
    {
        return view('login');
    }

    public function guru()
    {
        return view('login-guru');
    }

    public function akun()
    {
        $akun = DB::table('users')->get();
        return view('akun.index', compact('akun'));
    }

    public function create()
    {
        return view('akun.create');
    }

    public function regist()
    {
        return view('regist');
    }
    
    public function storeadmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'kelamin' => 'required',
            'pdd_terakhir' => 'required',
            'tgk_lahir' => 'required',
            'nuptk' => 'required',
            'alamat' => 'required',
            'email' => [
                'required',
                Rule::unique('users', 'email')
            ],
            'notel' => [
                'required',
                Rule::unique('users', 'notel')
            ],
            'password' => 'required',
            'level' => 'required',
        ], [
            'email.unique' => 'Email sudah digunakan.',
            'notel.unique' => 'Nomor telepon sudah digunakan.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = User::create([
            'name' => $request->name,
            'kelamin' => $request->kelamin,
            'pdd_terakhir' => $request->pdd_terakhir,
            'tgk_lahir' => $request->tgk_lahir,
            'nuptk' => $request->nuptk,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'notel' => $request->notel,
            'level' => $request->level,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60)
        ]);

        Session::flash('success', 'Data Admin berhasil ditambahkan. Silahkan Login');

        return view('login'); // Pastikan route 'log' sesuai dengan yang ada di routes/web.php
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'kelamin' => 'required',
            'pdd_terakhir' => 'required',
            'tgk_lahir' => 'required',
            'nuptk' => 'required',
            'alamat' => 'required',
            'email' => [
                'required',
                Rule::unique('users', 'email')
            ],
            'notel' => [
                'required',
                Rule::unique('users', 'notel')
            ],
            'password' => 'required',
            'level' => 'required',
        ], [
            'email.unique' => 'Email sudah digunakan.',
            'notel.unique' => 'Nomor telepon sudah digunakan.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = User::create([
            'name' => $request->name,
            'kelamin' => $request->kelamin,
            'pdd_terakhir' => $request->pdd_terakhir,
            'tgk_lahir' => $request->tgk_lahir,
            'nuptk' => $request->nuptk,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'notel' => $request->notel,
            'level' => $request->level,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60)
        ]);

        Session::flash('success', 'Data User berhasil ditambahkan.');

        return redirect()->route('akun'); // Pastikan route 'log' sesuai dengan yang ada di routes/web.php
    }

    public function edit($id)
    {
        $akun = User::findOrFail($id);

        return view('akun.edit', compact('akun'));
    }

    // Fungsi untuk mengupdate data user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'kelamin' => 'required',
            'pdd_terakhir' => 'required',
            'tgk_lahir' => 'required',
            'nuptk' => 'required',
            'alamat' => 'required',
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($id)
            ],
            'notel' => [
                'required',
                Rule::unique('users', 'notel')->ignore($id)
            ],
            'level' => 'required',
            'password' => 'required',
        ], [
            'email.unique' => 'Email sudah digunakan.',
            'notel.unique' => 'Nomor telepon sudah digunakan.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update data user
        $user->name = $request->name;
        $user->kelamin = $request->kelamin;
        $user->pdd_terakhir = $request->pdd_terakhir;
        $user->tgk_lahir = $request->tgk_lahir;
        $user->nuptk = $request->nuptk;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->notel = $request->notel;
        $user->level = $request->level;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        Session::flash('success', 'Data pengguna berhasil diperbarui.');

        return redirect()->route('akun'); // Ganti 'users.index' dengan route yang sesuai
    }

    public function loginproses(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user(); // Mendapatkan data user yang sedang login
    
            $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
    
            foreach ($tables as $table) {
                $columns = DB::getSchemaBuilder()->getColumnListing($table);
                
                // Cek apakah tabel memiliki kolom 'link'
                if (in_array('link', $columns)) {
                    $links = DB::table($table)->where('user_id', $user->id)->pluck('link');
    
                    // Memeriksa apakah ada link dalam tabel yang perlu dicek
                    if ($links->isNotEmpty()) {
                        foreach ($links as $link) {
                            // Mengarahkan pengguna ke link jika sudah login
                            return Redirect::away($link);
                        }
                    }
                }
            }
            Session::flash('success', 'Anda berhasil login sebagai ');
            return redirect('/home');
        }
    
        Session::flash('error', 'Email atau password salah.');
        return redirect('/');
    }

    public function loginguru(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user(); // Mendapatkan data user yang sedang login
    
            $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
    
            foreach ($tables as $table) {
                $columns = DB::getSchemaBuilder()->getColumnListing($table);
                
                // Cek apakah tabel memiliki kolom 'link'
                if (in_array('link', $columns)) {
                    $links = DB::table($table)->where('user_id', $user->id)->pluck('link');
    
                    // Memeriksa apakah ada link dalam tabel yang perlu dicek
                    if ($links->isNotEmpty()) {
                        foreach ($links as $link) {
                            // Mengarahkan pengguna ke link jika sudah login
                            return Redirect::away($link);
                        }
                    }
                }
            }
            Session::flash('success', 'Anda berhasil login sebagai ');
            return redirect('/home');
        }
    
        Session::flash('error', 'Email atau password salah.');
        return redirect('/');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    
    public function logoutguru(){
        Auth::logout();
        return redirect('/login-guru');
    }
    
    public function destroy($id){
        $akun = User::find($id);
        $akun->delete();
        return redirect()->route('akun');
    }
}

    


