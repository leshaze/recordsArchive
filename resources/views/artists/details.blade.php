@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Artists') }}</div>

                <div class="card-body">
                    @if(!empty($records) && $records->count())
                    @if($artist->description) <p>{{$artist->description}}<p> @endif
                    <table class=" small table">
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
                        </tr>
                        @foreach($records as $record)
                          <tr>
                            <td>{{ $record->kind }}</td>
                            <td>{{ $record->artist->name }}</td>
                            <td>{{ $record->title }}</td>
                            <td>@if($record->label_id) <a href="{{route('label.show',['id'=>$record->label_id])}}">{{ $record->label->name}}</a> @endif</td>
                            <td>{{ $record->grading_cover}}</td>
                            <td>{{ $record->grading_media}}</td>
                            <td>{{ $record->catalog_number}}</td>
                            <td>{{ $record->matrix_number}}</td>
                            <td>{{ $record->archive_number}}</td>
                            <td>{{ $record->barcode}}</td>
                            <td>@if($record->current_price) {{ $record->current_price}} € @endif</td>
                            <td>{{ $record->release_date}}</td>
                            <td>{{ $record->country->name}}</td>
                          </tr>
                        @endforeach
                      </table>
                      @else
                        There is no data yet.
                      @endif
                      {!! $records->links() !!}</div>
            </div>
        </div>
    </div>
</div>
@endsection