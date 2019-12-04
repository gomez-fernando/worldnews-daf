@extends('layouts.app')

@section('title')
    <title>Panel de control</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{-- // mostramos mensaje --}}
                @include('includes.message')
            </div>
        </div>
        <div class="row">


            <h3>Noticias pendientes de publicar</h3>
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
                            <a href="{{ route('editor.publishView', ['id' => $inReviewArticle->id]) }}" class="btn btn-sm btn-warning">Revisar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <hr>


        <div class="row">
            <h3>Noticias para republicar</h3>
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
                            <a href="{{ route('editor.re-publish', ['id' => $inReviewPublishedArticle->id]) }}" class="btn btn-sm btn-warning">Revisar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    </div>

    </div>
@endsection
