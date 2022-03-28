@extends('layout.app')
@section('title', '- Create Label')
@section('content')
    <div class="container">
        <div class="wrapper flex" id="labelCreate">
            <div class="card" id="labelCreate">
                <div class="card-header">{{ __('Create Label') }}</div>
                <form action="{{ route('labels.store') }}" method="post" class="Label" enctype="multipart/form-data">
                    @csrf
                    <p>
                        <label for="title">Label</label>
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input type="text" name="label_name" id="label_name"
                            class="form-control  @error('name') border border-danger @enderror" placeholder="Label"
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
