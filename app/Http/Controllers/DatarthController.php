<?php

namespace App\Http\Controllers;

use App\Models\Datarth;
use App\Models\Desa;
use App\Models\Jenisrth;
use App\Models\Kecamatan;
use App\Models\Statuslahan;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class DatarthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data.index', [
            'title' => 'List RTH Kab. Cilacap',
            'data' => Datarth::paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.create', [
            'title' => 'Data Baru RTH',
            'data' => DataRth::max('id'),
            'jenis' => Jenisrth::all(),
            'status' => Statuslahan::all(),
            'keterangan' => Statuslahan::distinct()->count(),
            'kecamatans' => Kecamatan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $rule = $request->validate([
            'jenis_rth' => 'required',
            'nama_taman' => 'required|min:5|max:100',
            'lokasi' => 'required|min:5|max:100',
            'latitude' => 'required',
            'longitude' => 'required',
            'kecamatan' => 'required',
            'luas' => 'required',
            'status_lahan' => 'required',
            'keterangan' => 'required',
            'file_kml' => 'required'
        ]);
        // dd($rule);
        Datarth::create($rule);
        return redirect('/data')->with('Berhasil', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datarth  $datarth
     * @return \Illuminate\Http\Response
     */
    public function show(Datarth $datarth)
    {
        // dd($datarth);
        return view('data.detail', [
            'title' => 'Detail Data',
            'data' => $datarth
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datarth  $datarth
     * @return \Illuminate\Http\Response
     */
    public function edit(Datarth $datarth)
    {
        // dd(Datarth);
        return view('data.edit', [
            'title' => 'Edit Data',
            'data' => $datarth,
            'kecamatan' => Kecamatan::all(),
            'desa' => Desa::all(),
            'status' => Statuslahan::all(),
            'jenis' => Jenisrth::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datarth  $datarth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datarth $datarth)
    {
        // dd($request);
        $rules = $request->validate([
            'jenis_rth' => 'required',
            'nama_taman' => 'required|min:5|max:100',
            'lokasi' => 'required|min:5|max:100',
            'latitude' => 'required',
            'longitude' => 'required',
            'kecamatan' => 'required',
            'luas' => 'required',
            'status_lahan' => 'required',
            'keterangan' => 'required',
            'file_kml' => 'required'
        ]);

        Datarth::where('id', $datarth->id)
            ->update($rules);
        return redirect('/data')->with('Berhasil', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datarth  $datarth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datarth $datarth)
    {
        Datarth::destroy($datarth->id);
        return redirect('/data')->with('Berhasil', 'Data berhasil dihapus');
    }
}
