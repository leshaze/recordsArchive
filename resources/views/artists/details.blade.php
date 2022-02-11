@extends('layout.app')
@section('title', '- Detail Artist')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="card-header">{{ $artist->name }}</div>
                <ul>
                    @foreach ($records as $record)
                        <li>
                            Record: <a
                                href="{{ route('records.show', ['record' => $record->id]) }}">{{ $record->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
