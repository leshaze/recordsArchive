@extends('layout.app')
@section('title', '- Create Artist')
@section('content')
    <div class="container">
        <div class="wrapper flex" id="artistCreate">
            <div class="card" id="artistCreate">
                <div class="card-header">{{ __('Create Artist') }}</div>
                <form action="{{ route('artists.store') }}" method="post" class="Artist" enctype="multipart/form-data">
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
                            autofocus="" value="{{ old('name') }}">
                    </p>     
                    {{-- <p></p>               
                    <p></p>
                    <p>
                        <input type="file" name="file[]" multiple />
                    </p> --}}
                    <p></p>
                    <p class="full-width">
                        <textarea class="form-control" name="description" id="description" placeholder="Beschreibung"
                            autofocus="" rows="3">{{ old('note') }}</textarea>
                    </p>

                    <button style="min-width:70px; max-width:90px" type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
