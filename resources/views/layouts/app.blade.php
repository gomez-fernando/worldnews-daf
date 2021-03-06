<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

@yield('title')

<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/altaArticulos.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Libraries CSS Files -->
    <link href="{{asset('../lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('../lib/animate-css/animate.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ asset('css/styles-01.css') }}" rel="stylesheet">

    <!-- favicoon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md header-01">
        <div class="container">

            <div class="row w-100 m-auto">
                <!-- Left Side Of Navbar -->
                <div class="col-6 a">
                    <div class="pt-2 pb-2 pl-1 pr-1">
                        <?php echo date("d M Y");?> | <span id="current-time"></span>
                    </div>
                </div>

                <!-- Right Side Of Navbar -->
                <div class="col-6 b">
                    <!-- Authentication Links -->
                    @guest
                      <ul>
                        <li class="nav-item dropdown float-right">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle pt-2 pb-2 pl-1 pr-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="icon-cms"></i><span class="sm-hidden">Gestor de Contenidos</span>  <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">



                                <a class="dropdown-item" href="{{ route('login') }}">
                                    Iniciar sesión
                                </a>

                                <a class="dropdown-item" href="{{ route('register') }}">
                                    Registrarse
                                </a>


                            </div>
                        </li>
                      </ul>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">Inicio</a>
                        </li>
                    @if (Auth::user() && Auth::user()->usertype != 'editor')
                        <li class="nav-item">
                            <a href="{{ route('article.create') }}" class="nav-link">Crear artículo</a>
                        </li>
                    @endif

                    @if (Auth::user() && Auth::user()->usertype == 'editor')
                        <li class="nav-item">
                            <a href="{{ route('editor.controlPanelView') }}" class="nav-link">Panel de control</a>
                        </li>
                    @endif

                    @if (Auth::user() && Auth::user()->usertype == 'journalist')
                        <li class="nav-item">
                            <a href="{{ route('journalist.controlPanelView') }}" class="nav-link">Panel de control</a>
                        </li>
                    @endif

                    @if (Auth::user() && Auth::user()->usertype == 'admin')
                        <li class="nav-item">
                            <a href="{{ route('admin.controlPanelView') }}" class="nav-link">Panel de control</a>
                        </li>
                    @endif


                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <i class="icon-profile"></i>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                <a class="dropdown-item" href="{{ route('config') }}">
                                    Mi perfil
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-md header-02">
        <div class="container">
            <h1 class="fz-0">Worldnews, web de noticias</h1>
            <a class="navbar-brand" title="Logotipo de la web" href="{{ url('/') }}"><span class="fz-0">Worldnews</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            {{--                    formulario del buscador de tags--}}
            <form method="get" action="{{ route('article.tagsSearchResult') }}" id="tagsSearch">
                <input type="text" id="search" name="search" class="form-control" required>
                <label for="search">Buscar</label>
                <input type="submit" value="Buscar">
            </form>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    @if(isset($sections))
                        @foreach ($sections as $section)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home', ['section_id' =>$section->id]) }}">{{ $section->name }}</a>
                            </li>
                        @endforeach
                    @endif

                </ul>
            </div>
        </div>
    </nav>


    <main class="news-list">
        @yield('content')
    </main>

    <!--==========================
Footer
============================-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 copyright">
                    <a href="https://gomez-fernando.github.io/portfolio/" target="_blank">Fernando Gómez Web &copy; 2019</a>
                    |
                    <a href="https://www.linkedin.com/in/gomez-fernando" target="_blank">LinkedIn</a>
                    |
                    <a href="https://github.com/FernandoDavidGomezOrtega/worldnews-daf" target="_blank">Github</a>
                </div>
                <div class="col-12 col-md-6 social">
                    <a target="_blank" title="Enlace a instagram" href="http://www.instagram.com"><i class="icon-ig"></i><span class="fz-0">Instagram</span></a>
                    <a target="_blank" title="Enlace a twitter" href="http://www.twitter.com"><i class="icon-tw"></i><span class="fz-0">Twitter</span></a>
                    <a target="_blank" title="Enlace a pinterest" href="http://www.pinterest.com"><i class="icon-pi"></i><span class="fz-0">Pinterest</span></a>
                    <a target="_blank" title="Enlace a facebook" href="http://www.facebook.com"><i class="icon-sh"></i><span class="fz-0">Facebook</span></a>
                </div>
            </div>
        </div>
    </footer>


</div>
<a class="back-to-top"><i class="fa fa-chevron-up"></i><span class="fz-0">Volver arriba</span></a>

  <!-- JS FontAwesome -->
  <script src="https://kit.fontawesome.com/a2e8d0339c.js"></script>

<!-- Required JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


{{-- <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script> --}}
<script src="{{ asset('lib/easing/easing.js') }}"></script>

<script>
    // Resaltar enlace de la categoría seleccionada
    if(window.location.href.indexOf("/home/") > -1) {
        url = window.location.href;
        n = url.substr(url.length - 1);
        $('.header-02 .nav-item:nth-child('+n+')').find('.nav-link').addClass('selected');
        // Title con el nombre de la categoria
        title = $('.header-02 .nav-link.selected').text();
        document.title=title;
    }
    //
    setInterval('updateClock()', 1000);

    function updateClock (){
        var currentTime = new Date ( );
        var currentHours = currentTime.getHours ( );
        var currentMinutes = currentTime.getMinutes ( );
        var currentSeconds = currentTime.getSeconds ( );

        // Pad the minutes and seconds with leading zeros, if required
        currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
        currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

        // Choose either "AM" or "PM" as appropriate
        var timeOfDay = ( currentHours < 12 ) ? " AM" : " PM";

        // Convert the hours component to 12-hour format if needed
        currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

        // Convert an hours component of "0" to "12"
        currentHours = ( currentHours == 0 ) ? 12 : currentHours;

        // Compose the string for display
        var currentTimeString = currentHours + ":" + currentMinutes + timeOfDay;


        $("#current-time").html(currentTimeString);
     }
</script>

</body>
</html>
