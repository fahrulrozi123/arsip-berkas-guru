<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataGuru;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DataGuruController extends Controller
{

    public function index()
    {
        $userName = Auth::user()->name; // Ganti 'name' dengan atribut yang sesuai
        $guru = DataGuru::where('nama', $userName)->first();
        $data = DB::table('data_gurus')->get();
        return view('berkas_guru.index', compact('data', 'guru'));
    }

    public function create()
    {
        $users = User::all();
        return view('berkas_guru.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nuptk' => [
                'required',
                Rule::unique('data_gurus', 'nuptk'),
            ],
            'ijazah_S1' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'ktp' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'ijazah_S2' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'ijazah_SMA' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'ijazah_SMP' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'kk' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'ijazah_SD' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'sk_kepsek' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'sk_yayasan' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'akte' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->with(['error' => 'NUPTK sudah digunakan.']);
        }
    
        $userName = Auth::user()->name;
    
        $guru = DataGuru::updateOrCreate(
            ['nama' => $userName],
            [
                'nuptk' => $request->nuptk,
                'ijazah_S1' => $request->ijazah_S1,
                'ijazah_S2' => $request->ijazah_S2,
                'ktp' => $request->ktp,
                'ijazah_SMA' => $request->ijazah_SMA,
                'ijazah_SMP' => $request->ijazah_SMP,
                'kk' => $request->kk,
                'ijazah_SD' => $request->ijazah_SD,
                'sk_kepsek' => $request->sk_kepsek,
                'sk_yayasan' => $request->sk_yayasan,
                'akte' => $request->akte,
            ]
        );

        $userFolder = public_path("berkas_guru/$userName");
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0755, true);
        }

        $fileFields = ['ijazah_S1', 'ijazah_S2', 'ktp', 'ijazah_SMA', 'ijazah_SMP', 'kk', 'ijazah_SD', 'sk_kepsek', 'sk_yayasan', 'akte'];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);

                $uniqueFileName = uniqid() . '_' . $file->getClientOriginalName();

                if ($guru->$field) {
                    File::delete(public_path($guru->$field));
                }

                $file->move($userFolder, $uniqueFileName);
                $guru->$field = "berkas_guru/$userName/$uniqueFileName";
            }
        }

        $guru->save();

        session()->flash('success', 'Berkas berhasil di Upload.');

        return redirect()->route('berkas');

    }

    public function edit($id)
    {
        $data = DataGuru::findOrFail($id);
        $users = User::all();
        return view('berkas_guru.edit', compact('data', 'users'));
    }

    public function update(Request $request, $id)
    {
        $guru = DataGuru::findOrFail($id);
    
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nuptk' => [
                'required',
                Rule::unique('data_gurus', 'nuptk')->ignore($guru->id),
            ],
            'ijazah_S1' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'ktp' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'ijazah_S2' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'ijazah_SMA' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'ijazah_SMP' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'kk' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'ijazah_SD' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'sk_kepsek' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'sk_yayasan' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
            'akte' => 'mimes:png,jpg,pdf,doc,docx,xls,xlsx',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator)->with(['error' => 'NUPTK sudah digunakan.']);
        }
    
        $userFolder = public_path("berkas_guru/{$guru->nama}");
        if (!File::exists($userFolder)) {
            File::makeDirectory($userFolder, 0755, true);
        }
    
        $fileFields = ['ijazah_S1', 'ijazah_S2', 'ktp', 'ijazah_SMA', 'ijazah_SMP', 'kk', 'ijazah_SD', 'sk_kepsek', 'sk_yayasan', 'akte'];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
    
                $uniqueFileName = uniqid() . '_' . $file->getClientOriginalName();
    
                if ($guru->$field) {
                    File::delete(public_path($guru->$field));
                }
    
                $file->move($userFolder, $uniqueFileName);
                $guru->$field = "berkas_guru/{$guru->nama}/$uniqueFileName";
            }
        }
    
        $guru->nuptk = $request->nuptk;
        $guru->save();
    
        if ($request->hasFile('nama') || $request->hasFile('nuptk') || $request->hasFile('ijazah_S1') || $request->hasFile('ijazah_S2') || $request->hasFile('ktp') || $request->hasFile('ijazah_SMA') || $request->hasFile('ijazah_SMP') || $request->hasFile('kk') || $request->hasFile('ijazah_SD') || $request->hasFile('sk_kepsek') || $request->hasFile('sk_yayasan') || $request->hasFile('akte')) {
            session()->flash('success', 'Data guru berhasil di Update.');
        } else {
            session()->flash('success', 'Tidak ada perubahan pada data guru.');
        }
    
        return redirect()->route('berkas');
    }

    public function destroy($id)
    {
        $guru = DataGuru::findOrFail($id);
    
        // Hapus semua berkas terkait
        $fileFields = ['ijazah_S1', 'ijazah_S2', 'ktp', 'ijazah_SMA', 'ijazah_SMP', 'kk', 'ijazah_SD', 'sk_kepsek', 'sk_yayasan', 'akte'];
        foreach ($fileFields as $field) {
            if ($guru->$field) {
                File::delete(public_path($guru->$field));
            }
        }
    
        // Hapus folder pengguna jika sudah tidak ada berkas yang tersimpan
        $userFolder = public_path("berkas_guru/{$guru->nama}");
        if (File::exists($userFolder)) {
            if (count(File::allFiles($userFolder)) === 0) {
                File::deleteDirectory($userFolder);
            }
        }
    
        // Hapus data guru dari database
        $guru->delete();
    
        session()->flash('success', 'Data guru berhasil dihapus beserta berkas terkait.');
        return redirect()->route('berkas');
    }    
    
    public function lihatBerkas($file)
    {
        // Mendapatkan nama pengguna yang sedang login
        $userName = Auth::user()->name; // Ganti 'name' dengan atribut yang sesuai

        // Mendapatkan path ke file
        $filePath = public_path("berkas_guru/$userName/$file");

        // Periksa apakah file ada
        if (File::exists($filePath)) {
            return response()->file($filePath);
        }

        abort(404);
    }
}
