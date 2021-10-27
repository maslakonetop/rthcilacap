<?php

namespace App\Http\Controllers;

use App\Models\Datarth;
use App\Models\Kecamatan;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HitungController extends Controller
{
    public function index()
    {
        return view('hitung.index', [
            'title' => 'Perhitungan Persentase RTH',
            'data' => Datarth::paginate(5),
            'luas' => Datarth::sum('luas')
        ]);
    }
    public function selectSearch(Request $request)
    {
        $kecamatan = [];

        if ($request->has('q')) {
            $search = $request->q;
            $kecamatan = Kecamatan::select('id', 'nama_kecamatan')
                ->where('nama_kecamatan', 'LIKE', "%" . $search . "%")
                ->get();
        }
        return response()->json($kecamatan);
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $jenazah = DB::table('datarths')
            ->where('kecamatan', 'like', "%" . $cari . "%")
            ->paginate(5);
        $subtotal = Datarth::where('kecamatan', 'like', "%" . $cari . "%")
            ->sum('luas');
        $totalluas = 69000000;
        $persentase = ($subtotal / $totalluas) * 100;

        // mengirim data pegawai ke view index
        return view('hitung.index', [
            'data' => $jenazah,
            'luas' => $subtotal,
            'persen' => $persentase,
            'title' => 'Perhitungan Persentase RTH'

        ]);
    }
}
