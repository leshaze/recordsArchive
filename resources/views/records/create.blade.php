@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Records') }}</div>
                    <form  action="{{ route('record.store') }}" method="post">
                        @csrf
                        <div class="row g-3">
                        <div class="col-md-12">
                            <input class="form-check-input" type="radio" name="kind" id="Radios1" value="LP" checked>
                            <label class="form-check-label" for="Radios1">
                                LP
                            </label>
                            <input class="form-check-input" type="radio" name="kind" id="Radios2" value="CD">
                            <label class="form-check-label" for="Radios2">
                                CD
                            </label>
                        </div>
                        <div class="col-md-4">
                            <label for="title">Künstler</label>
                            <input type="text" name="artist_name" id="artist_name" class="form-control  @error('artist_name') border-red-500 @enderror"
                                placeholder="Künstler" required="" autofocus="">
                            <input type="hidden" name="artist_id" id="artist_id" value="">
                            @error('username')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4 ">
                            <label for="title">Titel</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Titel"
                                required="" autofocus="">
                            <input type="hidden">
                        </div>
                        <div class="col-md-4">
                            <label for="label_name">Label</label>
                            <input type="text" name="label_name" id="label_name" class="form-control" placeholder="Label"
                                required="" autofocus="">
                            <input type="hidden" name="label_id" id="label_id" value="">
                        </div>
                        <div class="col-md-3">
                            <label for="barcode">Barcode</label>
                            <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode"
                                autofocus="">
                            <input type="hidden">
                        </div>
                        <div class="col-md-3">
                            <label for="catalog_number">Katalog-Nr.</label>
                            <input type="text" name="catalog_number" id="catalog_number" class="form-control"
                                placeholder="Katalog-Nr." autofocus="">
                            <input type="hidden">
                        </div>
                        <div class="col-md-3">
                            <label for="matrix_number">Matrix-Nr.</label>
                            <input type="text" name="matrix_number" id="matrix_number" class="form-control"
                                placeholder="Matrix-Nr." autofocus="">
                            <input type="hidden">
                        </div>
                        <div class="col-md-3">
                            <label for="country">Herkunftsland</label>
                            <input type="text" name="country_name" id="country_name" class="form-control"
                                placeholder="Herkunftsland" autofocus="">
                            <input type="hidden" name="country_id" id="country_id" value="">
                        </div>
                        <div class="col-md-3">
                            <label for="release_date">Veröffentlichungsdat.</label>
                            <input type="text" name="release_date" id="release_date" class="form-control"
                                placeholder="Veröffentlichungsdat." autofocus="">
                            <input type="hidden">
                        </div>
                        <div class="col-md-3 ">
                            <label for="reissue_date">Datum Neuauflage</label>
                            <input type="text" name="reissue_date" id="reissue_date" class="form-control"
                                placeholder="Datum Neuauflage" autofocus="">
                            <input type="hidden">
                        </div>
                        <div class="col-md-3 form-label-group">
                            <br>
                            <select name="grading_media" class="custom-select">
                                <option selected>Grading Media</option>
                                <option value="100">100% - GER: M- / US: NM</option>
                                <option value="85">85% - GER: M-- / US: NM</option>
                                <option value="70">70% - GER: VG++ / US: VG+</option>
                                <option value="50">50% - GER: VG+ / US: VG+</option>
                                <option value="35">35% - GER: VG / US: VG</option>
                                <option value="25">25% - GER: VG- / US: VG</option>
                                <option value="15">15% - GER: VG-- / US: VG-</option>
                                <option value="10">10% - GER: G+ / US: VG-</option>
                                <option value="5">5% - GER G / US: G</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-label-group"><br>
                            <select name="grading_cover" class="custom-select">
                                <option selected>Grading Cover</option>
                                <option value="100">100% - GER: M- / US: NM</option>
                                <option value="85">85% - GER: M-- / US: NM</option>
                                <option value="70">70% - GER: VG++ / US: VG+</option>
                                <option value="50">50% - GER: VG+ / US: VG+</option>
                                <option value="35">35% - GER: VG / US: VG</option>
                                <option value="25">25% - GER: VG- / US: VG</option>
                                <option value="15">15% - GER: VG-- / US: VG-</option>
                                <option value="10">10% - GER: G+ / US: VG-</option>
                                <option value="5">5% - GER G / US: G</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-label-group">
                            <label for="current_price">Aktueller Preis €</label>
                            <input type="text" name="current_price" id="current_price" class="form-control"
                                placeholder="Aktueller Preis €" autofocus="">
                            <input type="hidden">

                        </div>
                        <div class="col-md-3 form-label-group">
                            <label for="buy_price">Kaufpreis €</label>
                            <input type="text" name="buy_price" id="buy_price" class="form-control"
                                placeholder="Kaufpreis €" autofocus="">
                            <input type="hidden">

                        </div>
                        <div class="col-md-3 form-label-group">
                            <label for="archive_number">Archive-Nummer</label>
                            <input type="text" name="archive_number" id="archive_number" class="form-control"
                                placeholder="Archive-Nummer" autofocus="">
                            <input type="hidden">

                        </div>
                        <div class="col-6 form-label-group">
                            <textarea class="form-control" name="note" id="note" placeholder="Beschreibung" autofocus=""
                                rows="3"></textarea>
                        </div>
                        </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
