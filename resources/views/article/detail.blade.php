@extends('layouts.app')

@section('title')
    <title>Noticia</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-12 col-md-9">
                {{-- // mostramos mensaje --}}
                @include('includes.message')

                <div class="news-item">
                        <div class="item-date">
                            Publicado: <?php echo date("d M y, g:i a",strtotime($publishedArticle->published_at));?>
                        </div>
                        <h2 class="item-title">

                            {{ $publishedArticle->title}}

                        @if ((Auth::user() && Auth::user()->usertype != 'journalist')  || (Auth::user() && Auth::user()->id == $publishedArticle->author))
                                <div class="actions ml-auto">
                                    <a href="{{ route('article.editPublishedView', ['id' => $publishedArticle->id]) }}" class="btn btn-sm btn-warning">Actualizar</a>
                                </div>

                            @endif

{{--{{ Auth::user()->usertype  }}--}}

                                    @if (\Auth::user() && \Auth::user()->usertype == 'admin')
{{--                                        {{ Auth::user()->usertype  }}--}}
                                    <!-- Button to Open the Modal -->
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">
                                            Borrar
                                        </button>

                                        <!-- The Modal -->
                                        <div class="modal" id="myModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Confirmación necesaria</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        ¿Quieres eliminar este artículo?
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <a href="{{ route('article.delete', ['id' => $publishedArticle->id]) }}" class="btn btn-danger">Eliminar artículo</a>
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        @endif

                        </h2>

                        <div class="item-subtitle">
                            {{ $publishedArticle->sub_title}}
                        </div>

                        <div class="item-author">
                            Autor{{' : ' . $publishedArticle->user->name.' '.$publishedArticle->user->surname }}
                        </div>

                        <div class="item-keywords">

                            <?php
                                $string = $publishedArticle->keywords;
                                $str_arr = explode (";", $string);
                                echo '<ul>';
                                echo '<li>' . implode( '</li><li>', $str_arr) . '</li>';
                                echo '</ul>';
                            ?>



                        </div>

                        <div class="row">
                            <div class="col-12">
                                <figure>
                                    <img src="{{ route('article.file', ['filename' => $publishedArticle->image_path]) }}" alt="Imagen de la noticia">
                                </figure>
                            </div>
                            <div class="col-12 item-content">
{{--                                {{ $publishedArticle->text }}--}}
                                <?php
                                echo $publishedArticle->text;
                                ?>
                            </div>
                        </div>







                    </div>

                        <div class="clearfix"></div>


            </div>



<div class="col-12 col-md-3 news-list side">
    {{-- ULTIMOS 6 ARTICULOS --}}
        @foreach ($last6articles as $article)
        <div class="box">
            <div class="date">
                <?php echo date("d M y | g:i a",strtotime($article->published_at));?>
            </div>
            <h3 class="title">
            <a href="{{ route('article.detail', ['id' => $article->id]) }}">
                {{ $article->title}}
            </a>
            </h3>
            <div class="subtitle">
                {{ $article->sub_title}}
            </div>
            <div class="link">
                <a href="{{ route('article.detail', ['id' => $article->id]) }}" class="btn">Leer m&aacute;s <i></i></a>
            </div>
        </div>

        @endforeach
    {{-- --}}
</div>

        </div>

    </div>


<script>
// Eliminar noticia duplicada
var a=$.trim($('h2.item-title').text());
$('h3.title a').each(function(){
    if ($.trim($(this).text())==a) {
        $(this).parents('.box').remove();   
    }
})
</script>


@endsection
