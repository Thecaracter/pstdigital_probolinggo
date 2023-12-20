<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs = Catalog::all();
        return view('admin.catalog', compact('catalogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'nama_buku' => 'required',
                'deskripsi' => 'required',
                'tahun_terbit' => 'required|numeric',
                'link' => 'required',
                'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);


            if ($validator->fails()) {
                throw new ValidationException($validator);
            }


            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fileName = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('uploads'), $fileName);
                $path = 'uploads/' . $fileName;
            }


            $catalog = new Catalog;
            $catalog->nama_buku = $request->input('nama_buku');
            $catalog->deskripsi = $request->input('deskripsi');
            $catalog->tahun_terbit = $request->input('tahun_terbit');
            $catalog->link = $request->input('link');
            $catalog->foto = $path;


            $catalog->save();


            $notification = [
                'title' => 'Selamat!',
                'text' => 'Data buku berhasil ditambahkan',
                'type' => 'success',
            ];


            return redirect()->route('catalog.index')->with('notification', $notification);
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();

            return redirect()->back()->withErrors($errors)->withInput();
        } catch (\Exception $e) {
            $notification = [
                'title' => 'Oops!',
                'text' => 'Ada yang salah, coba lagi ya!',
                'type' => 'error',
            ];


            return redirect()->route('catalog.index')->with('notification', $notification);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_buku' => 'required',
                'deskripsi' => 'required',
                'tahun_terbit' => 'required|numeric',
                'link' => 'required',
                'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $catalog = Catalog::findOrFail($id);
            $catalog->nama_buku = $request->input('nama_buku');
            $catalog->deskripsi = $request->input('deskripsi');
            $catalog->link = $request->input('link');
            $catalog->tahun_terbit = $request->input('tahun_terbit');

            // Check if a new photo is uploaded
            if ($request->hasFile('foto')) {
                // Delete the old photo
                if (File::exists(public_path($catalog->foto))) {
                    File::delete(public_path($catalog->foto));
                }

                // Upload and save the new photo
                $foto = $request->file('foto');
                $fileName = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('uploads'), $fileName);
                $catalog->foto = 'uploads/' . $fileName;
            }

            $catalog->save();

            $notification = [
                'title' => 'Selamat!',
                'text' => 'Data buku berhasil diperbarui',
                'type' => 'success',
            ];

            return redirect()->route('catalog.index')->with('notification', $notification);
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();

            return redirect()->back()->withErrors($errors)->withInput();
        } catch (\Exception $e) {
            $notification = [
                'title' => 'Oops!',
                'text' => 'Ada yang salah, coba lagi ya!',
                'type' => 'error',
            ];

            return redirect()->route('catalog.index')->with('notification', $notification);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $catalog = Catalog::findOrFail($id);

            // Delete the associated photo
            if (File::exists(public_path($catalog->foto))) {
                File::delete(public_path($catalog->foto));
            }

            $catalog->delete();

            $notification = [
                'title' => 'Selamat!',
                'text' => 'Data buku berhasil dihapus',
                'type' => 'success',
            ];

            return redirect()->route('catalog.index')->with('notification', $notification)->withInput();
        } catch (\Exception $e) {
            $notification = [
                'title' => 'Oops!',
                'text' => 'Ada yang salah, coba lagi ya!',
                'type' => 'error',
            ];

            return redirect()->route('catalog.index')->with('notification', $notification)->withInput();
        }
    }
}
