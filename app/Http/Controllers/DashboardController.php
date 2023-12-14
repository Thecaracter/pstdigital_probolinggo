<?php

namespace App\Http\Controllers;

use App\Models\KonsultasiVirtual;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $konsultasiCount = KonsultasiVirtual::count();

        return view('admin.dashboard', compact('konsultasiCount'));
    }
}
