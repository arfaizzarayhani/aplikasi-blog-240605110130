@extends('layouts.app')

@section('title', 'Kelola Artikel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="fw-semibold mb-0" style="color: #333333;">Data Artikel</h6>
    <a href="{{ route('artikel.create') }}" class="btn btn-sm btn-success">
        + Tambah Artikel
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead>
                <tr style="background-color: #fafafa;">
                    <th class="px-3 py-2" style="font-size: 11px; color: #666666; text-transform: uppercase; letter-spacing: 0.05em;">
                        No
                    </th>
                    <th class="px-3 py-2" style="font-size: 11px; color: #666666; text-transform: uppercase; letter-spacing: 0.05em;">
                        Judul Artikel
                    </th>
                    <th class="px-3 py-2" style="font-size: 11px; color: #666666; text-transform: uppercase; letter-spacing: 0.05em;">
                        Kategori
                    </th>
                    <th class="px-3 py-2" style="font-size: 11px; color: #666666; text-transform: uppercase; letter-spacing: 0.05em;">
                        Penulis
                    </th>
                    <th class="px-3 py-2" style="font-size: 11px; color: #666666; text-transform: uppercase; letter-spacing: 0.05em;">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($artikel as $index => $a)
                    <tr>
                        <td class="px-3 py-2" style="font-size: 13px;">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-3 py-2 fw-semibold" style="font-size: 13px; color: #212529;">
                            {{ $a->judul }}
                        </td>
                        <td class="px-3 py-2" style="font-size: 13px;">
                            <span class="badge bg-light text-dark border">
                                {{ $a->kategori?->nama_kategori ?? '-' }}
                            </span>
                        </td>
                        <td class="px-3 py-2" style="font-size: 13px; color: #666666;">
                            {{ $a->penulis?->nama_depan ?? 'Admin' }}
                        </td>
                        <td class="px-3 py-2">
                            <div class="d-flex gap-2">
                                <a href="{{ route('artikel.edit', $a->id) }}" class="btn btn-sm" style="background-color: #e3f2fd; color: #1565c0; font-size: 12px;">
                                    Edit
                                </a>
                                <form action="{{ route('artikel.destroy', $a->id) }}" method="POST" onsubmit="return handleDelete(event, 'artikel')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm" style="background-color: #ffebee; color: #c62828; font-size: 12px;">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-3 py-4 text-center" style="font-size: 13px; color: #999999; font-style: italic;">
                            Belum ada data artikel.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection