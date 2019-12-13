<?php $__env->startSection('title'); ?>
    <title>Noticia</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">


            <div class="col-12 col-md-9">
                
                <?php echo $__env->make('includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="news-item">
                        <div class="item-date">
                            Publicado: <?php echo date("d M y, g:i a",strtotime($publishedArticle->published_at));?>
                        </div>
                        <h2 class="item-title">

                            <?php echo e($publishedArticle->title); ?>


                        <?php if((Auth::user() && Auth::user()->usertype != 'journalist')  || (Auth::user() && Auth::user()->id == $publishedArticle->author)): ?>
                                <div class="actions ml-auto">
                                    <a href="<?php echo e(route('article.editPublishedView', ['id' => $publishedArticle->id])); ?>" class="btn btn-sm btn-warning">Actualizar</a>
                                </div>

                            <?php endif; ?>



                                    <?php if(\Auth::user() && \Auth::user()->usertype == 'admin'): ?>

                                    <!-- Button to Open the Modal -->
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">
                                            Borrar
                                        </button>

                                        <!-- The Modal -->
                                        <div class="modal" id="myModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Confirmación necesaria</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        ¿Quieres eliminar este artículo?
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <a href="<?php echo e(route('article.delete', ['id' => $publishedArticle->id])); ?>" class="btn btn-danger">Eliminar artículo</a>
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <?php endif; ?>

                        </h2>

                        <div class="item-subtitle">
                            <?php echo e($publishedArticle->sub_title); ?>

                        </div>

                        <div class="item-author">
                            Autor<?php echo e(' : ' . $publishedArticle->user->name.' '.$publishedArticle->user->surname); ?>

                        </div>

                        <div class="item-keywords">

                            <?php
                                $string = $publishedArticle->keywords;
                                $str_arr = explode (";", $string);
                                echo '<ul>';
                                echo '<li>' . implode( '</li><li>', $str_arr) . '</li>';
                                echo '</ul>';
                            ?>



                        </div>

                        <div class="row">
                            <div class="col-12">
                                <figure>
                                    <img src="<?php echo e(route('article.file', ['filename' => $publishedArticle->image_path])); ?>" alt="Imagen de la noticia">
                                </figure>
                            </div>
                            <div class="col-12 item-content">

                                <?php
                                echo $publishedArticle->text;
                                ?>
                            </div>
                        </div>







                    </div>

                        <div class="clearfix"></div>


            </div>



<div class="col-12 col-md-3 news-list side">
    
        <?php $__currentLoopData = $last6articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="box">
            <div class="date">
                <?php echo date("d M y | g:i a",strtotime($article->published_at));?>
            </div>
            <h3 class="title">
            <a href="<?php echo e(route('article.detail', ['id' => $article->id])); ?>">
                <?php echo e($article->title); ?>

            </a>
            </h3>
            <div class="subtitle">
                <?php echo e($article->sub_title); ?>

            </div>
            <div class="link">
                <a href="<?php echo e(route('article.detail', ['id' => $article->id])); ?>" class="btn">Leer m&aacute;s <i></i></a>
            </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</div>



        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>