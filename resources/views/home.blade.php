@extends('layouts.app')

@section('title')
    <title>{{ __('lang.home') }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- // mostramos mensaje --}}
                @include('includes.message')
                {{-- // mustro los artículos --}}
                @foreach ($publishedArticles as $publishedArticle)
                    @include('includes.publishedArticle', ['publishedArticle' => $publishedArticle])
                @endforeach
                {{-- // añadimos enlaces de paginacion --}}
                {{-- IMPORTANTE CLASS CLEARFIX para limpiar los flotados --}}
                <div class="clearfix"></div>
                <div class="row justify-content-center">
                    {{ $publishedArticles->links() }}
                </div>

            </div>

        </div>
    </div>
@endsection

