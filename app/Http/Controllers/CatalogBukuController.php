<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogBukuController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::orderBy('tahun_terbit', 'asc')->get();
        return view('catalog', compact('catalogs'));
    }
}
