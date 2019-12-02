@extends('layouts.app')

@section('title')
    <title>Panel de control</title>
@endsection

@section('content')
    <div class="container">
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
                            <a href="{{ route('article.edit', ['id' => $inProcessArticle->id]) }}" class="btn btn-sm btn-warning">Revisar</a>
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
                            <a href="{{ route('article.edit', ['id' => $commentedArticle->id]) }}" class="btn btn-sm btn-warning">Revisar</a>
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
