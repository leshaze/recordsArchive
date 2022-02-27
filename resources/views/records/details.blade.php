@extends('layout.app')
@section('title', '- Detail Record')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="card-header">{{ $record->title }} - {{ $record->kind }} </div>
                <div>
                    @foreach ($images as $image)
                        <img src="{{ URL::asset('storage/' . $image->path) }}" width="100px" height="100px"
                            alt="{{ $image->name }}"><button class="btn btn-link" onclick="return confirm('Delete {{ $record->artist->name }} - {{ $record->title }}?')"><i
                                class="bi bi-trash"></i> </button>
                    @endforeach
                </div>
                <ul>
                    <li><a href="{{ route('artists.show', ['artist' => $record->artist_id]) }}">
                            {{ $record->artist->name }}</a></li>
                    <li><a
                            href="{{ route('labels.show', ['label' => $record->label_id]) }}">{{ $record->label->name }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
