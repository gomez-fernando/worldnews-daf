<div class="col-12 col-md-6">
    <div class="box">
        <div class="row">
            <div class="col-4">
                <figure>
                    <img src="<?php echo e(route('article.file', ['filename' => $publishedArticle->image_path])); ?>" alt="imagen del articulo">
                </figure>
            </div>
            <div class="col-8">
                <div class="date">
                    <?php echo date("d M y | g:i a",strtotime($publishedArticle->published_at));?>
                </div>
                <h3 class="title">
                <a href="<?php echo e(route('article.detail', ['id' => $publishedArticle->id])); ?>">
                    <?php echo e($publishedArticle->title); ?>

                </a>
                </h3>
                <div class="subtitle">
                    <?php echo e($publishedArticle->sub_title); ?>

                </div>
                <div class="summary">
                    <?php echo e($publishedArticle->text); ?>

                </div>
                <div class="link">
                    <a href="<?php echo e(route('article.detail', ['id' => $publishedArticle->id])); ?>" class="btn">Leer m&aacute;s <i></i></a>
                </div>
            </div>
        </div>
    </div>
</div>



