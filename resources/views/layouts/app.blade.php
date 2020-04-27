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
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles-01.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles-02.css') }}" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortout icon" type="image/ico" href="{{ asset('img/favicon.ico') }}">

    {{--    CKEditor--}}
{{--    <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>--}}
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
                        <li class="nav-item dropdown float-right">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle pt-2 pb-2 pl-1 pr-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
            <a class="navbar-brand" href="{{ url('/') }}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            {{--                    formulario del buscador de tags--}}
            <form method="get" action="{{ route('article.tagsSearchResult') }}" id="tagsSearch">
                <input type="text" id="search" class="form-control" required>
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
{{-- <a href="#" class="back-to-top mb-3"><i class="fa fa-chevron-up"></i></a> --}}
<a href="#" class="back-to-top"><img src="https://cdn1.iconfinder.com/data/icons/flat-and-simple-part-1/128/arrow_up-512.png" alt=""></a>

<!-- Required JavaScript Libraries -->
{{-- css/app.css --}}

<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lib/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('lib/superfish/hoverIntent.js') }}"></script>
<script src="{{ asset('lib/superfish/superfish.min.js') }}"></script>
<script src="{{ asset('lib/morphext/morphext.min.js') }}"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/stickyjs/sticky.js') }}"></script>
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
