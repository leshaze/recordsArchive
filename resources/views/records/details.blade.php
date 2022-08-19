@extends('layout.app')
@section('title', '- Detail Record')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="card-header">{{ $record->title }} - {{ $record->kind }} <a
                        href="{{ route('records.edit', ['record' => $record->id]) }}" class="btn btn-sm"><i
                            class="bi bi-pencil-square"></i></a> <a
                        href="javascript:document.getElementById('delete-record-form').submit();" class="btn btn-sm"><i
                            class="bi bi-trash" onclick="return confirm('Delete {{ $record->artist->name }} - {{ $record->title }}?')"></i></a>
                    <form id="delete-record-form" action="{{ route('records.destroy', ['record' => $record->id]) }}"
                        method="post" style="display: none;">
                        @method('DELETE')
                        {{ csrf_field() }}
                    </form>
                </div>
                {{-- <ul>
                    @foreach ($images as $image)
                        <li>
                            <a href="#bild{{ $loop->count }}"><img src="{{ URL::asset('storage/' . $image->path) }}"
                                    width="80px" height="80px" alt="{{ $image->name }}"></a>
                        </li>
                    @endforeach
                </ul>
                <ul class="#lightbox">
                    @foreach ($images as $image)
                        <li id ="bild{{ $loop->count }}">
                            <a href="#"><img src="{{ URL::asset('storage/' . $image->path) }}"
                                    width="250px" height="250px" alt="{{ $image->name }}"></a>
                        </li>
                    @endforeach
                </ul> --}}
                
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
