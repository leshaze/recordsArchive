@extends('layout.app')
@section('title', '- Detail Label')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="card-header justify-content-between align-items-center d-flex">
                    <div> {{ $label->name }} <a
                        href="{{ route('labels.edit', ['label' => $label->id]) }}" class="btn btn-sm"><i
                            class="bi bi-pencil-square"></i></a>
                            <a href="javascript:document.getElementById('delete-label-form').submit();"
                                class="btn btn-sm" onclick="return confirm('Delete {{ $label->name }}?')"><i class="bi bi-trash"></i></a>
                            <form id="delete-label-form"
                                action="{{ route('labels.destroy', ['label' => $label->id]) }}" method="post"
                                style="display: none;">
                                @method('DELETE')
                                {{ csrf_field() }}
                            </form></td></div>
                <div><a class="btn btn-info btn-sm" href="{{ route('labels.print', ['label' => $label->id]) }}") ">Export</a></div>
                </div>
                {{-- <div>
                    @foreach ($images as $image)
                        <img src="{{ URL::asset('storage/' . $image->path) }}" width="100px" height="100px"
                            alt="{{ $image->name }}">
                    @endforeach
                </div> --}}
                <table class="table small xs">
                    <tr>
                        <th>Kind</th>
                        <th>Title</th>
                        <th>Artist</th>
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
                                    href="{{ route('artists.show', ['artist' => $record->artist_id]) }}">{{ $record->artist->name }}</a>
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
