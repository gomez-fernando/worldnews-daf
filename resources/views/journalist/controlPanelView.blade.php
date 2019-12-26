@extends('layouts.app')

@section('title')
    <title>Panel de control</title>
@endsection

@section('content')
    <div class="container">
        {{-- // mostramos mensaje --}}
        @include('includes.message')
        <div class="row">
            <h3>Noticias en proceso de redacción</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Revisar</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($inProcessArticles as $inProcessArticle)
                    <tr>
                        <th scope="row">{{ $inProcessArticle->title }}</th>
                        <td>{{ $inProcessArticle->created_at }}</td>
                        <td>
                            <a href="{{ route('article.editInProcessInReviewView', ['id' => $inProcessArticle->id]) }}" class="btn btn-sm btn-warning">Revisar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <hr>


        <div class="row">
            <h3>Noticias comentadas y devueltas por el editor</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Revisar</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($commentedArticles as $commentedArticle)
                    <tr>
                        <th scope="row">{{ $commentedArticle->title }}</th>
                        <td>{{ $commentedArticle->created_at }}</td>
                        <td>
                            <a href="{{ route('article.editInProcessInReviewView', ['id' => $commentedArticle->id]) }}" class="btn btn-sm btn-warning">Revisar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <hr>

        <div class="row">
            <h3>Noticias en revisión</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Revisar</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($inReviewArticles as $inReviewArticle)
                    <tr>
                        <th scope="row">{{ $inReviewArticle->title }}</th>
                        <td>{{ $inReviewArticle->created_at }}</td>
                        <td>
                            <a href="{{ route('article.editInProcessInReviewView', ['id' => $inReviewArticle->id]) }}" class="btn btn-sm btn-warning">Revisar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <h3>Noticias en revisión para republicar</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Revisar</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($inReviewPublishedArticles as $inReviewPublishedArticle)
                    <tr>
                        <th scope="row">{{ $inReviewPublishedArticle->title }}</th>
                        <td>{{ $inReviewPublishedArticle->created_at }}</td>
                        <td>
                            <a href="{{ route('article.editInReviewForRepublishingView', ['id' => $inReviewPublishedArticle->id]) }}" class="btn btn-sm btn-warning">Revisar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
