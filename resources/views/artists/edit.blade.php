@extends('layout.main')
@section('title','Edit Artist')
@section('content')
<br><h2 class="offset-sm-1">Edit Artist</h2>
<div class="row mt-2">
  <div class="col-sm-4 offset-sm-1">
      <form action="{{route('artist.update')}}" method = "post">
        @csrf
        <div class="form-label-group">
          <input type="text" name="name" id="name"  class="form-control" placeholder="" autofocus="" value="{{$artist->name}}">
          <label for="archive_number">Artist</label>
        </div>
      <div class="col-sm-4form-row">
        <div class="form-label-group">
          <textarea class="form-control" name="description" id="description" placeholder="Beschreibung" autofocus="" rows="4">{{$artist->description}}</textarea>
        </div>
      </div>
        <input type="hidden" name="id" value = "{{$artist->id}}">
        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection