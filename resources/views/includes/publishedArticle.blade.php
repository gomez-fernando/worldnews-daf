<div class="col-12 col-md-6">
    <div class="box">
        <div class="row">
            <div class="col-4">
                <figure>
                    <img src="{{ route('article.file', ['filename' => $publishedArticle->image_path]) }}" alt="{{$publishedArticle->title}}">
                </figure>
            </div>
            <div class="col-8">
                <div class="date">
                    <?php /** @var TYPE_NAME $publishedArticle */
                    echo date("d M y | g:i a",strtotime($publishedArticle->published_at));?>
                </div>
                <h3 class="title">
                <a href="{{ route('article.detail', ['id' => $publishedArticle->id]) }}">
                    {{$publishedArticle->title}}
                </a>
                </h3>
                <div class="subtitle">
                    {{$publishedArticle->sub_title}}
                </div>
                <div class="summary">
                    {{$publishedArticle->text}}
                </div>
                <div class="link">
                    <a href="{{ route('article.detail', ['id' => $publishedArticle->id]) }}" class="btn" title="Leer la noticia completa">Leer m&aacute;s <i></i></a>
                </div>
            </div>
        </div>
    </div>
</div>



