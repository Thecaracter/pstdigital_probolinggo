<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\KonsultasiVirtual;

class KonsultasiVirtualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil tanggal hari ini
        $today = Carbon::today();

        // Ambil data KonsultasiVirtual hanya untuk hari ini
        $konsultasi = KonsultasiVirtual::whereDate('created_at', $today)->where(['status' => 1])->get();

        return view('admin.konsultasi', compact('konsultasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KonsultasiVirtual $konsultasiVirtual)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KonsultasiVirtual $konsultasiVirtual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KonsultasiVirtual $konsultasiVirtual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function update_status(string $id)
    {
        $konsultasiVirtual = KonsultasiVirtual::findOrFail($id);

        // Update the status to 2 instead of deleting
        $konsultasiVirtual->update(['status' => 2]);

        $notification = [
            'title' => 'Selamat!',
            'text' => 'Status pengguna berhasil diupdate',
            'type' => 'success',
        ];

        return redirect()->route('konsultasi.index')->with('notification', $notification)->withInput();
    }

}
