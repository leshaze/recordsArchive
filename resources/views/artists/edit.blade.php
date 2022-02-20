@extends('layout.app')
@section('title', '- Edit Artist')
@section('content')
    <div class="container">
        <div class="wrapper flex" id="artistCreate">
            <div class="card" id="artistCreate">
                <div class="card-header">{{ __('Create Artist') }}</div>
                <form action="{{ route('artists.store', ['artist' => $artist->id]) }}" method="post"
                    class="Artist">
                    @method('PUT')
                    @csrf
                    <p>
                        <label for="title">Künstler</label>
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input type="text" name="name" id="name"
                            class="form-control  @error('name') border border-danger @enderror" placeholder="Künstler"
                            autofocus="" value="{{ $artist->name }}">
                    </p>
                    <p></p>
                    <p></p>
                    <p class="full-width">
                        <textarea class="form-control" name="description" id="description" placeholder="Beschreibung"
                            autofocus="" rows="3">{{ $artist->description }}</textarea>
                    </p>

                    <button style="min-width:70px; max-width:90px" type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
