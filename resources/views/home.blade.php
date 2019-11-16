@extends('layouts.app')

@section('title')
    <title>{{ __('lang.home') }}</title>
@endsection

@section('content')
    <div class="container">
        <div class="row col-md-6 justify-content-center">

            {{-- // mostramos mensaje --}}
            @include('includes.message')
            {{-- // mustro los artículos --}}
            @foreach ($publishedArticles as $publishedArticle)
                @include('includes.publishedArticle', ['publishedArticle' => $publishedArticle])
            @endforeach
            {{-- // añadimos enlaces de paginacion --}}
            <div class="clearfix"></div>
            <div class="row justify-content-center">
                {{ $publishedArticles->links() }}
            </div>

        </div>
    </div>
@endsection

