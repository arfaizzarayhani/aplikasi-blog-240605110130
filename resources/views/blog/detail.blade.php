@extends('layouts.public')

@section('title', $article->judul)

@section('content')
<div class="mb-4">
    <a href="/" class="text-decoration-none small fw-semibold" style="color: #2e7d32;">
        ← Kembali ke Beranda
    </a>
</div>

<div class="row g-4">
    <!-- Kolom Kiri: Isi Detail Artikel -->
    <div class="col-md-8">
        <div class="card card-blog border-0 shadow-sm p-4">
            <div class="mb-3">
                <span class="badge-cms">
                    {{ $article->kategori?->nama_kategori ?? 'Umum' }}
                </span>
            </div>
            
            <h3 class="fw-semibold mb-3" style="color: #212529; font-size: 24px;">
                {{ $article->judul }}
            </h3>
            
            <div class="text-muted pb-3 mb-4 border-bottom" style="font-size: 12px;">
                <strong style="color: #555;">{{ $article->penulis?->nama_depan ?? 'Admin' }}</strong> | 
                📅 {{ \Carbon\Carbon::parse($article->created_at)->locale('id')->isoFormat('dddd, D MMMM Y | HH:mm') }}
            </div>
            
            <div style="font-size: 15px; color: #495057; line-height: 1.8; text-align: justify;">
                {!! nl2br(e($article->isi)) !!}
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Artikel Terkait -->
    <div class="col-md-4">
        <div class="card card-blog border-0 shadow-sm p-3" style="position: sticky; top: 20px;">
            <div class="text-uppercase fw-semibold mb-3" style="font-size: 10px; color: #adb5bd; letter-spacing: 0.05em; border-bottom: 1px solid #f0f0f0; padding-bottom: 10px;">
                Artikel Terkait
            </div>
            <div class="list-group list-group-flush" style="font-size: 13px;">
                @forelse($relatedArticles as $rel)
                    <a href="/blog/detail/{{ $rel->id }}" class="list-group-item list-group-item-action border-0 px-0 py-2 rounded mb-1" style="color: #212529;">
                        • {{ $rel->judul }}
                    </a>
                @empty
                    <div class="text-muted small py-2" style="font-style: italic;">
                        Tidak ada artikel terkait dari kategori yang sama.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
