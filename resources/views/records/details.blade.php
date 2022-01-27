@extends('layout.app')
@section('title','Detail Record')
@section('content')
<br><h2 class="offset-sm-1">{{ $record->title }}</h2>
  <div class="row mt-2">
    <div class="col-sm-10 offset-sm-1">
{{ $record->kind }}<br>
<a href="{{route('artists.show',['artist'=>$record->artist_id])}}"> {{ $record->artist->name }}</a><br>
<a href="{{route('labels.show',['label'=>$record->label_id])}}">{{ $record->label->name }}</a><br>
    </div>
</div>
@endsection