@extends('layout.app')
@section('title', '- Edit Platform')
@section('content')
    <div class="container">
        <div class="wrapper flex" id="labelEdit">
            <div class="card" id="labelEdit">
                <div class="card-header">{{ __('Edit Label') }}</div>
                <form action="{{ route('platforms.update', ['platform' => $platform->id]) }}" method="post" class="Platform"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <p>
                        <label for="platform">Anbieter</label>
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input type="text" name="platform" id="platform"
                            class="form-control  @error('name') border border-danger @enderror" placeholder="Anbieter"
                            autofocus="" value="{{ $platform->name }}">
                        <input type="hidden" name="platform_id" id="platform_id" value="{{ $platform->id }}">
                    </p>
                    <p>
                        <label for="url">URL</label>
                        @error('url')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                        <input type="text" name="url" id="url"
                            class="form-control  @error('url') border border-danger @enderror" placeholder="URL"
                            autofocus="" value="{{ $platform->url }}">
                    </p>
                    <p></p>
                    <button style="min-width:70px; max-width:90px" type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
