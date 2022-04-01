@extends('layout.app')
@section('title','- Print Label')
@section('content')
<br><h2 class="offset-sm-1">{{$label->name}} - {{ $total_value }} €</h2>
  <div class="row">
    <div class="col-sm-12">
            @if(!empty($records) && $records->count())
            @if($label->description) <p>{{$label->description}}<p> @endif
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
                    <td>{{ $record->label->name}}</td>
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
            </div>
  </div>
@endsection