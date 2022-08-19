@extends('layout.app')
@section('title', '- Platforms')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="card-header">{{ __('Anbieter') }}</div>

                <div class="card-body">
                    @foreach ($platforms as $platform)
                        <a href="{{ route('platforms.edit', ['platform' => $platform->id]) }}" >{{ $platform->name }} - {{ $platform->url }}</a><br>
                    @endforeach
                </div>

            </div>
            {{ $platforms->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection