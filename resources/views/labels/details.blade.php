@extends('layout.app')
@section('title', '- Detail Label')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="card-header">{{ $label->name }}</div>
                <ul>
                    @foreach ($records as $record)
                        <li>
                            Record: <a href="{{ route('records.show', ['record' => $record->id]) }}">{{ $record->title }}</a> - Artist: <a href="{{ route('artists.show', ['artist' => $record->artist->id]) }}">{{ $record->artist->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
