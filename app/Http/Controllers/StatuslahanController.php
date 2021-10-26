<?php

namespace App\Http\Controllers;

use App\Models\Statuslahan;
use Illuminate\Http\Request;

class StatuslahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lahan.index', [
            'title' => 'Data Master Status Lahan',
            'data' => Statuslahan::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statuslahan  $statuslahan
     * @return \Illuminate\Http\Response
     */
    public function show(Statuslahan $statuslahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statuslahan  $statuslahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Statuslahan $statuslahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statuslahan  $statuslahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statuslahan $statuslahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statuslahan  $statuslahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statuslahan $statuslahan)
    {
        //
    }
}
