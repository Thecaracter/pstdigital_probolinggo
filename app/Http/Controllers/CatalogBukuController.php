<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogBukuController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::orderBy('tahun_terbit', 'asc')->get();
        $uniqueYears = $catalogs->pluck('tahun_terbit')->unique();
        return view('catalog', compact('catalogs', 'uniqueYears'));
    }
}
