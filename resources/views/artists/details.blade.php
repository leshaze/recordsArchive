@extends('layout.app')
@section('title', '- Print Artist')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="card-header justify-content-between align-items-center d-flex">
                    <div> {{ $artist->name }} <a href="{{ route('artists.edit', ['artist' => $artist->id]) }}"
                            class="btn btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <a href="javascript:document.getElementById('delete-artist-form').submit();" class="btn btn-sm"
                            onclick="return confirm('Delete {{ $artist->name }}?')"><i class="bi bi-trash"></i></a>
                        <form id="delete-artist-form" action="{{ route('artists.destroy', ['artist' => $artist->id]) }}"
                            method="post" style="display: none;">
                            @method('DELETE')
                            {{ csrf_field() }}
                        </form>
                        </td>
                    </div>
                    <div><a class="btn btn-info btn-sm" href="{{ route('artists.print', ['artist' => $artist->id]) }}"
                            )">Export</a></div>
            </div>
            {{-- @foreach ($images as $image)
                                <img src="{{ URL::asset('storage/' . $image->path) }}" width="100px" height="100px"
                                    alt="{{ $image->name }}">
                        @endforeach --}}
            <table class="table small xs">
                <tr>
                    <th>Kind</th>
                    <th>Title</th>
                    <th>Label</th>
                    <th>Cover</th>
                    <th>Media</th>
                    <th>Katalog-Nr.</th>
                    <th>Aktueller Preis</th>
                </tr>
                @foreach ($records as $record)
                    <tr>
                        <td>{{ $record->kind }}</td>
                        <td><a href="{{ route('records.show', ['record' => $record->id]) }}">{{ $record->title }}</a>
                        </td>
                        <td><a
                                href="{{ route('labels.show', ['label' => $record->label_id]) }}">{{ $record->label->name }}</a>
                        </td>
                        <td>{{ $record->grading_cover }}</td>
                        <td>{{ $record->grading_media }}</td>
                        <td>{{ $record->catalog_number }}</td>
                        <td>{{ $record->current_price }} €</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>
@endsection
