@extends('layouts.main')
@section('title','Records Index')
@section('content')
<br><h2 class="offset-sm-1">Übersicht</h2>
  <div class="row">
    <div class="col-sm-12">
      @if(!empty($records) && $records->count())
      <table class="table small">
        <tr>
          {{-- <th>ID</th> --}}
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
        @foreach($records as $record)
          <tr>
            {{-- <td>{{ $record->id }}</td> --}}
            <td>{{ $record->kind }}</td>
            <td><a href="{{route('artist.show',['id'=>$record->artist_id])}}"> {{ $record->artist->name }} </a></td>
            <td>{{ $record->title }}</td>
            <td>@if($record->label_id)
              <a href="{{route('label.show',['id'=>$record->label_id])}}">{{ $record->label->name}}</a>  @endif
            </td>
            <td>@if($record->grading_cover){{ $record->grading_cover }} @endif</td>
            <td>@if($record->grading_media){{ $record->grading_media }} @endif</td>
            <td>@if($record->catalog_number){{ $record->catalog_number }} @endif</td>
            <td>@if($record->matrix_number){{ $record->matrix_number }} @endif</td>
            <td>@if($record->archive_number){{ $record->archive_number }} @endif</td>
            <td>@if($record->barcode){{ $record->barcode }} @endif</td>
            <td>@if($record->current_price){{ $record->current_price }} € @endif</td>
            <td>@if($record->release_date){{ $record->release_date }} @endif</td>
            <td>@if($record->country_id){{ $record->country->name }} @endif</td>
            <td><a href="{{route('record.edit',['id'=>$record->id])}}" class = "btn btn-info btn-sm"><i class="icon-fixed-width icon-pencil"></i></a>
            <td><a href="{{route('record.destroy',['id'=>$record->id])}}" class = "btn btn-danger btn-sm" onclick="return confirm('Delete {{ $record->artist->name }} - {{ $record->title }}?')"><i class="icon-fixed-width icon-trash"></a></td>
          </tr>
        @endforeach
      </table>
      @else
        There is no data yet.
      @endif
    </div>
  </div>
@endsection