<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Penulis;
use App\Models\KategoriArtikel;

class ArtikelController extends Controller
{
    public function index()
    {
        // Mengambil semua artikel beserta relasi penulis & kategori dengan urutan terbaru (Langkah 17)
        $artikel = Artikel::with('penulis', 'kategori')
            ->orderBy('id', 'desc')
            ->get();

        return view('artikel.index', compact('artikel'));
    }

    public function create()
    {
        // Mengambil data kategori diurutkan A-Z untuk dropdown form (Langkah 18)
        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

        return view('artikel.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        // Validasi wajib data artikel baru
        $request->validate([
            'judul'       => 'required|string|max:255',
            'isi'         => 'required|string',
            'id_kategori' => 'required|exists:kategori_artikel,id',
            'gambar'      => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Proses enkripsi nama berkas gambar dan simpan ke disk public
        $file     = $request->file('gambar');
        $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('gambar', $namaFile, 'public');

        // Menyimpan data artikel ke database beserta tanggal otomatis lokal (Langkah 18)
        Artikel::create([
            'judul'        => $request->judul,
            'isi'          => $request->isi,
            'id_penulis'   => Auth::user()->id,
            'id_kategori'  => $request->id_kategori,
            'gambar'       => $namaFile,
            'hari_tanggal' => now()->timezone('Asia/Jakarta')
                                  ->locale('id')
                                  ->isoFormat('dddd, D MMMM Y | HH:mm'),
        ]);

        return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil ditambahkan.'); 
    }

    public function edit(string $id)
    {
        // Mengambil data spesifik artikel dan daftar kategori untuk form edit (Langkah 19)
        $artikel  = Artikel::findOrFail($id);
        $kategori = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

        return view('artikel.edit', compact('artikel', 'kategori'));
    }

    public function update(Request $request, string $id)
    {
        $artikel = Artikel::findOrFail($id);

        // Validasi perubahan data artikel (gambar bersifat opsional saat edit)
        $request->validate([
            'judul'       => 'required|string|max:255',
            'isi'         => 'required|string',
            'id_kategori' => 'required|exists:kategori_artikel,id',
            'gambar'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'judul'       => $request->judul,
            'isi'         => $request->isi,
            'id_kategori' => $request->id_kategori,
        ];

        // Jika ada file gambar baru, hapus gambar lama dari storage dan simpan yang baru
        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete('gambar/' . $artikel->gambar);

            $file     = $request->file('gambar');
            $namaFile = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('gambar', $namaFile, 'public');

            $data['gambar'] = $namaFile;
        }

        $artikel->update($data);

        return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $artikel = Artikel::findOrFail($id);

        try {
            // Hapus berkas fisik gambar di storage sebelum record database dihapus (Langkah 20)
            Storage::disk('public')->delete('gambar/' . $artikel->gambar);

            $artikel->delete();

            return redirect()->route('artikel.index')->with('sukses', 'Artikel berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('artikel.index')->with('gagal', 'Artikel gagal dihapus.');
        }
    }
}
