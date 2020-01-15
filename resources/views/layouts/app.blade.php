<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Jelajah Belitung') }}</title> -->
    <title>Jelajah Belitung</title>

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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Jelajah Belitung <!-- {{ config('app.name', 'Jelajah Belitung') }} -->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> -->
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script type="text/javascript">
    var baseURl = "https://www.travel.ykyj.xyz/api"
        function simpan(){
            var data = $('.form-user-tambah').serialize();
            $.ajax({
                type: 'POST',
                url: baseURl+"/kontens",
                data: data,
                success: function() {
                    location.reload(true);
                },
                error: function(req, err){ console.log('my message ' + req); }
            });
        }

        function setText(id, judul, deskripsi, harga, urlphoto) {
            $(".id").val(id);
            $(".judul").val(judul);
            $(".deskripsi").val(deskripsi);
            $(".harga").val(harga);
            $(".urlphoto").val(urlphoto);
        }

        function edit(id){
            var data = $('.form-user-edit').serialize();
            $.ajax({
                type: 'post',
                url: baseURl+"/kontens/" + id + "/edit",
                data: data,
                success: function() {
                    location.reload(true);
                },
                error: function(req, err){ console.log('my message ' + data); }
            });
        }

        function hapus(id) {
            $.ajax({
                type: 'delete',
                url: baseURl+"/kontens/" + id,
                success: function() {
                    location.reload(true);
                }
            });
        }
    </script>
</body>
</html>
