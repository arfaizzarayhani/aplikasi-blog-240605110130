<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    /**
     * Halaman Utama / Home Publik (Maksimal 5 Artikel Terbaru)
     * 
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Ambil semua kategori untuk widget samping
        $categories = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

        // Query dasar artikel beserta relasinya
        $query = Artikel::with(['kategori', 'penulis'])
            ->orderBy('created_at', 'desc');

        // Jika pengunjung mengklik filter kategori di widget samping
        if ($request->has('kategori') && !empty($request->kategori)) {
            $query->where('id_kategori', $request->kategori);
        }

        // Batasi hanya mengambil 5 artikel terbaru sesuai instruksi soal
        $articles = $query->take(5)->get();

        return view('blog.index', compact('articles', 'categories'));
    }

    /**
     * Halaman Detail Artikel & 5 Artikel Terkait Sekategori
     * 
     * @param int $id
     * @return \Illuminate\View\View
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function detail($id)
    {
        // Ambil artikel utama yang dipilih
        $article = Artikel::with(['kategori', 'penulis'])
            ->findOrFail($id);

        // Ambil 5 artikel terkait dari kategori yang sama (kecuali artikel yang sedang dibaca)
        $relatedArticles = Artikel::where('id_kategori', $article->id_kategori)
            ->where('id', '!=', $id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('blog.detail', compact('article', 'relatedArticles'));
    }

    /**
     * Halaman Filter Kategori (Alternative route)
     * Menampilkan artikel berdasarkan kategori tertentu
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function kategori($id)
    {
        // Cek apakah kategori dengan id tersebut ada
        $kategoriAktif = KategoriArtikel::findOrFail($id);
        
        // Ambil semua kategori untuk widget
        $categories = KategoriArtikel::orderBy('nama_kategori', 'asc')->get();

        // Ambil artikel dari kategori tertentu
        $articles = Artikel::with(['kategori', 'penulis'])
            ->where('id_kategori', $id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('blog.index', compact('articles', 'categories'));
    }
}
