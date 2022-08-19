<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title') </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
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
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('records.create') }}">Add record</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Records</a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('records.index') }}" class="dropdown-item">All Records</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('artists.index') }}" class="dropdown-item">All Artists</a>
                                    <a href="{{ route('artists.create') }}" class="dropdown-item">Add new Artist</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('labels.index') }}" class="dropdown-item">All Label</a>
                                    <a href="{{ route('labels.create') }}" class="dropdown-item">Add new Label</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('platforms.index') }}" class="dropdown-item">All Platforms</a>
                                    <a href="{{ route('platforms.create') }}" class="dropdown-item">Add new Platform</a>
                                </div>
                            </li>
                        </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        
                            {{-- @if (Route::has('login.index'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login.index') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register.index'))
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('register.index') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                            <!--  Searchbar -->
                            {{-- <li>
                                <input class="form-control" type="text" id="search" placeholder="Search">
                            </li> --}}
                            {{-- 
                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} - {{ AUTH::user()->role->name }} 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout.index') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li> --}}
                   </ul>
                </div>
            </div>
        </nav>
        <main class="py-4 my-5">
            @if (\Session::has('info'))
                <div class="alert alert-success"> {!! \Session::get('info') !!} </div>
            @endif
            @if (\Session::has('warning'))
                <div class="alert alert-warning"> {!! \Session::get('warning') !!} </div>
            @endif
            @if (\Session::has('error'))
                <div class="alert alert-danger"> {!! \Session::get('error') !!} </div>
            @endif
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
        // window.onload = function() {
        //     if (window.$) {
        //         // jQuery is loaded  
        //         console.log("jQuery has loaded!");
        //     } else {
        //         // jQuery is not loaded
        //         console.log("jQuery has not loaded!");
        //     }
        // }

        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#sold').click(function() {

                $('#sold_to').toggle();
                $('#sold_price').toggle();
                $('#sold_date').toggle();
                $('#sold_to_label').toggle();
                $('#sold_price_label').toggle();
                $('#sold_date_label').toggle();
            });


            $('a[name="image_delete"]').click(function() {
                console.log($.name);
            });

            // $('#search').autocomplete({
            //     source: function(request, response) {
            //         $.getJSON('{{ route('autocomplete') }}' + '/?search=main&term='+ request.term, 
            //         function(data) {
            //             var array = $.map(data, function(row) {
            //                 return {
            //                     title: row.name,
            //                     id: row.id
            //                 }
            //             })
            //             response($.ui.autocomplete.filter(array, request.term));
            //         })
            //     },
            //     minLength: 1,
            //     delay: 200,
            //     select: function(event, ui) {
            //         //window.location.href = '{{ route('records.edit', ['record' => 'ui.item.record_id']) }}';
            //         window.location.href = '/record/search?term='+ui.item.label;
            //     }
            // });

            $('#artist_name').autocomplete({
                source: function(request, response) {
                    $.getJSON('{{ route('autocomplete') }}' + '/?search=artist&term=' + request.term,
                        function(data) {
                            var array = $.map(data, function(row) {
                                return {
                                    label: row.name,
                                    artist_id: row.id
                                }

                            })
                            response($.ui.autocomplete.filter(array, request.term));
                        });
                },
                minLength: 1,
                delay: 200,
                select: function(event, ui) {
                    $('#artist_id').val(ui.item.artist_id);
                },
                change: function(event, ui) {
                    if (ui.item == null) {
                        $('#artist_id').val("")
                    }
                }
            });

            $('#label_name').autocomplete({
                source: function(request, response) {
                    $.getJSON('{{ route('autocomplete') }}' + '/?search=label&term=' + request.term,
                        function(data) {
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
                    $.getJSON('{{ route('autocomplete') }}' + '/?search=title&term=' + request.term +
                        '_' + document.getElementById(
                            'artist_id').value,
                        function(data) {

                            var array = $.map(data, function(row) {
                                if (row.archive_number) {
                                    return {
                                        label: row.title + ' - Archiv.Nr.:' + row
                                            .archive_number,
                                        value: row.title
                                    }
                                } else {
                                    return {
                                        label: row.title,
                                        value: row.title
                                    }

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
                    $.getJSON('{{ route('autocomplete') }}' + '/?search=country&term=' + request
                        .term,
                        function(data) {
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

            $('#platform').autocomplete({
                source: function(request, response) {
                    $.getJSON('{{ route('autocomplete') }}' + '/?search=platform&term=' + request.term,
                        function(data) {
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
                    $('#platform_id').val(ui.item.label_id)
                },
                change: function(event, ui) {
                    if (ui.item == null) {
                        $('#platform_id').val("")
                    }
                }
            });

        });
    </script>
</body>

</html>
