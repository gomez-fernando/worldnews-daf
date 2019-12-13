@extends('layouts.app')

@section('title')
    <title>Editar artículo</title>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar artículo no publicado
                    </div>
                    <div class="card-body">
                        <form action="{{ route('article.editInProcessInReview') }}" method="POST" id="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $article->id }}" name="id" id="" />
{{--                            <input type="hidden" value="{{ $article->author }}" name="author" id="" />--}}

                            <div class="form-group row">
                                <label for="author_readonly" class="col-md-3 col-form-label text-md-right">Autor</label>
                                <div class="col-md-8">
                                    <input readonly value="{{ $article->user->name .' '. $article->user->surname }}" type="text" id="author_readonly" name="" class="form-control" required>
                                </div>
                                {{--                                <input type="hidden" value="{{ $article->user->id }}">--}}

                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">Título</label>
                                <div class="col-md-8">
                                    <input type="text" value="{{ $article->title }}" id="title" name="title" class="form-control" required autofocus>

                                    {{-- // si se produce un error en la validacion hay una variable siponivble que es errors --}}
                                    @if ($errors->has('title'))
                                        <span class="alert-danger" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                    </span>

                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sub_title" class="col-md-3 col-form-label text-md-right">Subtítulo</label>
                                <div class="col-md-8">
                                    <input type="text" value="{{ $article->sub_title }}" id="sub_title" name="sub_title" class="form-control" required autofocus>

                                    {{-- // si se produce un error en la validacion hay una variable siponivble que es errors --}}
                                    @if ($errors->has('sub_title'))
                                        <span class="alert-danger" role="alert">
                                    <strong>{{ $errors->first('sub_title') }}</strong>
                                    </span>

                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="created_at" class="col-md-3 col-form-label text-md-right">Creado</label>
                                <div class="col-md-8">
                                    <input readonly value="{{ $article->created_at }}" type="text" id="created_at" name="created_at" class="form-control" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="published_at" class="col-md-3 col-form-label text-md-right">Publicado</label>
                                <div class="col-md-8">
                                    <input readonly value="{{ $article->published_at }}" type="text" id="published_at" name="published_at" class="form-control" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="section" class="col-md-3 col-form-label text-md-right">Sección</label>
                                <div class="col-md-8">
                                    <select  type="select" id="section" name="section" class="form-control" required autofocus>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}"
                                                    @if ($section->id == $article->section_id)
                                                    selected
                                                @endif
                                            >{{ $section->name }}</option>
                                        @endforeach
                                    </select>

                                    {{-- // si se produce un error en la validacion hay una variable siponivble que es errors --}}
                                    @if ($errors->has('section'))
                                        <span class="alert-danger" role="alert">
                                    <strong>{{ $errors->first('section') }}</strong>
                                    </span>

                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10 offset-md-1">
                                    <img class="preview-img" src="{{ route('article.file', ['filename' => $article->image_path]) }}" class="avatar" alt="">
                                </div>
                            </div>

                            {{--                            <input type="hidden" value="{{ $article->image_path }}" name="original_image_path" id="" />--}}

                            <div class="form-group row">
                                <label for="image_path" class="col-md-3 col-form-label text-md-right">Cambiar imagen</label>
                                <div class="col-md-8">
                                    {{--                                    <input type="file" value="{{ $article->image_path }}" id="image_path" name="image_path" class="form-control  {{ $errors->has('image_path') ? 'is-invalid' : '' }}" required/>--}}
                                    <input type="file" id="image_path" name="image_path" class="form-control  {{ $errors->has('image_path') ? 'is-invalid' : '' }}" value="{{ old('text') }}" />

                                    {{-- // si se produce un error en la validacion hay una variable siponivble que es errors --}}
                                    @if ($errors->has('image_path'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>

                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="keywords" class="col-md-3 col-form-label text-md-right">Tags</label>
                                <div class="col-md-8">
                                    <input type="text" value="{{ $article->keywords }}" id="keywords" name="keywords" class="form-control" required autofocus>

                                    {{-- // si se produce un error en la validacion hay una variable siponivble que es errors --}}
                                    @if ($errors->has('keywords'))
                                        <span class="alert-danger" role="alert">
                                    <strong>{{ $errors->first('keywords') }}</strong>
                                    </span>

                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slug" class="col-md-3 col-form-label text-md-right">Slug</label>
                                <div class="col-md-8">
                                    <input type="text" value="{{ $article->slug }}" id="slug" name="slug" class="form-control" required autofocus>

                                    {{-- // si se produce un error en la validacion hay una variable siponivble que es errors --}}
                                    @if ($errors->has('slug'))
                                        <span class="alert-danger" role="alert">
                                    <strong>{{ $errors->first('slug') }}</strong>
                                    </span>

                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-3 col-form-label text-md-right">Texto</label>
                                <div class="col-md-8">
                                    <textarea id="text" name="text" class="form-control" required autofocus>{{ $article->text }}</textarea>

                                    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                                    <script>
                                        CKEDITOR.replace( 'text' );
                                    </script>

                                    {{-- // si se produce un error en la validacion hay una variable siponivble que es errors --}}
                                    @if ($errors->has('text'))
                                        <span class="alert-danger" role="alert">
                                    <strong>{{ $errors->first('text') }}</strong>
                                    </span>

                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state" class="col-md-3 col-form-label text-md-right">Estado</label>
                                <div class="col-md-8">
                                    <input type="text" readonly value="{{ $article->state }}" id="state" name="state" class="form-control" required>

                                    {{-- // si se produce un error en la validacion hay una variable siponivble que es errors --}}
                                    @if ($errors->has('state'))
                                        <span class="alert-danger" role="alert">
                                    <strong>{{ $errors->first('state') }}</strong>
                                    </span>

                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="editor_comments" class="col-md-3 col-form-label text-md-right">Comentarios del editor</label>
                                <div class="col-md-8">
                                    <textarea @if (Auth::user() && Auth::user()->usertype != 'editor')
                                              readonly
                                              @endif id="editor_comments" name="editor_comments" class="form-control">{{$article->editor_comments }}</textarea>

                                    {{-- // si se produce un error en la validacion hay una variable siponivble que es errors --}}
                                    @if ($errors->has('editor_comments'))
                                        <span class="alert-danger" role="alert">
                                    <strong>{{ $errors->first('editor_comments') }}</strong>
                                    </span>

                                    @endif
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-3">
                                        <input type="submit" name="submitState" id="guardarYSalir" value="Guardar y salir" class="btn btn-primary"  />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-3">
                                        <input type="submit" name="submitState" id="enviarARevision" value="Enviar a revisión" class="btn btn-primary" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection



