@extends('layouts.app')

@section('title')
    <title>{{ __('lang.home') }}</title>
@endsection

@section('content')

    <div class="container">
        {{-- // mostramos mensaje --}}
        @include('includes.message')
        <div class="row" news_list>


            {{-- // mustro los artículos --}}
            @foreach ($publishedArticles as $publishedArticle)
                @include('includes.publishedArticle', ['publishedArticle' => $publishedArticle])
            @endforeach
            {{-- // añadimos enlaces de paginacion --}}            

        </div>
        <div class="row justify-content-center">
                {{ $publishedArticles->links() }}
            </div>
    </div>

    <script>
        $('[news_list]>div:first-child').toggleClass('col-md-6').find('.box').addClass('strong').find('.col-4').removeAttr('class');
        $('[news_list] .strong').find('.col-8').toggleClass('txt col-12 col-md-8');
    </script>

@endsection

