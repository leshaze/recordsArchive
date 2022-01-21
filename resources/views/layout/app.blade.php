<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md fixed-top navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'recordsArchive') }} <i class="bi bi-file-music-fill"></i>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                        @auth
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="{{ route('record.create') }}">Add record</a> --}}
                                <a class="nav-link" href="#">Add record</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Records</a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('records')}}" class="dropdown-item">All Records</a>
                                    <a href="#" class="dropdown-item">Trash</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Artists</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">All Artists</a>
                                    <a href="#" class="dropdown-item">Add new Artist</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Labels</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">All Label</a>
                                    <a href="#" class="dropdown-item">Add new Label</a>
                                </div>
                            </li>
                        </ul>
                        @endauth                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                         @guest 
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth 
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 my-5">
            @yield('content')
        </main>
    </div>
    <!-- Footer -->
    <footer class="bg-white text-center text-lg-start fixed-bottom">
        <!-- Copyright -->
        <div class="text-center p-3">
            © 2022 Copyright
        </div>
        <!-- Copyright -->
    </footer>

    <script type="text/javascript">
        // A $( document ).ready() block.
        $(document).ready(function() {

            $('#search').autocomplete({
                source: function(request, response) {
                    $.getJSON('/record/api/search?term=' + request.term, function(data) {
                        var array = $.map(data, function(row) {
                            return {
                                label: row.name,
                                artist_id: row.id
                            }
                        })
                        response($.ui.autocomplete.filter(array, request.term));
                    })
                },
                minLength: 1,
                delay: 200,
                select: function(event, ui) {
                    window.location.href = '/record/search?term=' + ui.item.label;
                }
            });

            $('#artist_name').autocomplete({
                source: function(request, response) {
                    $.getJSON('/record/api/artist?term=' + request.term, function(data) {
                        var array = $.map(data, function(row) {
                            return {
                                label: row.name,
                                artist_id: row.id
                            }
                        })
                        response($.ui.autocomplete.filter(array, request.term));
                    })
                },
                minLength: 1,
                delay: 200,
                select: function(event, ui) {
                    $('#artist_id').val(ui.item.artist_id)
                },
                change: function(event, ui) {
                    if (ui.item == null) {
                        $('#artist_id').val("")
                    }
                }
            });

            $('#label_name').autocomplete({
                source: function(request, response) {
                    $.getJSON('/record/api/label?term=' + request.term, function(data) {
                        var array = $.map(data, function(row) {
                            return {
                                label: row.name,
                                label_id: row.id
                            }
                        })
                        response($.ui.autocomplete.filter(array, request.term));
                    })
                },
                minLength: 1,
                delay: 200,
                select: function(event, ui) {
                    $('#label_id').val(ui.item.label_id)
                },
                change: function(event, ui) {
                    if (ui.item == null) {
                        $('#label_id').val("")
                    }
                }
            });

            $('#title').autocomplete({
                source: function(request, response) {
                    $.getJSON('/record/api/title?term=' + request.term + '_' + document.getElementById(
                        'artist_id').value, function(data) {
                        var array = $.map(data, function(row) {
                            return {
                                label: row.title + ' - Archiv.Nr.:' + row
                                    .archive_number,
                                value: row.title
                            }
                        })
                        response($.ui.autocomplete.filter(array, request.term));
                    })
                },
                minLength: 1,
                delay: 200,
                select: function(event, ui) {
                    $('#title').val(ui.item.name)
                },
                change: function(event, ui) {
                    if (ui.item == null) {

                    }
                }
            });

            $('#country_name').autocomplete({
                source: function(request, response) {
                    $.getJSON('/record/api/country?term=' + request.term, function(data) {
                        var array = $.map(data, function(row) {
                            return {
                                label: row.name,
                                artist_id: row.id
                            }
                        })
                        response($.ui.autocomplete.filter(array, request.term));
                    })
                },
                minLength: 1,
                delay: 200,
                select: function(event, ui) {
                    $('#country_id').val(ui.item.artist_id)
                },
                change: function(event, ui) {
                    if (ui.item == null) {
                        $('#country_id').val("")
                    }
                }
            });

        });
    </script>
</body>

</html>
