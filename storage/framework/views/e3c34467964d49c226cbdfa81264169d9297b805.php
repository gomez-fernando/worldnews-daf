<?php $__env->startSection('title'); ?>
    <title>Inicio</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        
        <?php echo $__env->make('includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="row" news_list>


            
            <?php $__currentLoopData = $publishedArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publishedArticle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('includes.publishedArticle', ['publishedArticle' => $publishedArticle], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        </div>
        <div class="row justify-content-center">
                <?php echo e($publishedArticles->links()); ?>

        </div>
    </div>

    <script>
        $('[news_list]>div:first-child').toggleClass('col-md-6').find('.box').addClass('strong').find('.col-4').removeAttr('class');
        $('[news_list] .strong').find('.col-8').toggleClass('txt col-12 col-md-8');
    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>