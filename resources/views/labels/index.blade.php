@extends('layout.app')
@section('title', '- Labels')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="card-header">{{ __('Labels') }}</div>

                <div class="card-body">
                    @foreach ($labels as $label)
                        <a href="{{ route('labels.show', ['label' => $label->id]) }}" >{{ $label->name }} </a><br>
                    @endforeach
                </div>

            </div>
            {{ $labels->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection