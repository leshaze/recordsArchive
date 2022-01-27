@extends('layout.app')
@section('title','Create Label')
@section('content')
<br><h2 class="offset-sm-1">Create Label</h2>
<div class="row mt-2">
  <div class="col-sm-4 offset-sm-1">
      <form action="{{route('label.store')}}" method = "post">
        @csrf
        <div class="form-label-group">
          <input type="text" name="name" id="name"  class="form-control" placeholder="" autofocus="" value="">
          <label for="archive_number">Label</label>
        </div>
        <div class="col-sm-4form-row">
          <div class="form-label-group">
            <textarea class="form-control" name="description" id="description" placeholder="Beschreibung" autofocus="" rows="4"></textarea>
          </div>
        </div>
        <button type = "submit" class = "btn btn-success">Submit</button>
      </form>
    </div>
  </div>
@endsection