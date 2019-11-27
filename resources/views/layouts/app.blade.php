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

    <!-- favicoon -->
    <link rel="shortout icon" type="image/png" href="{{ asset('../img/favicon.ico') }}">

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
                                    {{ __('lang.login') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('register') }}">
                                    {{ __('lang.register') }}
                                </a>


                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">{{ __('lang.home') }}</a>
                        </li>
                    @if (Auth::user() && Auth::user()->usertype != 'editor')
                        <li class="nav-item">
                            <a href="{{ route('article.create') }}" class="nav-link">{{ __('lang.create_article') }}</a>
                        </li>
                    @endif

                    @if (Auth::user() && Auth::user()->usertype == 'editor')
                        <li class="nav-item">
                            <a href="{{ route('editor.authorize-publications') }}" class="nav-link">{{ __('lang.authorize_publications') }}</a>
                        </li>
                    @endif

                    @if (Auth::user() && Auth::user()->usertype == 'journalist')
                        <li class="nav-item">
                            <a href="{{ route('journalist.controlPanelView') }}" class="nav-link">{{ __('lang.control_panel') }}</a>
                        </li>
                    @endif


                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="icon-profile"></i>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                <a class="dropdown-item" href="{{ route('config') }}">
                                    {{ __('lang.profile') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('lang.logout') }}
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
                    <a href="https://sites.google.com/fp.uoc.edu/grupo-jadf/presentaci%C3%B3n-del-proyecto" target="_blank">Grupo DAF 2019</a>
                    |
                    <a href="https://sites.google.com/fp.uoc.edu/grupo-jadf/presentaci%C3%B3n-del-proyecto" target="_blank">Github</a>
                    | Todos los derechos reservados
                </div>
                <div class="col-12 col-md-6 social">
                    <a href="#"><i class="icon-ig"></i></a>
                    <a href="#"><i class="icon-tw"></i></a>
                    <a href="#"><i class="icon-pi"></i></a>
                    <a href="#"><i class="icon-sh"></i></a>
                </div>
            </div>
        </div>
    </footer>


</div>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

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
        $('.nav-item:nth-child('+n+')').find('.nav-link').addClass('selected');
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
        var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

        // Convert the hours component to 12-hour format if needed
        currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

        // Convert an hours component of "0" to "12"
        currentHours = ( currentHours == 0 ) ? 12 : currentHours;

        // Compose the string for display
        var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
        
        
        $("#current-time").html(currentTimeString);        
     }
</script>

</body>
</html>
