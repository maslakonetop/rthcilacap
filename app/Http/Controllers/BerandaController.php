<?php

namespace App\Http\Controllers;

use App\Models\Datarth;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        return view('pages.index', [
            'title' => 'Beranda',
            'data' => Datarth::all(),
            'luas' => Datarth::sum('luas'),
            'jumlah' => Datarth::count('*')
        ]);
    }
    public function dokumen()
    {
        return view('pages.document', [
            'title' => 'Dokumen Pengguna'
        ]);
    }
    public function about()
    {
        return view('pages.about', [
            'title' => 'Tentang Aplikasi'
        ]);
    }
}
