@extends('layout.app')
@section('title', ' - Create Record')
@section('content')
    <div class="container">
        <div class="wrapper flex" id="recordCreate">
            <div class="card" id="recordCreate">
                <div class="card-header">{{ __('Records') }}</div>
                <form action="{{ route('records.store') }}" method="post" class="Record" enctype="multipart/form-data">
                    @csrf
                    <p>
                        <input class="form-check-input" type="radio" name="kind" id="Radios1" value="LP"
                            @if (old('kind') != 'CD') checked @endif>
                        <label class="form-check-label" for="Radios1">
                            LP
                        </label><br>
                        <input class="form-check-input" type="radio" name="kind" id="Radios2" value="CD"
                            @if (old('kind') == 'CD') checked @endif>
                        <label class="form-check-label" for="Radios2">
                            CD
                        </label>
                    </p>
                    {{-- <p></p>
                    <p></p>
                    <p>
                        <input type="file" name="file[]" multiple />
                    </p> --}}
                    <p></p>
                    <p></p>
                    <p>
                        <label for="title">Künstler</label>
                        @error('artist_name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input type="text" name="artist_name" id="artist_name"
                            class="form-control @error('artist_name') border border-danger @enderror" placeholder="Künstler"
                            autofocus="" value="{{ old('artist_name') }}">
                        <input type="hidden" name="artist_id" id="artist_id" value="{{ old('artist_id') }}">
                    </p>
                    <p>
                        <label for="title">Titel</label>
                        @error('title')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') border border-danger @enderror" placeholder="Titel"
                            autofocus="" value="{{ old('title') }}">
                        <input type="hidden">
                    </p>
                    <p>
                        <label for="label_name">Label</label>
                        @error('label_name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                        <input type="text" name="label_name" id="label_name"
                            class="form-control @error('label_name') border border-danger @enderror" placeholder="Label"
                            autofocus="" value="{{ old('label_name') }}">
                        <input type="hidden" name="label_id" id="label_id" value="{{ old('label_id') }}">
                    </p>
                    <p>
                        <label for="barcode">Barcode</label>
                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode"
                            autofocus="" value="{{ old('barcode') }}">
                        <input type="hidden">
                    </p>
                    <p>
                        <label for="catalog_number">Katalog-Nr.</label>
                        <input type="text" name="catalog_number" id="catalog_number" class="form-control"
                            placeholder="Katalog-Nr." autofocus="" value="{{ old('catalog_number') }}">
                        <input type="hidden">
                    </p>
                    <p>
                        <label for="matrix_number">Matrix-Nr.</label>
                        <input type="text" name="matrix_number" id="matrix_number" class="form-control"
                            placeholder="Matrix-Nr." autofocus="" value="{{ old('matrix_number') }}">
                        <input type="hidden">
                    </p>
                    <p>
                        <label for="archive_number">Archive-Nummer</label>
                        <input type="text" name="archive_number" id="archive_number" class="form-control"
                            placeholder="Archive-Nummer" autofocus="" value="{{ old('archive_number') }}">
                        <input type="hidden">
                    </p>
                    <p></p>
                    <p></p>
                    <p>
                        <label for="country">Herkunftsland</label>
                        <input type="text" name="country_name" id="country_name" class="form-control"
                            placeholder="Herkunftsland" autofocus="" value="{{ old('country_name') }}">
                        <input type="hidden" name="country_id" id="country_id" value="{{ old('country_id') }}">
                    </p>
                    <p>
                        <label for="release_date">Veröffentlichungsdat.</label>
                        <input type="text" name="release_date" id="release_date" class="form-control"
                            placeholder="Veröffentlichungsdat." autofocus="" value="{{ old('release_date') }}">
                        <input type="hidden">
                    </p>
                    <p>
                        <label for="reissue_date">Datum Neuauflage</label>
                        <input type="text" name="reissue_date" id="reissue_date" class="form-control"
                            placeholder="Datum Neuauflage" autofocus="" value="{{ old('reissue_date') }}">
                        <input type="hidden">
                    </p>
                    <p>
                        <label for="grading_media">Grading</label><br>
                        <select name="grading_media" class="custom-select">
                            <option value="" @if (old('grading_media') == '') selected @endif>Grading Media</option>
                            <option value="100" @if (old('grading_media') == '100') selected @endif>100% - GER: M- / US: NM
                            </option>
                            <option value="85" @if (old('grading_media') == '85') selected @endif>85% - GER: M-- / US: NM
                            </option>
                            <option value="70" @if (old('grading_media') == '70') selected @endif>70% - GER: VG++ / US: VG+
                            </option>
                            <option value="50" @if (old('grading_media') == '50') selected @endif>50% - GER: VG+ / US: VG+
                            </option>
                            <option value="35" @if (old('grading_media') == '35') selected @endif>35% - GER: VG / US: VG
                            </option>
                            <option value="25" @if (old('grading_media') == '25') selected @endif>25% - GER: VG- / US: VG
                            </option>
                            <option value="15" @if (old('grading_media') == '15') selected @endif>15% - GER: VG-- / US: VG-
                            </option>
                            <option value="10" @if (old('grading_media') == '10') selected @endif>10% - GER: G+ / US: VG-
                            </option>
                            <option value="5" @if (old('grading_media') == '5') selected @endif>5% - GER G / US: G
                            </option>
                        </select><br>
                        <select name="grading_cover" class="custom-select">
                            <option value="" @if (old('grading_cover') == '') selected @endif>Grading Cover</option>
                            <option value="100" @if (old('grading_cover') == '100') selected @endif>100% - GER: M- / US: NM
                            </option>
                            <option value="85" @if (old('grading_cover') == '85') selected @endif>85% - GER: M-- / US: NM
                            </option>
                            <option value="70" @if (old('grading_cover') == '70') selected @endif>70% - GER: VG++ / US: VG+
                            </option>
                            <option value="50" @if (old('grading_cover') == '50') selected @endif>50% - GER: VG+ / US: VG+
                            </option>
                            <option value="35" @if (old('grading_cover') == '35') selected @endif>35% - GER: VG / US: VG
                            </option>
                            <option value="25" @if (old('grading_cover') == '25') selected @endif>25% - GER: VG- / US: VG
                            </option>
                            <option value="15" @if (old('grading_cover') == '15') selected @endif>15% - GER: VG-- / US: VG-
                            </option>
                            <option value="10" @if (old('grading_cover') == '10') selected @endif>10% - GER: G+ / US: VG-
                            </option>
                            <option value="5" @if (old('grading_cover') == '5') selected @endif>5% - GER G / US: G
                            </option>
                        </select>
                    </p>
                    <p>
                        <label for="current_price">Aktueller Preis €</label>
                        @error('current_price')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                        <input type="text" name="current_price" id="current_price" class="form-control @error('current_price') border border-danger @enderror"
                            placeholder="Aktueller Preis €" autofocus="" value="{{ old('current_price') }}">
                        <input type="hidden">
                    </p>
                    <p>
                        <label for="platform">Anbieter</label>
                        @error('platform')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                        <input type="text" name="platform" id="platform" class="form-control @error('platform') border border-danger @enderror"
                            placeholder="Anbieter" autofocus="" value="{{ old('platform') }}">
                        <input type="hidden" name="platform_id" id="platform_id" value="{{ old('platform_id') }}">
                    </p>
                    <p></p>
                    <p>
                        <label for="buy_price">Kaufpreis €</label>
                        <input type="text" name="buy_price" id="buy_price" class="form-control" placeholder="Kaufpreis €"
                            autofocus="" value="{{ old('buy_price') }}">
                        <input type="hidden">
                    </p>

                    <p class="full-width">
                        <textarea class="form-control" name="note" id="note" placeholder="Beschreibung" autofocus=""
                            rows="3">{{ old('note') }}</textarea>
                    </p>

                    <button style="min-width:70px; max-width:90px" type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
