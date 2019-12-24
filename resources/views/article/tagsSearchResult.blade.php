@extends('layouts.app')

@section('title')
    <title>Resultados de la búsqueda</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h3>Artículos coincidentes con la búsqueda: "{{ $search }}"</h3>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Ver</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <th scope="row">{{ $article->title }}</th>
                        <td> <?php
                            /** @var TYPE_NAME $article */
                            $string = $article->keywords;
                            $str_arr = explode (";", $string);
                            echo '<ul>';
                            echo '<li>' . implode( '</li><li>', $str_arr) . '</li>';
                            echo '</ul>';
                            ?></td>
                        <td>
                            <a href="{{ route('article.detail', ['id' => $article->id]) }}" class="btn btn-sm btn-warning">Revisar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{-- // añadimos enlaces de paginacion --}}
        </div>
        <div class="row justify-content-center">
{{--            {{ $articles->links() }}--}}
        </div>

    </div>

{{--    </div>--}}

{{--    </div>--}}

{{--    </div>--}}
@endsection
