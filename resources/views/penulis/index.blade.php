@extends('layouts.app')

@section('title', 'Kelola Penulis')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="fw-semibold mb-0" style="color: #333333;">Data Penulis</h6>
    <a href="{{ route('penulis.create') }}" class="btn btn-sm btn-success">
        + Tambah Penulis
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
                        Foto
                    </th>
                    <th class="px-3 py-2" style="font-size: 11px; color: #666666; text-transform: uppercase; letter-spacing: 0.05em;">
                        Nama Penulis
                    </th>
                    <th class="px-3 py-2" style="font-size: 11px; color: #666666; text-transform: uppercase; letter-spacing: 0.05em;">
                        Username
                    </th>
                    <th class="px-3 py-2" style="font-size: 11px; color: #666666; text-transform: uppercase; letter-spacing: 0.05em;">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($penulis as $index => $p)
                    <tr>
                        <td class="px-3 py-2" style="font-size: 13px;">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-3 py-2">
                            <img src="{{ asset('storage/foto/' . ($p->foto ?? 'default.png')) }}" 
                                 alt="Foto {{ $p->nama_depan }}" 
                                 style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 1px solid #e9ecef;">
                        </td>
                        <td class="px-3 py-2 fw-semibold" style="font-size: 13px; color: #212529;">
                            {{ $p->nama_depan }} {{ $p->nama_belakang }}
                        </td>
                        <td class="px-3 py-2" style="font-size: 13px;">
                            <span class="badge bg-light text-dark border">
                                {{ $p->user_name }}
                            </span>
                        </td>
                        <td class="px-3 py-2">
                            <div class="d-flex gap-2">
                                <a href="{{ route('penulis.edit', $p->id) }}" class="btn btn-sm" style="background-color: #e3f2fd; color: #1565c0; font-size: 12px;">
                                    Edit
                                </a>
                                <form action="{{ route('penulis.destroy', $p->id) }}" method="POST" onsubmit="return handleDelete(event, 'penulis')">
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
                            Belum ada data penulis.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
