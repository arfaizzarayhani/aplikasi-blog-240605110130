@extends('layouts.public')

@section('title', 'CMS Blog - Artikel Terbaru')

@section('content')
<!-- Judul Halaman Bergaya CMS -->
<div class="d-flex justify-content-between align-items-center mb-5">
    <h5 class="fw-semibold mb-0" style="color: #333333; font-size: 18px;">Artikel Terbaru</h5>
</div>

<div class="row g-4">
    <!-- Kolom Kiri: Daftar Artikel -->
    <div class="col-lg-8">
        @forelse($articles as $art)
            <div class="card card-blog border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <!-- Badge Kategori bergaya tabel CMS -->
                    <div class="mb-2">
                        <span class="badge-cms">
                            {{ $art->kategori?->nama_kategori ?? 'Umum' }}
                        </span>
                    </div>
                    
                    <!-- Judul Artikel -->
                    <h5 class="fw-semibold mb-2" style="font-size: 18px;">
                        <a href="/blog/detail/{{ $art->id }}" class="text-decoration-none" style="color: #212529;">
                            {{ $art->judul }}
                        </a>
                    </h5>
                    
                    <!-- Meta info (Penulis & Tanggal) -->
                    <p class="text-muted" style="font-size: 12px; margin-bottom: 14px;">
                        Oleh: <span class="text-dark fw-medium">{{ $art->penulis?->nama_depan ?? 'Admin' }}</span> | 
                        📅 {{ \Carbon\Carbon::parse($art->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                    </p>
                    
                    <!-- Ringkasan Isi -->
                    <p style="font-size: 14px; color: #555555; line-height: 1.6; text-align: justify;">
                        {{ Str::limit(strip_tags($art->isi), 200, '...') }}
                    </p>
                    
                    <!-- Tombol Baca Selengkapnya Berwarna Hijau CMS -->
                    <a href="/blog/detail/{{ $art->id }}" class="btn-green-cms">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>
        @empty
            <div class="card card-blog border-0 shadow-sm p-4 text-center text-muted" style="font-style: italic; font-size: 13px;">
                Belum ada data artikel publik yang tersedia.
            </div>
        @endforelse
    </div>

    <!-- Kolom Kanan: Saring Kategori Bergaya Bersih/Minimalis -->
    <div class="col-lg-4">
        <div class="card card-blog border-0 shadow-sm p-3" style="position: sticky; top: 100px;">
            <div class="text-uppercase fw-semibold mb-3" style="font-size: 10px; color: #adb5bd; letter-spacing: 0.05em; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
                Saring Kategori
            </div>
            <div class="list-group list-group-flush" style="font-size: 13px;">
                <a href="/" class="list-group-item list-group-item-action border-0 px-2 py-2 rounded mb-1 {{ !request('kategori') ? 'bg-light fw-bold text-success' : '' }}" style="color: #212529;">
                    Semua Kategori
                </a>
                @foreach($categories as $cat)
                    <a href="/?kategori={{ $cat->id }}" class="list-group-item list-group-item-action border-0 px-2 py-2 rounded mb-1 {{ request('kategori') == $cat->id ? 'bg-light fw-bold text-success' : '' }}" style="color: #212529;">
                        {{ $cat->nama_kategori }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
