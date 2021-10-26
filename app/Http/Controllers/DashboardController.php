<?php

namespace App\Http\Controllers;

use App\Models\Datarth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $luas = DB::table('datarths')
            ->sum('luas');
        return view('admin.dashboard', [
            'title' => 'Dashboard Admin',
            'data' => Datarth::paginate(4),
            'maps' => Datarth::all(),
            'luas' => $luas
        ]);
    }
}
