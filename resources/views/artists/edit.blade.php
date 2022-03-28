@extends('layout.app')
@section('title', '- Edit Artist')
@section('content')
    <div class="container">
        <div class="wrapper flex" id="artistEdit">
            <div class="card" id="artistEdit">
                <div class="card-header">{{ __('Edit Artist') }}</div>
                <form action="{{ route('artists.update', ['artist' => $artist->id]) }}" method="post"
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
                        <input type="text" name="artist_name" id="artist_name"
                            class="form-control  @error('name') border border-danger @enderror" placeholder="Künstler"
                            autofocus="" value="{{ $artist->name }}">
                        <input type="hidden" name="id" id="id" value="{{ $artist->id }}">
                    </p>
                    {{-- <p></p>
                    <p></p>
                    @empty($images)
                        <p>
                            @foreach ($images as $image)
                                <img src="{{ URL::asset('storage/' . $image->path) }}" width="100px" height="100px"
                                    alt="{{ $image->name }}">
                            @endforeach

                        </p>
                        <p></p>
                        <p></p>
                    @endempty
                    <p>
                    <input type="file" name="file[]" multiple />
                    </p> --}}
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
