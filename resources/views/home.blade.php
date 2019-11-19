@extends('layouts.app')

@section('title')
    <title>{{ __('lang.home') }}</title>
@endsection

@section('content')

    <div class="container">
        {{-- // mostramos mensaje --}}
        @include('includes.message')
        <div class="row">


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

