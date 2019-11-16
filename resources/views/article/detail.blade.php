@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                {{-- // mostramos mensaje --}}
                @include('includes.message')

                <div class="card pub_image pub_image_detail">
                    <div class="card-header">

                        <div class="data-user">
                                {{ $publishedArticle->title}}

                                    <div class="actions ml-auto">
                                        <a href="{{ route('article.edit', ['id' => $publishedArticle->id]) }}" class="btn btn-sm btn-warning">Actualizar</a>
                                    {{-- <a href="{{ route('article.delete', ['id' => $publishedArticle->id]) }}" class="btn btn-sm btn-light">Borrar</a> --}}

                                    @if (Auth::user() && Auth::user()->usertype == 'admin')

                                    <!-- Button to Open the Modal -->
                                        <button type="button" class="btn btn-sm btn-light" data-toggle="modal" data-target="#myModal">
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

                                    </div>
                        </div>



                    </div>

                    <div class="card-body">
                        <div class="image-container image-detail">
                            <img src="{{ route('article.file', ['filename' => $publishedArticle->image_path]) }}" alt="">
                        </div>

                        <div class="description">
                            {{ __('lang.author').' : ' . $publishedArticle->user->name.' '.$publishedArticle->user->surname }}

                            <span class="nickname date">{{ ' | '. __('lang.published_at').' : ' .$publishedArticle->published_at }}</span>

                            <div class="description article_title">
                                    {{ $publishedArticle->title}}
                            </div>

                            <div class="description">
                                <p>
                                    {{ $publishedArticle->sub_title}}
                                </p>
                            </div>

                            <div class="description">

                                <p>
                                    {{ $publishedArticle->text }}
                                </p>
                            </div>

                        </div>

                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
