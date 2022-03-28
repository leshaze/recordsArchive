@extends('layout.app')
@section('title', '- Edit Label')
@section('content')
    <div class="container">
        <div class="wrapper flex" id="labelEdit">
            <div class="card" id="labelEdit">
                <div class="card-header">{{ __('Edit Label') }}</div>
                <form action="{{ route('labels.update', ['label' => $label->id]) }}" method="post" class="Label">
                    @method('PUT')
                    @csrf
                    <p>
                        <label for="title">Label</label>
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input type="text" name="label_name" id="label_pname"
                            class="form-control  @error('name') border border-danger @enderror" placeholder="Label"
                            autofocus="" value="{{ $label->name }}">
                        <input type="hidden" name="id" id="id" value="{{ $label->id }}">
                    </p>
                    {{-- <p></p>
                    <p></p>
                    <p>
                    <div>
                        @foreach ($images as $image)
                            <img src="{{ URL::asset('storage/' . $image->path) }}" width="100px" height="100px"
                                alt="{{ $image->name }}">
                        @endforeach
                    </div>
                    </p>
                    <p></p>
                    <p></p>
                    <br><input type="file" name="file[]" multiple />
                    </p> --}}
                    <p></p>
                    <p class="full-width">
                        <textarea class="form-control" name="description" id="description" placeholder="Beschreibung" autofocus=""
                            rows="3">{{ $label->description }}</textarea>
                    </p>

                    <button style="min-width:70px; max-width:90px" type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
