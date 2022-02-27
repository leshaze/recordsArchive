@extends('layout.app')
@section('title', '- Detail Artist')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="card-header">{{ $artist->name }} <a
                        href="{{ route('artists.edit', ['artist' => $artist->id]) }}" class="btn btn-sm"><i
                            class="bi bi-pencil-square"></i></a>
                            <a href="javascript:document.getElementById('delete-artist-form').submit();"
                                class="btn btn-sm"><i class="bi bi-trash"></i></a>
                            <form id="delete-artist-form"
                                action="{{ route('artists.destroy', ['artist' => $artist->id]) }}" method="post"
                                style="display: none;">
                                @method('DELETE')
                                {{ csrf_field() }}
                            </form></td>
                </div>
                <div>
                    @foreach ($images as $image)
                        <img src="{{ URL::asset('storage/' . $image->path) }}" width="100px" height="100px"
                            alt="{{ $image->name }}">
                    @endforeach
                </div>
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
