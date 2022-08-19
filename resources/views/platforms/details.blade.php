@extends('layout.app')
@section('title', '- Detail Platform')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="card-header justify-content-between align-items-center d-flex">
                    <div> {{ $platform->name }}<a
                        href="{{ route('platforms.edit', ['platform' => $platform->id]) }}" class="btn btn-sm"><i
                            class="bi bi-pencil-square"></i></a>
                            <a href="javascript:document.getElementById('delete-platform-form').submit();"
                                class="btn btn-sm" onclick="return confirm('Delete {{ $platform->name }}?')"><i class="bi bi-trash"></i></a>
                            <form id="delete-label-form"
                                action="{{ route('platforms.destroy', ['platform' => $platform->id]) }}" method="post"
                                style="display: none;">
                                @method('DELETE')
                                {{ csrf_field() }}
                            </form></td></div>
                
                </div>
                {{ $platform->name}} - {{ $platform->url}}
            </div>

        </div>
    </div>
@endsection
