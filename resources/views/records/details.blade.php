@extends('layout.app')
@section('title', '- Detail Record')
@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="card">
                <div class="card-header">{{ $record->title }} <a href="{{ route('records.edit', ['record' => $record->id]) }}"
                        class="btn btn-sm"><i class="bi bi-pencil-square"></i></a> <a
                        href="javascript:document.getElementById('delete-record-form').submit();" class="btn btn-sm"><i
                            class="bi bi-trash"
                            onclick="return confirm('Delete {{ $record->artist->name }} - {{ $record->title }}?')"></i></a>
                    <form id="delete-record-form" action="{{ route('records.destroy', ['record' => $record->id]) }}"
                        method="post" style="display: none;">
                        @method('DELETE')
                        {{ csrf_field() }}
                    </form>
                </div>
                <div class="Record">
                    <p>
                        <input class="form-check-input" type="radio" name="kind" id="Radios1" value="LP"
                            @if ($record->kind == 'LP') checked @endif>
                        <label class="form-check-label" for="Radios1">
                            LP
                        </label><br>
                        <input class="form-check-input" type="radio" name="kind" id="Radios2" value="CD"
                            @if ($record->kind == 'CD') checked @endif>
                        <label class="form-check-label" for="Radios2">
                            CD
                        </label>
                    </p>
                    <p>
                        @if ($record->sold)
                            <input class="form-check-input" type="checkbox" id="sold" name="sold" checked>
                            <label for="sold">Verkauft</label><br>
                        @endif
                        @if ($record->lost)
                            <input class="form-check-input" type="checkbox" id="lost" name="lost" checked>
                            <label for="lost">Verloren</label><br>
                        @endif
                    </p>
                    <p></p>
                    <div class="d-flex flex-row Recorddetails">
                        <div class="p-2" style="width:120px">
                            <p>
                                <label for="title">Künstler</label>
                                @error('artist_name')120px
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <br><a href="{{ route('artists.show', ['artist' => $record->artist_id]) }}">
                                    {{ $record->artist->name }}</a>
                            </p>
                        </div>
                        <div class="p-2" style="width:120px">
                            <p>
                                <label for="title">Titel</label>
                                @error('title')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <br><a href="{{ route('records.show', ['record' => $record->id]) }}">
                                    {{ $record->title }}</a>
                            </p>
                        </div>
                        <div class="p-2" style="width:120px">
                            <p>
                                <label for="label_name">Label</label>
                                @error('label_name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <br><a href="{{ route('labels.show', ['label' => $record->label_id]) }}">
                                    {{ $record->label->name }}</a>

                            </p>
                        </div>
                    </div>
                    <div class="d-flex flex-row Recorddetails">
                        <div class="p-2" style="width:120px">
                            <p>
                                <label for="title">Katalog-Nr.</label>
                                @error('catalog_number')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <br>{{ $record->catalog_number }}
                            </p>
                        </div>
                        <div class="p-2" style="width:120px">
                            <p>
                                <label for="title">Matrix-Nr.</label>
                                @error('matrix_number')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <br>{{ $record->matrix_number }}
                            </p>
                        </div>
                        <div class="p-2" style="width:120px">
                            <p>
                                <label for="label_name">Archive-Nr.</label>
                                @error('archive_number')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <br>{{ $record->archive_number }}
                            </p>
                        </div>
                    </div>
                    <p>
                        <label for="current_price">Aktueller Preis</label>
                        {{ $record->current_price }} €
                    </p>
                    <p></p>
                    <p></p>
                    <p>
                        <label for="price_history">Preisentwicklung</label><br>
                        <canvas id="myChart"></canvas>
                    </p>
                    <p><br><br>
                        @foreach ($prices as $price)
                            {{ date('d.m.Y', strtotime($price->created_at)) }} - {{ $price->price }} € @if ($price->platform)
                                - {{ $price->platform->name }}
                            @endif
                            <br>
                        @endforeach
                    </p>
                    <p></p>

                </div>

                {{-- <ul>
                    @foreach ($images as $image)
                        <li>
                            <a href="#bild{{ $loop->count }}"><img src="{{ URL::asset('storage/' . $image->path) }}"
                                    width="80px" height="80px" alt="{{ $image->name }}"></a>
                        </li>
                    @endforeach
                </ul>
                <ul class="#lightbox">
                    @foreach ($images as $image)
                        <li id ="bild{{ $loop->count }}">
                            <a href="#"><img src="{{ URL::asset('storage/' . $image->path) }}"
                                    width="250px" height="250px" alt="{{ $image->name }}"></a>
                        </li>
                    @endforeach
                </ul> --}}
            </div>
        </div>
    </div>
    <script>
        const labels = [
            @foreach ($prices as $price)
                "{{ date('d.m.y', strtotime($price->created_at)) }}",
            @endforeach
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: '',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [
                    @foreach ($prices as $price)
                        {{ $price->price }},
                    @endforeach
                ]

            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endsection
