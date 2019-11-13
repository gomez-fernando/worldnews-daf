<div class="card pub_image">
    <div class="card-header">

        <div class="data-user">
            <a href="{{ route('article.detail', ['id' => $publishedArticle->id]) }}">
                {{ $publishedArticle->title}}
            </a>
        </div>

    </div>

    <div class="card-body">
        <div class="image-container">
            <img src="{{ route('article.file', ['filename' => $publishedArticle->image_path]) }}" alt="imagen del articlee">
        </div>

        <div class="description">
            <a href="{{ route('article.detail', ['id' => $publishedArticle->id]) }}">
                {{ $publishedArticle->title}}
            </a>
        </div>

        <div class="description">

            <p>
                {{ $publishedArticle->text }}
            </p>
        </div>

    </div>
</div>



