@extends('layouts.pengunjung')

@section('content')

<div class="row">

    <div class="col-md-8">

        <div class="card">

            <div class="card-body">

                <h2>

                    {{ $artikel->judul }}

                </h2>

                <hr>

                <p>

                    {{ $artikel->isi }}

                </p>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-header">

                Artikel Terkait

            </div>

            <div class="list-group list-group-flush">

                @foreach($terkait as $t)

                <a
                    href="/blog/detail/{{ $t->id }}"
                    class="list-group-item">

                    {{ $t->judul }}

                </a>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection