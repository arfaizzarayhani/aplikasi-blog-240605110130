<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriArtikel;

class KategoriArtikelController extends Controller
{
    public function index()
    {
        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        // Mengembalikan tampilan form tambah kategori
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        // Memvalidasi data inputan dari form
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori_artikel,nama_kategori',
            'keterangan'    => 'nullable|string',
        ]);

        // Menyimpan data kategori baru ke database
        KategoriArtikel::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan'    => $request->keterangan,
        ]);

        // Mengarahkan kembali ke halaman index dengan pesan sukses
        return redirect()->route('kategori.index')->with('sukses', 'Kategori berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        // Mencari data kategori berdasarkan id, jika tidak ada langsung memunculkan error 404
        $kategori = KategoriArtikel::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, string $id)
    {
        $kategori = KategoriArtikel::findOrFail($id);

        // Validasi input dengan pengecualian ID yang sedang diubah agar tidak bentrok unique
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori_artikel,nama_kategori,' . $id,
            'keterangan'    => 'nullable|string',
        ]);

        // Proses memperbarui data di database
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan'    => $request->keterangan,
        ]);

        // Mengarahkan kembali ke halaman index dengan pesan sukses pembaruan
        return redirect()->route('kategori.index')->with('sukses', 'Kategori berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        //
    }
}
