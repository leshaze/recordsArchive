@extends('layout.app')
@section('title', '- Detail Record')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="card-header">{{ $record->title }} - {{ $record->kind }} </div>
                <ul>
                    <li><a href="{{ route('artists.show', ['artist' => $record->artist_id]) }}">
                            {{ $record->artist->name }}</a></li>
                    <li><a href="{{ route('labels.show', ['label' => $record->label_id]) }}">{{ $record->label->name }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
