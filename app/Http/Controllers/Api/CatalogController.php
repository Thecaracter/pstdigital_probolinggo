<?php

namespace App\Http\Controllers\Api;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class CatalogController extends Controller
{
    public function dataCatalog(Request $request)
    {
        try {
            $catalogs = Catalog::orderBy('tahun_terbit', 'asc')->get();

            // Status kode HTTP OK (200) jika data ditemukan
            $statusCode = Response::HTTP_OK;

            // Jika tidak ada katalog ditemukan, atur status kode ke Not Found (404)
            if ($catalogs->isEmpty()) {
                $statusCode = Response::HTTP_NOT_FOUND;
            }

            // Respons dengan data katalog, status kode, dan pesan
            return response()->json(['status' => 'success', 'catalogs' => $catalogs, 'status_code' => $statusCode], $statusCode);
        } catch (\Exception $e) {
            // Tangani eksepsi jika terjadi kesalahan internal
            return response()->json(['status' => 'error', 'error' => 'Internal Server Error', 'status_code' => Response::HTTP_INTERNAL_SERVER_ERROR], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
