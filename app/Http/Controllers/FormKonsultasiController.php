<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KonsultasiVirtual;
use Illuminate\Support\Facades\Validator;

class FormKonsultasiController extends Controller
{
    public function store(Request $request)
    {
        // Validasi formulir
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|regex:/[1-9][0-9]*/', // Pastikan tidak ada angka 0 di depan nomor telepon
        ]);

        // Jika validasi gagal, kembalikan dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buat instance baru dari model KonsultasiVirtual
        KonsultasiVirtual::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'no_telp' => $request->input('no_telp'),
        ]);
        $notification = [
            'title' => 'Selamat Janji Telah Dibuat!',
            'text' => 'Data silahkan menunggu konfirmasi melalui WA dari admin',
            'type' => 'success',
        ];
        // Redirect ke halaman sukses atau tindakan lainnya
        return redirect()->back()->with('notification', $notification)->withInput();
    }

}
