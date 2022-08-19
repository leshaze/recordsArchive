@extends('layout.app')
@section('title', '- Artits')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="card-header">{{ __('Artists') }}</div>

                <div class="card-body">
                    @foreach ($artists as $artist)
                        <a href="{{ route('artists.show', ['artist' => $artist->id]) }}" >{{ $artist->name }} </a><br>
                    @endforeach
                </div>

            </div>
            {{ $artists->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
