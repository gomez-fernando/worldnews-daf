@extends('layouts.app')

@section('title')
    <title>publicar...página a eliminar posiblemente</title>
@endsection

@section('content')
    <div class="container">
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
                @foreach ($articles as $article)
                    <tr>
                        <th scope="row">{{ $article->title }}</th>
                        <td>{{ $article->created_at }}</td>
                        <td>
                            <a href="{{ route('editor.review-publish-article', ['id' => $article->id]) }}" class="btn btn-sm btn-warning">{{ __('lang.review') }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

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
                @foreach ($articles as $article)
                    <tr>
                        <th scope="row">{{ $article->title }}</th>
                        <td>{{ $article->created_at }}</td>
                        <td>
                            <a href="{{ route('editor.review-publish-article', ['id' => $article->id]) }}" class="btn btn-sm btn-warning">{{ __('lang.review') }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

@endsection
