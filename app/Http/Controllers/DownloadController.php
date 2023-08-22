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
use ZipArchive;

class DownloadController extends Controller
{
    public function index()
    {
        $userName = Auth::user()->name; // Ganti 'name' dengan atribut yang sesuai
        $guru = DataGuru::where('nama', $userName)->first();
        $data = DB::table('data_gurus')->get();
        return view('download_berkas.index', compact('data', 'userName'));
    }

    public function download($id)
    {
        $guru = DataGuru::findOrFail($id);

        $zipFileName = "berkas_{$guru->nama}.zip";
        $zip = new ZipArchive();
        $zip->open(public_path($zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE);

        $userFolder = public_path("berkas_guru/{$guru->nama}");
        $files = glob($userFolder . '/*');
        
        foreach ($files as $file) {
            $fileName = basename($file);
            $zip->addFile($file, $fileName);
        }
        
        $zip->close();

        return response()->download(public_path($zipFileName))->deleteFileAfterSend(true);
    }

    public function lihatBerkasguru($username, $file)
    {
        $filePath = public_path("berkas_guru/$username/$file");

        if (File::exists($filePath)) {
            return response()->file($filePath);
        }

        abort(404);
    }

}
