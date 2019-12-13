<?php $__env->startSection('content'); ?>
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
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($article->title); ?></th>
                        <td><?php echo e($article->created_at); ?></td>
                        <td>
                            <a href="<?php echo e(route('editor.review-publish-article', ['id' => $article->id])); ?>" class="btn btn-sm btn-warning"><?php echo e(__('lang.review')); ?></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($article->title); ?></th>
                        <td><?php echo e($article->created_at); ?></td>
                        <td>
                            <a href="<?php echo e(route('editor.review-publish-article', ['id' => $article->id])); ?>" class="btn btn-sm btn-warning"><?php echo e(__('lang.review')); ?></a>
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