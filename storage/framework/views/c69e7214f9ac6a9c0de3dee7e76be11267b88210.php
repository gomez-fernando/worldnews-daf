<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<?php echo $__env->yieldContent('title'); ?>

<!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/altaArticulos.js')); ?>"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Libraries CSS Files -->
    <link href="<?php echo e(asset('../lib/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('../lib/animate-css/animate.min.css')); ?>" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/styles-01.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/styles-02.css')); ?>" rel="stylesheet">

    <!-- favicoon -->
    <link rel="shortout icon" type="image/png" href="<?php echo e(asset('../img/favicon.ico')); ?>">

    

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
                    <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item dropdown float-right">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle pt-2 pb-2 pl-1 pr-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                 <i class="icon-cms"></i><span class="sm-hidden">Gestor de Contenidos</span>  <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">



                                <a class="dropdown-item" href="<?php echo e(route('login')); ?>">
                                    Iniciar sesión
                                </a>

                                <a class="dropdown-item" href="<?php echo e(route('register')); ?>">
                                    Registrarse
                                </a>


                            </div>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('home')); ?>" class="nav-link">Inicio</a>
                        </li>
                    <?php if(Auth::user() && Auth::user()->usertype != 'editor'): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('article.create')); ?>" class="nav-link">Crear artículo</a>
                        </li>
                    <?php endif; ?>

                    <?php if(Auth::user() && Auth::user()->usertype == 'editor'): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('editor.controlPanelView')); ?>" class="nav-link">Panel de control</a>
                        </li>
                    <?php endif; ?>

                    <?php if(Auth::user() && Auth::user()->usertype == 'journalist'): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('journalist.controlPanelView')); ?>" class="nav-link">Panel de control</a>
                        </li>
                    <?php endif; ?>

                    <?php if(Auth::user() && Auth::user()->usertype == 'admin'): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.controlPanelView')); ?>" class="nav-link">Panel de control</a>
                        </li>
                    <?php endif; ?>


                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <i class="icon-profile"></i>
                                <?php echo e(Auth::user()->username); ?> <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                <a class="dropdown-item" href="<?php echo e(route('config')); ?>">
                                    Mi perfil
                                </a>

                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Cerrar sesión
                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>

                            </div>
                        </li>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-md header-02">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            
            <form method="get" action="<?php echo e(route('article.tagsSearchResult')); ?>" id="tagsSearch">
                <input type="text" id="search" class="form-control" required>
                <input type="submit" value="Buscar">
            </form>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <?php if(isset($sections)): ?>
                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('home', ['section_id' =>$section->id])); ?>"><?php echo e($section->name); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>


    <main class="news-list">
        <?php echo $__env->yieldContent('content'); ?>
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


<script src="<?php echo e(asset('lib/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/superfish/hoverIntent.js')); ?>"></script>
<script src="<?php echo e(asset('lib/superfish/superfish.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/morphext/morphext.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/wow/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/stickyjs/sticky.js')); ?>"></script>
<script src="<?php echo e(asset('lib/easing/easing.js')); ?>"></script>

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
