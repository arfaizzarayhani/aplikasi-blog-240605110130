@extends('layouts.pengunjung')

@section('content')

<div class="row">

    <div class="col-md-8">

        @foreach($artikel as $a)

        <div class="card mb-3">

            <div class="card-body">

                <h4>

                    <a href="/blog/detail/{{ $a->id }}"
                       class="text-decoration-none">

                        {{ $a->judul }}

                    </a>

                </h4>

                <p>

                    {{ Str::limit($a->isi,100) }}

                </p>

            </div>

        </div>

        @endforeach

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-header">

                Kategori

            </div>

            <div class="list-group list-group-flush">

                @foreach($kategori as $k)

                <a
                    href="/blog/kategori/{{ $k->id }}"
                    class="list-group-item list-group-item-action">

                    {{ $k->nama_kategori }}

                </a>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection