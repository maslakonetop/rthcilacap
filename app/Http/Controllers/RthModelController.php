<?php

namespace App\Http\Controllers;

use App\Models\RthModel;
use Illuminate\Http\Request;

class RthModelController extends Controller
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
            'data' => RthModel::paginate(7)
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
            'data' => RthModel::max('id'),
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
        RthModel::create($rule);
        return redirect('/data')->with('Berhasil', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RthModel  $rthModel
     * @return \Illuminate\Http\Response
     */
    public function show(RthModel $rthModel)
    {
        dd($rthModel);
        return view('data.detail', [
            'title' => 'Detail Data',
            'data' => $rthModel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RthModel  $rthModel
     * @return \Illuminate\Http\Response
     */
    public function edit(RthModel $rthModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RthModel  $rthModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RthModel $rthModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RthModel  $rthModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(RthModel $rthModel)
    {
        //
    }
}
