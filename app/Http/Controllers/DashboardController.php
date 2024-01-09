<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\KonsultasiVirtual;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $konsultasiCount = KonsultasiVirtual::whereDate('created_at', Carbon::today())->where(['status' => 2])->count();
        $bukuCount = Catalog::count();

        return view('admin.dashboard', compact('konsultasiCount', 'bukuCount'));
    }

    public function getData(Request $request)
    {
        $filter = $request->input('filter');

        // Default filter to today if not provided
        if (empty($filter)) {
            $filter = 'today';
        }

        // Get the start and end date based on the filter
        $startDate = Carbon::now()->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $filterInfo = '';

        if ($filter == 'thisMonth') {
            $startDate = Carbon::now()->startOfMonth();
            $endDate = Carbon::now()->endOfMonth();
            $filterInfo = 'Bulan Ini';
        } elseif ($filter == 'thisYear') {
            $startDate = Carbon::now()->startOfYear();
            $endDate = Carbon::now()->endOfYear();
            $filterInfo = 'Tahun Ini';
        } else {
            $filterInfo = 'Hari Ini';
        }

        // Query for KonsultasiVirtual
        $konsultasiCount = KonsultasiVirtual::where('status', 2)
            ->whereBetween(DB::raw('DATE(created_at)'), [$startDate, $endDate])
            ->count();

        // Query for Catalog
        $bukuCount = Catalog::whereBetween(DB::raw('DATE(created_at)'), [$startDate, $endDate])
            ->count();

        return response()->json([
            'konsultasiCount' => $konsultasiCount,
            'bukuCount' => $bukuCount,
            'filterInfo' => $filterInfo,
        ]);
    }
}
