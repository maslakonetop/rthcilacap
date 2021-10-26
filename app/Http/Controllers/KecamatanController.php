<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kecamatan.index', [
            'title' => 'Data Kecamatan',
            'kecamatan' => Kecamatan::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kecamatan.create', [
            'title' => 'Tambah Data Kecamatan',
            'data' => Kecamatan::max('id')
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
        $validatedData = $request->validate([
            'nama_kecamatan' => 'required|max:100'
        ]);
        Kecamatan::create($validatedData);

        $request->session()->flash('Berhasil', 'Akun berhasil dibuat!');

        return redirect('/kecamatan/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        return view('kecamatan.show', [
            'title' => 'Data Detail',
            'data' => $kecamatan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        return view('kecamatan.edit', [
            'title' => 'Edit Data Kecamatan',
            'data' => $kecamatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $validatedData = $request->validate([
            'nama_kecamatan' => 'required|max:100'
        ]);
        Kecamatan::where('id', $kecamatan->id)
            ->update($validatedData);

        // $request->sess('Berhasil', 'Akun berhasil dibuat!');

        return redirect('/kecamatan')->with('Berhasil', 'Akun berhasil dibuat!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kecamatan $kecamatan)
    {
        Kecamatan::destroy($kecamatan->id);

        return redirect('/kecamatan')->with('Terhapus', 'Data Berhasil dihapus!');
    }
}
