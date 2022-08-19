@extends('layout.app')
@section('title', '- Create Platform')
@section('content')
    <div class="container">
        <div class="wrapper flex" id="platformCreate">
            <div class="card" id="platformCreate">
                <div class="card-header">{{ __('Create Platform') }}</div>
                <form action="{{ route('platforms.store') }}" method="post" class="Platform" enctype="multipart/form-data">
                    @csrf
                    <p>
                        <label for="platform">Anbieter</label>
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input type="text" name="platform" id="platform"
                            class="form-control  @error('platform') border border-danger @enderror"
                            placeholder="Anbieter" autofocus="" value="{{ old('platform') }}">
                            <input type="hidden" name="platform_id" id="platform_id" value="{{ old('platform_id') }}">
                    </p>
                    <p>
                        <label for="url">URL</label>
                        <input type="text" name="url" id="url"
                            class="form-control  @error('url') border border-danger @enderror" placeholder="URL"
                            autofocus="" value="{{ old('url') }}">
                    </p>
                    <p></p>
                    <button style="min-width:70px; max-width:90px" type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
