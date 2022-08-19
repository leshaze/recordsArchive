@extends('layout.app')
@section('title', '- Records')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="card table-responsive">
                <div class="card-header">{{ __('Records') }}</div>
                @if (!empty($records) && $records->count())
                    <table class="table small">
                        <tr>
                            <th>Kind</th>
                            <th>Künstler</th>
                            <th>Title</th>
                            <th>Label</th>
                            <th>Cover</th>
                            <th>Media</th>
                            <th>Katalog-Nr.</th>
                            <th>Matrix-Nr.</th>
                            <th>Archiv-Nr.</th>
                            <th>Barcode</th>
                            <th>Aktueller Preis</th>
                            <th>Erscheinungsjahr</th>
                            <th>Herkunftsland</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($records as $record)
                            <tr
                                @if ($record->sold) style="background-color:
                                #d3d3d3; text-decoration: line-through;"
                            @elseif ($record->lost) style="background-color: #800080; text-decoration:
                                line-through; " @endif>
                                <td>{{ $record->kind }}</td>
                                <td><a href="{{ route('artists.show', ['artist' => $record->artist_id]) }}">
                                        {{ $record->artist->name }} </a></td>
                                <td><a
                                        href="{{ route('records.show', ['record' => $record->id]) }}">{{ $record->title }}</a>
                                </td>
                                <td>
                                    @if ($record->label_id)
                                        <a
                                            href="{{ route('labels.show', ['label' => $record->label_id]) }}">{{ $record->label->name }}</a>
                                    @endif
                                </td>
                                <td>
                                    @if ($record->grading_cover)
                                        {{ $record->grading_cover }}
                                    @endif
                                </td>
                                <td>
                                    @if ($record->grading_media)
                                        {{ $record->grading_media }}
                                    @endif
                                </td>
                                <td>
                                    @if ($record->catalog_number)
                                        {{ $record->catalog_number }}
                                    @endif
                                </td>
                                <td>
                                    @if ($record->matrix_number)
                                        {{ $record->matrix_number }}
                                    @endif
                                </td>
                                <td>
                                    @if ($record->archive_number)
                                        {{ $record->archive_number }}
                                    @endif
                                </td>
                                <td>
                                    @if ($record->barcode)
                                        {{ $record->barcode }}
                                    @endif
                                </td>
                                <td>
                                    @if ($record->current_price)
                                        {{ $record->current_price }} €
                                    @endif
                                </td>
                                <td>
                                    @if ($record->release_date)
                                        {{ $record->release_date }}
                                    @endif
                                </td>
                                <td>
                                    @if ($record->country_id)
                                        {{ $record->country->name }}
                                    @endif
                                </td>
                                <td><a href="{{ route('records.edit', ['record' => $record->id]) }}"
                                        class="btn btn-sm">
                                        <i class="bi bi-pencil-square"></i></a>
                                </td>
                                <td>
                                    <a href="javascript:document.getElementById('delete-record-form{{$record->id}}').submit();"
                                        class="btn btn-sm" onclick="return confirm('Delete {{ $record->artist->name }} - {{ $record->title }}?')"><i class="bi bi-trash"></i></a>
                                    <form id="delete-record-form{{$record->id}}"
                                        action="{{ route('records.destroy', ['record' => $record->id]) }}" method="post"
                                        style="display: none;">
                                        @method('DELETE')
                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    There is no data yet.
                @endif
            </div>
            {{ $records->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
