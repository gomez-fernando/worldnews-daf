<?php $__env->startSection('title'); ?>
    <title>Panel de control</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        
        <?php echo $__env->make('includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                <?php $__currentLoopData = $inProcessArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inProcessArticle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($inProcessArticle->title); ?></th>
                        <td><?php echo e($inProcessArticle->created_at); ?></td>
                        <td>
                            <a href="<?php echo e(route('article.editInProcessInReviewView', ['id' => $inProcessArticle->id])); ?>" class="btn btn-sm btn-warning">Revisar</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php $__currentLoopData = $commentedArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentedArticle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($commentedArticle->title); ?></th>
                        <td><?php echo e($commentedArticle->created_at); ?></td>
                        <td>
                            <a href="<?php echo e(route('article.editInProcessInReviewView', ['id' => $commentedArticle->id])); ?>" class="btn btn-sm btn-warning">Revisar</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php $__currentLoopData = $inReviewArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inReviewArticle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($inReviewArticle->title); ?></th>
                        <td><?php echo e($inReviewArticle->created_at); ?></td>
                        <td>
                            <a href="<?php echo e(route('article.editInProcessInReviewView', ['id' => $inReviewArticle->id])); ?>" class="btn btn-sm btn-warning">Revisar</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>


    </div>

    </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>