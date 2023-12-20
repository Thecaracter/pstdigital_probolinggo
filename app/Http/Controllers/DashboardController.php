<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Models\KonsultasiVirtual;

class DashboardController extends Controller
{
    public function index()
    {
        $konsultasiCount = KonsultasiVirtual::count();
        $bukuCount = Catalog::count();

        return view('admin.dashboard', compact('konsultasiCount', 'bukuCount'));
    }
}
