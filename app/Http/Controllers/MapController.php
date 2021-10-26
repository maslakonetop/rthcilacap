<?php

namespace App\Http\Controllers;

use App\Models\Datarth;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        return view('map.index', [
            'title' => 'Lokasi RTH',
            'data' =>   Datarth::all(),
            'maps' => Datarth::paginate(10)
        ]);
    }
    public function show($id)
    {
        return view('map.detail', [
            'title' => 'Detail RTH',
            'maps' => Datarth::find($id)
        ]);
    }
}
