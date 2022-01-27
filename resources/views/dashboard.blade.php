@extends('layout.app')
@section('title',' - Dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="font-weight-normal">                      
                        @auth
                        @if($count)
                            Aktuelle Einträge: <b>{{ $count }}</b><br>
                            Aktuelle Summe aller Einträge: <b>{{ $total_value }} €</b><br>
                            Aktuelle Anzahl von CDs: <b>{{ $count_cd }}</b><br>
                            Aktuelle Anzahl von LPs: <b>{{ $count_lp }}</b><br>
                            Aktuelle Anzahl von Künstlern: <b>{{ $count_artist }}</b><br>
                            Aktuelle Anzahl von Labeln: <b>{{ $count_label }}</b>  
                        @else 
                        There is no data yet.
                        @endif 
                        @endauth
                        
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
